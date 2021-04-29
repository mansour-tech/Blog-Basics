<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function imageUpload()
{
    return view('image-upload');
}
public function imageUploadPost(Request $request)
{
  $image = $request->file('image')->store('images','public');
  Storage::disk('public')->put('images', $fileContents);
  $imagePath = Storage::url($image);

  return view('image-upload')
          ->with('message', "Image uploaded successfully")
          ->with('path', $imagePath);
}
}
