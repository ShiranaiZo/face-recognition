<?php

namespace App\Http\Controllers;

use App\Model\Databarang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $result['jumlahdata_barang'] = Databarang::latest()->get()->count();
        return view('index', $result);
    }
}
