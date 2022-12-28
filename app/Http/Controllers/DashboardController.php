<?php

namespace App\Http\Controllers;

use App\Model\Databarang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $result['data_barang'] = Databarang::latest()->get();
        return view('data_barang', $result);
    }
}
