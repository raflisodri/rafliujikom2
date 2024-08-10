<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Member;
use App\Models\Sepatu;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $jumlah_user = User::count();
        $jumlah_member = Member::count();
        $jumlah_sepatu = Sepatu::count();
        $transaksi = Transaksi::orderBy('tanggal', 'DESC')
            ->limit(10)
            ->get();

        // Hitung total sub_total dari 7 hari terakhir
        $today = Carbon::today();
        $start = Carbon::today()->subDays(7);
        $total_minggu = Transaksi::selectRaw('SUM(sub_total) as totalprices')
            ->whereBetween('tanggal', [$start, $today])
            ->first();

        // Ambil tahun dari request atau default ke tahun sekarang
        $selectedYear = $request->input('year', Carbon::now()->year);

        // Data untuk chart
        $chartData = $this->getMonthlyChartData($selectedYear);

        $donutChartData = $this->getTopSepatuChartData($selectedYear);

        $pieChartData = $this->getTopMembersChartData($selectedYear);

        return view('home.dashboard', compact('jumlah_user', 'jumlah_member', 'jumlah_sepatu', 'transaksi', 'total_minggu', 'chartData', 'donutChartData', 'pieChartData', 'selectedYear'));
    }

    private function getMonthlyChartData($year)
    {
        // Ambil data total per bulan
        $monthlyData = Transaksi::selectRaw('MONTH(tanggal) as month, SUM(sub_total) as total')
            ->whereYear('tanggal', $year)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->keyBy('month');

        $labels = [];
        $data = [];

        // Buat array data untuk setiap bulan
        for ($month = 1; $month <= 12; $month++) {
            $labels[] = Carbon::createFromDate($year, $month, 1)->format('F');
            $data[] = isset($monthlyData[$month]) ? $monthlyData[$month]->total : 0;
        }

        return compact('labels', 'data');
    }

    private function getTopSepatuChartData($year)
    {
        // Ambil data sepatu yang paling banyak dibeli berdasarkan jumlah
        $topSepatuData = DB::table('detail_transaksi')
            ->join('sepatus', 'detail_transaksi.id_sepatu', '=', 'sepatus.id')
            ->join('transaksis', 'detail_transaksi.id_transaksi', '=', 'transaksis.id')
            ->selectRaw('sepatus.nama as sepatu, SUM(detail_transaksi.jumlah) as total')
            ->whereYear('transaksis.tanggal', $year)
            ->groupBy('sepatus.nama')
            ->orderBy('total', 'desc')
            ->get();

        $labels = [];
        $data = [];

        foreach ($topSepatuData as $sepatu) {
            $labels[] = $sepatu->sepatu;
            $data[] = $sepatu->total;
        }

        return compact('labels', 'data');
    }

    private function getTopMembersChartData($year)
    {
        // Ambil data member yang paling banyak melakukan transaksi
        $topMembersData = DB::table('transaksis')
            ->join('members', 'transaksis.id_member', '=', 'members.id')
            ->selectRaw('members.nama as member, COUNT(transaksis.id) as total')
            ->whereYear('transaksis.tanggal', $year)
            ->groupBy('members.nama')
            ->orderBy('total', 'desc')
            ->get();

        $labels = [];
        $data = [];

        foreach ($topMembersData as $member) {
            $labels[] = $member->member;
            $data[] = $member->total;
        }

        return compact('labels', 'data');
    }
}
