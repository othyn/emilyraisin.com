<?php

namespace App\Http\Requests;

use App\File;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ];
    }

    /**
     * Upload and save the posted file.
     *
     * @return \App\File $file
     */
    public function upload()
    {
        $uploadedFile = $this->file('file');

        $newFileName = time().'_'.Str::lower($uploadedFile->getClientOriginalName());

        $uploadedFile->storeAs('uploads', $newFileName, 'public');

        $file = new File();

        $file->user_id = auth()->user()->id;
        $file->original_name = $uploadedFile->getClientOriginalName();
        $file->name = $newFileName;
        $file->path = "uploads/{$newFileName}";
        $file->size = $uploadedFile->getClientSize();
        $file->mime = $uploadedFile->getClientMimeType();
        // https://github.com/symfony/symfony/blob/3.0/src/Symfony/Component/HttpFoundation/File/UploadedFile.php

        $file->save();

        return $file;
    }
}
