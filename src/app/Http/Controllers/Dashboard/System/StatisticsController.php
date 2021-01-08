<?php

namespace App\Http\Controllers\Dashboard\System;

use App\Http\Controllers\Controller;
use App\Traits\Authorizable;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    use Authorizable;

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dashboard.system.statistics.index');
    }
}
