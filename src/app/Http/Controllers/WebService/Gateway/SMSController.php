<?php

namespace App\Http\Controllers\WebService\Gateway;

use App\Http\Controllers\Controller;
use App\Traits\WebServiceAuthorizable;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    use WebServiceAuthorizable;

    /**
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json('ss');
    }
}
