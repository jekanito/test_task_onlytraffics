<?php


namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFile
{
    static public function loadImage(Request $request) : string
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs(
                '',
                $filename,
                's3'
            );

            return 'https://' . env('AWS_BUCKET') . '.s3.amazonaws.com/' . $filename;
        }

        return '/images/avatar.png';
    }
}
