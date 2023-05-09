<?php

namespace App\Http\Controllers\Modules\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function movie()
    {
        return view('modules.movie.new');
    }
}
