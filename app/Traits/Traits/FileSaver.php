<?php

namespace App\Traits\Traits;

trait FileSaver
{
     /**
     * @param object $file
     * @param string $basePath
     * @return string
     */
    public function upload_file(object $file, string $basePath, string $oldPath= null, string $stringName = null): string
    {
        // if($oldPath){
        //     unlink($oldPath);
        // }

        $newFileName   = str()->slug($stringName) . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

        // dd($newFileName);

        $directory   = 'uploads/' . $basePath . '/';

        $file->move($directory, $newFileName);

        return $directory . $newFileName;
    }

}
