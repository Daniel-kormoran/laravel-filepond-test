<?php

namespace App\Http\Controllers;

use App\Models\TemporaryImage;
use Illuminate\Http\Request;

class UploadTemporaryImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $folder = uniqId('Image-', true);
            $image->storeAs('images/tmp/'.$folder, $fileName);

            TemporaryImage::create([
                'folder' => $folder,
                'file' => $fileName
            ]);

            return $folder;
        }
        return '';
    }
}
