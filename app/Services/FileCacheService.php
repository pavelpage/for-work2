<?php


namespace App\Services;


use App\Files;

class FileCacheService
{
    /**
     * @var FileListService
     */
    private $fileListService;

    /**
     * FileCacheService constructor.
     * @param FileListService $fileListService
     */
    public function __construct(FileListService $fileListService)
    {
        $this->fileListService = $fileListService;
    }

    public function getFilesAndDirs($path)
    {
        $filesAndDirs = Files::where('path', $path)->get();
        if (!$filesAndDirs->isEmpty()){
            return $filesAndDirs;
        }

        $filesAndDirs = $this->fileListService->getFilesAndDirs($path);

        Files::addPathFilesAndDirs($path, $filesAndDirs);
        return $filesAndDirs;
    }

    public function updateCache($path)
    {
        Files::where('path', $path)->delete();
        return $this->getFilesAndDirs($path);
    }
}