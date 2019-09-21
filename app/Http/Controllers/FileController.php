<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store(Request $request)
    {
       $request->validate([
         'title' => 'required:max:255',
         'overview' => 'required'
       ]);

       auth()->user()->files()->create([
         'title' => $request->get('title'),
         'overview' => $request->get('overview')
       ])
    }
}
