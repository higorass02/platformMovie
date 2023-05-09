<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    public function subscribeByCourse()
    {
        return view('modules.new');
    }
}
