<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispensingDataController extends Controller
{
    public function index()
    {
        return view("kendali");
    }

    public function riwayatView()
    {
        return view("riwayat");
    }
}
