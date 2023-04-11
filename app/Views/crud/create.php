<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?> 

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Form Tambah Siswa</h1>
        <form action="<?= route_to('storeJurusan') ?>" method="POST">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="nama" class="form-label">NISN</label>
                <input type="number" name="nisn" class="form-control" id="nisn" placeholder="9736" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select name="jk" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Jenis kelamin</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-laki">Laki-laki</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Kelas" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan" required>
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">No. Telepon</label>
                <input type="number" name="no_tlp" class="form-control" id="tlp" placeholder="0812345678900" required>
            </div>
            <!-- <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" rows="3" placeholder="Masukkan deskripsi siswa"></textarea>
            </div> -->
            <div class="text-end">
                <a href="javascript:history.back()" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

<?= $this->endSection() ?>