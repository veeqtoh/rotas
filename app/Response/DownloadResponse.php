<?php

namespace App\Response;

use Storage;
use Response;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadResponse
{
    public function __construct()
    {
        #code
    }

    /**
     * Return download or preview response for given file.
     *
     * @param File $upload
     *
     * @return mixed
     */
    public function singleDownload($model): BinaryFileResponse
    {
        $headers = ['Content-Type' => $model->mime,];
        $filename = Str::slug(Str::before($model->original_name, '.'), '-');
        $filename = "$filename.$model->mime";
        $filepath = Storage::disk($model->disk)->path($model->src);

        return response()->download($filepath, $filename, $headers);
    }

}
