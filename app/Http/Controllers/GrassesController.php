<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Goutte;

class GrassesController extends Controller
{
    public function get(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required | min: 1 | max: 39 | string | regex:/^[a-zA-Z0-9]+$/'
        ]);

        if ($validator->fails()) {
            return response('Forbidden', '403');
        }

        $crawler = Goutte::request('GET', 'https://github.com/' . $request->name);
        $response = $crawler->filter('.day')->each(function ($element) {
            return intval($element->attr('data-count'));
        });

        if ($response) {
            return response($response, '200');
        }

        return response('Forbidden', '403');
    }
}
