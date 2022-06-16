<?php

namespace App\Http\Controllers\Ebook;

use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use App\Models\Ebook;

class EbookLibraryController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ebook $ebook)
    {
        $library=$ebook->library()->get();

        return $this->showAll('home.ebook.library.index',$library);
    }

}
