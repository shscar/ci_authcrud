<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?> 

    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Data Siswa</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <a href="<?= route_to('tambah-siswa') ?>" class="btn btn-success">Tambah Data Siswa</a>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">No.tlp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>3646</td>
                            <td>Verlina</td>
                            <td>Perempuan</td>
                            <td>11</td>
                            <td>Rekayasa Perangkat Lunak</td>
                            <td>0812345678964</td>
                            <td>
                                <!-- <a href="#" class="btn btn-success">Detail</a> -->
                                <a href="#" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>

<?= $this->endSection() ?>