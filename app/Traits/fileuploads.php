<?php

namespace App\Traits;

use App\Jobs\UploadFile;

trait fileuploads {


    public function upload_file($request)
    {
        $md5Name = md5_file($request->file('file')->getRealPath());
        $extension = $request->file('file')->guessExtension();
        $name = str_random(40);
        $file = $request->file('file')->storeAs('/',$name .'.'.$extension, 'local');
        UploadFile::dispatch($request->email, $name.'.'.$extension);

    }
}
