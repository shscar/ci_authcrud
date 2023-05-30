<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;

use CodeIgniter\I18n\Time;

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

        $keyword = $this->request->getVar('keyword');
        $column = $this->request->getVar('column');

        if ($keyword && $column) {
            $data['siswa'] = $this->siswaModel->search($keyword, $column);
        }

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
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,64M]',
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $siswaModel = new SiswaModel();

        // ambil gambar
        $fileImage = $this->request->getFile('image');

        // generate nama file gambar baru
        $image = $fileImage->getRandomName();

        // pindahkan gambar baru ke folder uploads
        $fileImage->move(ROOTPATH . 'public/assets/images/', $image);
        
        $data = [
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'kelas' => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
            'no_tlp' => $this->request->getPost('no_tlp'),
            'image' => $image
        ];

        // Simpan data ke database
        $siswaModel->insert($data);
    
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
        //validasi form input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nisn' => 'required|Numeric|max_length[20]',
            'nama' => 'required|max_length[100]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'kelas' => 'required|max_length[20]',
            'jurusan' => 'required|max_length[50]',
            'no_tlp' => 'required|numeric',
            'image' => [
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,64M]',
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $siswa = $this->siswaModel->find($id);

        // ambil gambar lama
        $oldImage = $siswa['image'];

        // ambil gambar baru
        $fileImage = $this->request->getFile('image');
        if ($fileImage->getError() == 4) {
            $image = $oldImage;
        } else {
            // generate nama file gambar baru
            $image = $fileImage->getRandomName();

            // pindahkan gambar baru ke folder uploads
            $fileImage->move(ROOTPATH . 'public/assets/images', $image);

            // hapus gambar lama jika ada
            if ($oldImage != '') {
                $filePath = ROOTPATH . 'public/assets/images/' . $oldImage;
                // echo $filePath;
                
                // jika file tidak ada maka fungsi unlink tidak akan dijalankan
                if (file_exists($filePath)) {
                    unlink($filePath);
                // }else {
                //     unlink(ROOTPATH . 'public/assets/images/' . $oldImage);
                }
            }
        }

        // update data siswa
        $data = [
            'nisn' => $this->request->getVar('nisn'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kelas' => $this->request->getVar('kelas'),
            'jurusan' => $this->request->getVar('jurusan'),
            'no_tlp' => $this->request->getVar('no_tlp'),
            'image' => $image
        ];

        $this->siswaModel->update($id, $data);

        return redirect()->to('/')->with('success', 'Data siswa berhasil diupdate.');
    }
    
    public function delete($id)
    {
        // Ambil data gambar dari database
        $siswa = $this->siswaModel->find($id);
    
        // Tentukan lokasi file gambar yang akan dihapus
        $path = ROOTPATH . 'public/assets/images/' . $siswa['image'];
    
        // Hapus file gambar dari server
        if (file_exists($path)) {
            unlink($path);
        }
    
        // Delete data di database
        $this->siswaModel->delete($id);
    
        // Redirect ke halaman sebelumnya
        return redirect()->back();
    }

}