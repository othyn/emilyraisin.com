<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File as FileSystem;

class FilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * Attempt to generate alt text for an image embed from a given file name.
     *
     * @param string $fileName
     *
     * @return string
     */
    private function altTextFromFileName(string $fileName): string
    {
        return Str::title(str_replace('_', ' ', pathinfo($fileName, PATHINFO_FILENAME)));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('files.index');
    }

    /**
     * Returns all the files for the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function files()
    {
        return Response::json(
            Auth::user()->files()->list()->latest()->get()
        );
    }

    /**
     * Returns all the files for the user, to be used in a select element.
     *
     * @return \Illuminate\Http\Response
     */
    public function filesSelect()
    {
        $files = Auth::user()->files()->list()->orderBy('original_name', 'asc')->get();
        // Order by here intends to get it so far, but filenames with numbers won't
        // sort into a natural order, eg. whole numbers in strings

        foreach ($files as $file) {
            $imageAlt = $this->altTextFromFileName($file->original_name);

            $response[] = [
                'value' => "{$file->url}|{$imageAlt}",
                'text' => $file->original_name,
            ];
        }
        // Restructure the response data as required by Bootstrap Vue <b-form-select>
        // Pipe in value is to support getting the value and alt text into the mix,
        // due to the data format on the front end, this was the easiest way without
        // sending the entire keyed dataset to the client

        usort($response, function ($a, $b) {
            return strnatcmp($a['text'], $b['text']);
        });
        // Apply a natural string sort on the filenames, this allows for sorting
        // of whole numbers within strings, which file names tend to have

        return Response::json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\FileRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request)
    {
        $file = $request->upload();

        return $file;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\File $file
     *
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\File $file
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\FileRequest $request
     * @param \App\File                    $file
     *
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\File $file
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        if ($file->user_id != Auth::id()) {
            return Response::json(['error' => 'You are not permitted to delete this file.'], 403);
        }

        FileSystem::exists($file->path) && FileSystem::delete($file->path);

        $file->delete();
    }
}
