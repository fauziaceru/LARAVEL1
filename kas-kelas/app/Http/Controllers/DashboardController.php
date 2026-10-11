<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Akun; 
use App\Models\Kategori; 
use App\Models\Transaksi; 
use Illuminate\View\View; 
 
class DashboardController extends Controller 
{ 
    public function index(): View 
    { 
        $jumlahKategori = Kategori::count(); 
        $jumlahAkun = Akun::count(); 
        $jumlahTransaksi = Transaksi::count(); 
 
        $totalPemasukan = Transaksi::whereHas('kategori', fn ($query) => 
            $query->where('jenis', 'Pemasukan'))->sum('jumlah'); 
        $totalPengeluaran = Transaksi::whereHas('kategori', fn ($query) => 
            $query->where('jenis', 'Pengeluaran'))->sum('jumlah'); 
        $saldoKas = Akun::sum('saldo_awal') + $totalPemasukan - $totalPengeluaran; 
        $akun = Akun::orderBy('nama')->get(); 
 
        return view('dashboard', compact( 
            'jumlahKategori', 
            'jumlahAkun', 
            'jumlahTransaksi', 
            'totalPemasukan', 
            'totalPengeluaran', 
            'saldoKas', 
            'akun', 
        )); 
    } 
} 