<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bahanbaku;
use App\Models\Pemakaian;
use App\Models\Pemesanan;
use App\Models\Sparepart;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah = [
            'bahanbaku' => Bahanbaku::count(),
            'pemakaian' => Pemakaian::count(),
            'pemesanan' => Pemesanan::count(),
            'sparepart' => Sparepart::count(),
        ];

        return view('admin.index', compact('jumlah'));
    }
}
