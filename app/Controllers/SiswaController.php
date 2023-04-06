<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SiswaController extends BaseController
{
    public function index()
    {
        $data = [
            'title'   => 'Dashboard',
            'message' => 'Hello World!',
        ];

        return view('index', $data);
    }
}
