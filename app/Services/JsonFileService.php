<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class JsonFileService
{
    public function getData($fileName)
    {
        $file = Storage::disk('local')->get($fileName);
        $data = json_decode($file, true);

        return $data;
    }
}
