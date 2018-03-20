<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrassesController extends Controller
{
    public function get(Request $request) {
        return response('hoge', '200');
    }
}
