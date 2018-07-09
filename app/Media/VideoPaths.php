<?php

namespace CodeFlix\Media;


trait VideoPaths
{
    use ThumbPaths;

    public function getThumbFolderStorageAttribute()
    {
        return "videos/{$this->id}";
    }

    public function getFileFolderStorageAttribute()
    {
        return "videos/{$this->id}";
    }

    
    public function getFileAssetAttribute()
    {
        return $this->isLocalDriver()?
            route('admin.videos.file_asset', ['video' => $this->id]):
            $this->file_path;
    }


    public function getThumbDefaultAttribute()
    {
        return env('VIDEO_NO_THUMB');
    }


    public function getFileRelativeAttribute()
    {
        return $this->file?"{$this->file_folder_storage}/{$this->file}":false;
    }

    public function getFilePathAttribute()
    {
        return $this->getAbsolutePath($this->getStorageDisk(), $this->file_relative);
    }



}