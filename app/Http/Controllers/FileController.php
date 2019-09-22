<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Upload;

class FileController extends Controller
{
    public function store(Request $request)
    {
       $this->validate($request, [
         'title' => 'required:max:255',
         'overview' => 'required'
       ]);

       auth()->user()->files()->create([
         'title' => $request->get('title'),
         'overview' => $request->get('overview')
       ]);

       return back()->with('message', 'File submitted successfully');
    }

    public function upload()
    {
      $uploadFile = $request->file('file');
      $filename = time().$uploadFile->getClientOriginalName();

      Storage::disk('local')->putFileAs('files/'.$filename, $uploadFile, $filename);

      $upload = new Upload;
      $upload->filename = $filename;
      $upload->user()->associate(auth()->user());
      $upload->save();

      return response()->json([
        'id' => $upload->id
      ]);
    }
}
