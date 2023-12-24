<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


trait  StorageImageTrait{
    public function storageTraitUpload($request, $fieldName, $folderName){
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20). '.' .$fileNameOrigin;
            $filePath = $request->file($fieldName)->storeAs('public/'.$folderName.'/'.auth()->id(), $fileNameHash);
            $dataUPloadFileTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath),
            ];

            return $dataUPloadFileTrait;
        }

        return null;
    }

    public function storageTraitUploadMultiple($file, $folderName){
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20). '.' .$fileNameOrigin;
            $filePath = $file->storeAs('public/'.$folderName.'/'.auth()->id(), $fileNameHash);
            $dataUPloadFileTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => $filePath,
            ];

            return $dataUPloadFileTrait;

    }

}

