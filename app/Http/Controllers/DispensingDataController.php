<?php

namespace App\Http\Controllers;

class DispensingDataController extends Controller
{
    public function kendaliView()
    {
        return view("kendali");
    }

    public function riwayatView()
    {
        return view("riwayat");
    }
}
