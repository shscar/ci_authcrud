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

    public function create()
    {
        $data = [
            'title'   => 'Create Data siswa',
        ];

        return view('crud/create');
    }

}
