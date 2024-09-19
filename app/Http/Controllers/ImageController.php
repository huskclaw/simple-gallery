<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    public function index()
    {
        $images = Storage::files('images');
        return view('index', compact('images'));
    }

    public function upload(Request $request)
    {
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

    public function rotate(Request $request)
    {
        $path = $request->input('path');
        $angle = $request->input('angle', 90); // Default to 90 degrees rotation

        $imagePath = storage_path('app/images/' . basename($path));
        $image = Image::make($imagePath);
        $image->rotate($angle);
        $image->save();

        return redirect()->route('index');
    }
}
