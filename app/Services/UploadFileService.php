<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class UploadFileService {

    public function upload($files) {
        $loggedUser = getCurrentUser();
        $uploadedFile = [];
        if (is_array($files)) { //to handle multiple file
            foreach($files as $key => $file ) {
                $destinationPathWithName = $loggedUser->id . '/uploads/' . time(). $file->getClientOriginalName();
                $uploadedFile[] = [ 
                    'fileType' => $file->getMimeType(),
                    'fileName' => $file->getClientOriginalName(),
                    'filePath' => $destinationPathWithName
                ];
                $fileContent = file_get_contents($file->getRealPath());
                Storage::disk('local')->put($destinationPathWithName, $fileContent);
            }        
        }
        return $uploadedFile;
    }
}
