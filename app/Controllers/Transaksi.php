<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use App\Models\TransaksiDetailModel;

class Transaksi extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data['produk'] = $this->produkModel->findAll();
        return view('transaksi/index', $data);
    }

    public function simpan()
    {
        $produkIds = $this->request->getPost('produk_id');
        $jumlahs   = $this->request->getPost('jumlah');

        $bayarInput = $this->request->getPost('bayar');
        $bayar = (int) str_replace(['.', ','], '', $bayarInput);

        $total = 0;
        $detailData = [];
        $produkModel = new ProdukModel();

        foreach ($produkIds as $key => $id) {
            $jumlah = (int)$jumlahs[$key];
            if ($jumlah > 0) {
                $produk = $produkModel->find($id);

                if ($jumlah > $produk['stok']) {
                    session()->setFlashdata('error', 'Stok produk "' . $produk['nama'] . '" tidak mencukupi.');
                    return redirect()->to('/transaksi')->withInput();
                }

                $subTotal = $produk['harga'] * $jumlah;
                $total += $subTotal;

                $detailData[] = [
                    'produk_id' => $id,
                    'jumlah'    => $jumlah,
                    'sub_total' => $subTotal
                ];
            }
        }

        if ($total == 0) {
            session()->setFlashdata('error', 'Tidak ada produk yang dipilih.');
            return redirect()->to('/transaksi');
        }

        if ($bayar < $total) {
            session()->setFlashdata('error', 'Uang bayar kurang. Total: Rp' . number_format($total));
            return redirect()->to('/transaksi')->withInput();
        }

        // ✅ Tambahkan baris ini
        $transaksiModel = new TransaksiModel();

        // Simpan transaksi
        $transaksiId = $transaksiModel->insert([
            'tanggal'     => date('Y-m-d H:i:s'),
            'total_harga' => $total,
            'bayar'       => $bayar
        ]);

        // Simpan detail & update stok
        $detailModel = new TransaksiDetailModel();
        foreach ($detailData as $d) {
            $d['transaksi_id'] = $transaksiId;
            $detailModel->insert($d);

            $produk = $produkModel->find($d['produk_id']);
            $sisaStok = $produk['stok'] - $d['jumlah'];

            if ($sisaStok < 0) {
                session()->setFlashdata('error', 'Stok produk "' . $produk['nama'] . '" tidak cukup saat update.');
                return redirect()->to('/transaksi');
            }

            $produkModel->update($d['produk_id'], ['stok' => $sisaStok]);
        }

        $kembalian = $bayar - $total;
        session()->setFlashdata('success', 'Transaksi berhasil. Kembalian: Rp' . number_format($kembalian));
return redirect()->to('/riwayat/detail/' . $transaksiId);
    }
}
