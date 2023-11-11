<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Member;
use App\Models\Sepatu;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $jumlah_user = User::count();
        $jumlah_member = Member::count();
        $jumlah_sepatu = Sepatu::count();
        $transaksi = Transaksi::Select()->orderBy('tanggal','DESC')
        ->limit(5)
        ->get();

        $today = Carbon::today();
        $start = Carbon::today()->subDays(7);
        $total_minggu = Transaksi::Select(Transaksi::raw('SUM(total) as totalprices'))
        ->whereBetWeen('tanggal',[$start , $today])->first();

        return view('home.dashboard',compact('jumlah_user','jumlah_member','jumlah_sepatu','transaksi','total_minggu'));
    }

}
