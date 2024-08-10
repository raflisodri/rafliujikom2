<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class HistoryController extends Controller
{
    public function index()
    {
        return view('home.login2');
    }

    public function hasil(Request $request)
    {
        $idm = $request->id;
        $transaksi = Transaksi::with('detailTransaksi.sepatu', 'user', 'member')
            ->where('id_member', '=', $idm)
            ->get();
        return view('home.history', compact('transaksi'));
    }
}
