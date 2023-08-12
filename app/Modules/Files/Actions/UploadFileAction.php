<?php

namespace App\Modules\Files\Actions;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class UploadFileAction
{
    public static function execute($path, $file)
    {
        $filePath = Storage::disk('public')->putFile($path, $file);

        return "/storage/$filePath";
    }
}
