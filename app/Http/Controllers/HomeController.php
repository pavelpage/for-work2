<?php

namespace App\Http\Controllers;

use App\Services\FileCacheService;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * @var FileCacheService
     */
    private $cacheService;

    /**
     * HomeController constructor.
     * @param FileCacheService $cacheService
     */
    public function __construct(FileCacheService $cacheService)
    {
        $this->cacheService = $cacheService;
    }

    //
    public function index()
    {
        return view('welcome', [
            'items' => $this->cacheService->getFilesAndDirs(base_path()),
        ]);
    }

    public function updateCache()
    {
        $this->cacheService->updateCache(base_path());
        return redirect()->route('home');
    }
}
