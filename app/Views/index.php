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
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <a href="<?= route_to('tambah-siswa') ?>" class="btn btn-success mr-2">Tambah Data Siswa</a>
                    </div>
                    <div class="col-sm-4">
                        <form action="<?= route_to('search-data') ?>" method="get" class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search">
                            <select name="column" id="column" class="form-select">
                                <option value="Semua">Semua</option>
                                <option value="nisn">NISN</option>
                                <option value="nama">Nama</option>
                                <option value="jenis_kelamin">Jenis Kelamin</option>
                                <option value="kelas">Kelas</option>
                                <option value="jurusan">Jurusan</option>
                                <option value="no_tlp">No. Telepon</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>

                </div>

                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">No. Telepon</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $no = 1; foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <img src="<?= base_url('assets/images/' . $row['image']) ?>" class="rounded mx-auto d-block" height="80" alt="Foto Profil">
                                </td>
                                <td><?= $row['nisn'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['jenis_kelamin'] ?></td>
                                <td><?= $row['kelas'] ?></td>
                                <td><?= $row['jurusan'] ?></td>
                                <td><?= $row['no_tlp'] ?></td>
                                <td>
                                    <a href="<?= route_to('edit-siswa', $row['id']) ?>" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="<?= route_to('delete-siswa', $row['id']) ?>">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    
<?= $this->endSection() ?>