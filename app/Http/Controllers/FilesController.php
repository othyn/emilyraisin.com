<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FileSystem;
use Illuminate\Support\Facades\Response;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('files.index');
    }

    /**
     * Returns all the files for the user
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
     * @param  \Illuminate\Http\FileRequest  $request
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
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\FileRequest  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
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
