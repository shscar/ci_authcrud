<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?> 

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Form Edit Siswa</h1>
        <form action="<?= route_to('update-siswa', $siswa['id']) ?>" method="post">
            <?= csrf_field(); ?>
            
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="number" name="nisn" class="form-control" id="nisn" value="<?= $siswa['nisn'] ?>" placeholder="9736" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?= $siswa['nama'] ?>" placeholder="Masukkan nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                    <option <?= $siswa['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                    <option <?= $siswa['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?> value="Laki-laki">Laki-laki</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $siswa['kelas'] ?>" placeholder="Kelas" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?= $siswa['jurusan'] ?>" placeholder="Jurusan" required>
            </div>
            <div class="mb-3">
                <label for="no_tlp" class="form-label">No. Telepon</label>
                <input type="number" name="no_tlp" class="form-control" id="no_tlp" value="<?= $siswa['no_tlp'] ?>" placeholder="0812345678900" required>
            </div>
            <div class="text-end">
                <a href="javascript:history.back()" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <br>

<?= $this->endSection() ?>