<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;

class SiswaController extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data siswa',
            'siswa' => $this->siswaModel->findAll()
        ];

        return view('index', $data);
    }

    public function create()
    {
        $data = [
            'title'   => 'Create Data siswa',
        ];

        return view('crud/create', $data);
    }

    public function store()
    {
        // Validasi data dari form
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nisn' => 'required|Numeric|max_length[20]',
            'nama' => 'required|max_length[100]',
            'jenis_kelamin' => 'required',
            'kelas' => 'required|max_length[20]',
            'jurusan' => 'required|max_length[50]',
            'no_tlp' => 'required|Numeric',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data ke database menggunakan model
        $siswaModel = new SiswaModel();
        $siswaModel->insert([
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'kelas' => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
            'no_tlp' => $this->request->getPost('no_tlp'),
        ]);

        return redirect()->to('/')->with('success', 'Data siswa berhasil disimpan.');
    }

    public function edit($id)
    {
        // Mengambil data siswa dari database berdasarkan ID
        $data = [
            'title' => 'Data siswa',
            'siswa' => $this->siswaModel->find($id)
        ];

        // Menampilkan view edit form dengan data siswa
        return view('crud/edit', $data);
    }

    public function update($id)
    {
        // Mengambil data siswa dari database berdasarkan ID
        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    
        // Memvalidasi inputan data siswa
        $rules = [
            'nama' => 'required|min_length[5]|max_length[50]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'kelas' => 'required|min_length[2]|max_length[10]',
            'jurusan' => 'required|min_length[3]|max_length[50]',
            'no_tlp' => 'required|numeric|max_length[15]',
        ];
    
        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        // Memperbarui data siswa dengan data yang diinputkan dari form
        $this->siswaModel->update($id, [
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'kelas' => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
            'no_tlp' => $this->request->getPost('no_tlp')
        ]);
    
        return redirect()->to('/')->with('success', 'Data siswa berhasil diupdate');
    }

    public function delete($id)
    {
        $this->siswaModel->delete($id);
        session()->setFlashdata('success', 'Data siswa berhasil dihapus.');
        return redirect()->to('/');
    }
    
}