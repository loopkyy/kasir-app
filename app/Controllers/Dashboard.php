<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Cek user sudah login atau belum
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }

        $produkModel    = new ProdukModel();
        $transaksiModel = new TransaksiModel();

        $jumlahProduk   = $produkModel->countAll();
        $totalTransaksi = $transaksiModel->countAll();

        $totalHariIni = $transaksiModel
            ->where('DATE(tanggal)', date('Y-m-d'))
            ->selectSum('total_harga')
            ->first()['total_harga'] ?? 0;

        $produkHabis = $produkModel->where('stok', 0)->findAll();

        return view('dashboard/index', [
            'jumlahProduk'   => $jumlahProduk,
            'totalTransaksi' => $totalTransaksi,
            'totalHariIni'   => $totalHariIni,
            'produkHabis'    => $produkHabis
        ]);
    }
}
