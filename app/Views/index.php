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
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $no = 1; foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nisn'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['jenis_kelamin'] ?></td>
                                <td><?= $row['kelas'] ?></td>
                                <td><?= $row['jurusan'] ?></td>
                                <td><?= $row['no_tlp'] ?></td>
                                <td class="d-flex justify-content-between align-items-center">
                                    <a href="<?= route_to('edit-siswa', $row['id']) ?>" class="btn btn-warning ">Edit</a>
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
    <br><br><br><br><br><br><br>
    
<?= $this->endSection() ?>