<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;

class GrassesController extends Controller
{
    public function get(Request $request) {

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
