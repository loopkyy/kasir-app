<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data['produk'] = $this->produkModel->findAll();
        return view('produk/index', $data);
    }

    public function create()
    {
        return view('produk/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama'  => 'required|alpha_space|min_length[3]|regex_match[/[a-zA-Z]+/]',
            'harga' => 'required',
            'stok'  => 'required|integer|greater_than_equal_to[0]',
        ];

        $messages = [
            'nama' => [
                'required'     => 'Nama wajib diisi.',
                'alpha_space'  => 'Nama hanya boleh huruf dan spasi.',
                'regex_match'  => 'Nama tidak boleh angka semua.',
                'min_length'   => 'Nama minimal 3 karakter.'
            ],
            'harga' => [
                'required' => 'Harga wajib diisi.',
            ],
            'stok' => [
                'required'               => 'Stok wajib diisi.',
                'integer'                => 'Stok hanya boleh angka bulat.',
                'greater_than_equal_to'  => 'Stok tidak boleh negatif.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $harga = str_replace('.', '', $this->request->getPost('harga'));

        $this->produkModel->save([
            'nama'  => $this->request->getPost('nama'),
            'harga' => $harga,
            'stok'  => $this->request->getPost('stok'),
        ]);

        session()->setFlashdata('success', 'Produk berhasil ditambahkan.');
        return redirect()->to('/produk');
    }

    public function edit($id)
    {
        $data['produk'] = $this->produkModel->find($id);
        return view('produk/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama'  => 'required|alpha_space|min_length[3]|regex_match[/[a-zA-Z]+/]',
            'harga' => 'required',
            'stok'  => 'required|integer|greater_than_equal_to[0]',
        ];

        $messages = [
            'nama' => [
                'required'     => 'Nama wajib diisi.',
                'alpha_space'  => 'Nama hanya boleh huruf.',
                'regex_match'  => 'Nama tidak boleh angka semua.',
                'min_length'   => 'Nama minimal 3 karakter.'
            ],
            'harga' => [
                'required' => 'Harga wajib diisi.',
            ],
            'stok' => [
                'required'               => 'Stok wajib diisi.',
                'integer'                => 'Stok hanya boleh angka bulat.',
                'greater_than_equal_to'  => 'Stok tidak boleh negatif.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $harga = str_replace('.', '', $this->request->getPost('harga'));

        $this->produkModel->update($id, [
            'nama'  => $this->request->getPost('nama'),
            'harga' => $harga,
            'stok'  => $this->request->getPost('stok'),
        ]);

        session()->setFlashdata('success', 'Produk berhasil diupdate.');
        return redirect()->to('/produk');
    }

    public function delete($id)
    {
        $this->produkModel->delete($id);
        session()->setFlashdata('success', 'Produk berhasil dihapus.');
        return redirect()->to('/produk');
    }
}
