<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait FileUploadTrait{
    public function handleFileUpload(Request $request, string $fileName, ?string $oldPath = null, string $dir = 'uploads') : String
    {
        // delete existing image if have
        if ($oldPath && File::exists(public_path($oldPath))) {
            File::delete(public_path($oldPath));
        }

        if (! $request->hasFile($fileName)) {
            return null;
        }


        $file = $request->file($fileName);

        $extension = $file->getClientOriginalExtension();
        $updatedFileName = \Str::random(30) . '.' . $extension;
        $file->move(public_path($dir), $updatedFileName);

        $filePath = $dir . '/' . $updatedFileName;

        return $filePath;
    }
}
