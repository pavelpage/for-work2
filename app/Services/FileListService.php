<?php


namespace App\Services;


use Carbon\Carbon;
use File;

class FileListService
{
    public function getFilesAndDirs($path)
    {
        $filesAndDir = collect(scandir($path));
        $filesAndDir = $filesAndDir->filter(function($item){
            return $item != '.' && $item != '..';
        });

        $result = collect();
        $filesAndDir->each(function($item) use ($result, $path){
            $info = new \Stdclass();
            if(File::isDirectory($path.'/'.$item)) {
                $info->type = '';
                $info->size = '[DIR]';
            }
            else {
                $info->type = $this->getFileExtension($item);
                $info->size = $this->getFileSizeString(File::size($path.'/'.$item));
            }
            $info->name = $item;
            $info->last_modified = Carbon::createFromTimestamp(File::lastModified($path.'/'.$item))->format('Y-m-d H:i:s');
            $result->push($info);
        });

        return $result;
    }

    private function getFileSizeString($bytes)
    {
        $mb = $bytes/1024;
        return round($mb) . ' кб';
    }

    /**
     * @param $fileName
     * @return bool|string
     */
    private function getFileExtension($fileName)
    {
        if (mb_strpos($fileName, '.') === 0) {
            return $fileName;
        }

        if (mb_strpos($fileName, '.') === false) {
            return 'shell script';
        }

        $lastDotPos = mb_strrpos($fileName, '.');
        if ( !$lastDotPos ) return false;
        return mb_substr($fileName, $lastDotPos+1);
    }
}