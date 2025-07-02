<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;
use App\Models\ProdukModel;

class Riwayat extends BaseController
{
    protected $transaksiModel;
    protected $detailModel;
    protected $produkModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->detailModel = new TransaksiDetailModel();
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksiModel->findAll();
        return view('riwayat/index', $data);
    }

    public function detail($id)
    {
        $transaksi = $this->transaksiModel->find($id);
        $detail = $this->detailModel->where('transaksi_id', $id)->findAll();

        // Ambil nama produk untuk setiap detail
        foreach ($detail as &$d) {
            $produk = $this->produkModel->find($d['produk_id']);
            $d['nama_produk'] = $produk['nama'] ?? 'Produk tidak ditemukan';
        }

        $data = [
            'transaksi' => $transaksi,
            'detail'    => $detail
        ];

        return view('riwayat/detail', $data);
    }
  public function delete($id)
{
    // Hapus transaksi dan detailnya
    $this->detailModel->where('transaksi_id', $id)->delete();
    $this->transaksiModel->delete($id);

    session()->setFlashdata('success', 'Riwayat transaksi berhasil dihapus.');
    return redirect()->to('/riwayat');
}
public function cetak($id)
{
    $transaksi = $this->transaksiModel->find($id);
    $detail = $this->detailModel->where('transaksi_id', $id)->findAll();

    foreach ($detail as &$d) {
        $produk = $this->produkModel->find($d['produk_id']);
        $d['nama_produk'] = $produk['nama'] ?? 'Produk tidak ditemukan';
    }

    $data = [
        'transaksi' => $transaksi,
        'detail' => $detail,
        'kembalian' => $transaksi['bayar'] - $transaksi['total_harga']
    ];

    return view('riwayat/cetak_struk', $data);
}



}
