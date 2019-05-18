<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Files extends Model
{
    //
    protected $guarded = [];

    public static function addPathFilesAndDirs($path, Collection $filesAndDirs)
    {
        $dataSave = [];
        $filesAndDirs->each(function($item) use ($path, &$dataSave){
            $item->path = $path;
            $dataSave[] = [
                'name' => $item->name,
                'path' => $path,
                'size' => $item->size,
                'type' => $item->type,
                'last_modified' => $item->last_modified,
            ];
        });

        static::insert($dataSave);
    }
}
