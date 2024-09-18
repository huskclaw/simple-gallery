<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Storage::files('images');
        return view('index', compact('images'));
    }

    public function upload(Request $request)
    {
        // dd('Upload method called');
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $file->store('images');
            }
        }

        return redirect()->route('index');
    }
}
