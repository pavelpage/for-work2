<?php

namespace App\Http\Controllers;

use App\Services\FileListService;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    //
    public function index(FileListService $fileListService)
    {
        return view('welcome', [
            'items' => $fileListService->getFilesAndDirs(base_path()),
        ]);
    }
}
