<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\History;

class HistoryController extends Controller
{
    public function index(){
        $History = History::all();
        $title = "Product";
        return view('pages.history', compact('title', 'History'));
    }
}
