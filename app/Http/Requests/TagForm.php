<?php

namespace App\Http\Requests;

use App\Tag;
use Illuminate\Foundation\Http\FormRequest;

class TagForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:tags|max:255',
        ];
    }

    /**
     * Save the posted form as a tag.
     */
    public function persist()
    {
        Tag::create($this->only(['name']));

        session()->flash('flash.success', 'Tag created successfully!');
    }

    /**
     * Updates a tag with the posted form data.
     *
     * @param App\Tag $tag Tag to update
     */
    public function update(Tag $tag)
    {
        $tag->name = $this->name;

        $tag->save();

        session()->flash('flash.success', 'Tag updated successfully!');
    }
}
