<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?> 

<div class="container mt-5">
    <h1 class="mb-4 text-center">Form Tambah Siswa</h1>
    <form action="<?= route_to('store-siswa') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="number" name="nisn" class="form-control <?= (session()->get('errors.nisn')) ? 'is-invalid' : '' ?>" value="<?= old('nisn'); ?>" id="nisn" placeholder="9736">
            <?php if (session()->get('errors.nisn')): ?>
                <div class="invalid-feedback"><?= session()->get('errors.nisn') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control <?= (session()->get('errors.nama')) ? 'is-invalid' : '' ?>" value="<?= old('nama'); ?>" id="nama" placeholder="Masukkan nama Lengkap">
            <?php if (session()->get('errors.nama')): ?>
                <div class="invalid-feedback"><?= session()->get('errors.nama') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select <?= (session()->get('errors.jenis_kelamin')) ? 'is-invalid' : '' ?>" aria-label="Default select example">
                <option selected disabled>Pilih Jenis kelamin</option>
                <option value="Perempuan" <?= (old('jenis_kelamin') == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                <option value="Laki-laki" <?= (old('jenis_kelamin') == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
            </select>
            <?php if (session()->get('errors.jenis_kelamin')): ?>
                <div class="invalid-feedback"><?= session()->get('errors.jenis_kelamin') ?></div>
            <?php endif; ?>
        </div>


        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control <?= (session()->get('errors.kelas')) ? 'is-invalid' : '' ?>" value="<?= old('kelas'); ?>" id="kelas" placeholder="Kelas">
            <?php if (session()->get('errors.kelas')): ?>
                <div class="invalid-feedback"><?= session()->get('errors.kelas') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" class="form-control <?= (session()->get('errors.jurusan')) ? 'is-invalid' : '' ?>" value="<?= old('jurusan'); ?>" id="jurusan" placeholder="Jurusan">
            <?php if (session()->get('errors.jurusan')): ?>
                <div class="invalid-feedback"><?= session()->get('errors.jurusan') ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="tlp" class="form-label">No. Telepon</label>
            <input type="text" name="no_tlp" class="form-control <?= (session()->get('errors.no_tlp')) ? 'is-invalid' : '' ?>" value="<?= old('no_tlp'); ?>" id="tlp" placeholder="0812345678900">
            <?php if (session()->get('errors.no_tlp')): ?>
                <div class="invalid-feedback"><?= session()->get('errors.no_tlp') ?></div>
            <?php endif; ?>
        </div>

        <div class="input-group mb-3">
            <div class="col-12">
                <label for="file" class="form-label">Upload Foto</label>
            </div>
            <input type="file" class="form-control-file <?= (session()->get('errors.image')) ? 'is-invalid' : '' ?>" id="image" name="image" accept="image/*">
            <label class="input-group-text" for="image">Upload</label>
            <?php if (session()->get('errors.image')): ?>
                <div class="invalid-feedback"><?= session()->get('errors.image') ?></div>
            <?php endif; ?>
        </div>

        <div class="text-end">
            <a href="javascript:history.back()" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<script>
    $(function(){

        <?php if(session()->get("errors")) { ?>
            Swal.fire({
                icon: 'error',
                text: 'Data yang kamu masukan kurang tepat!'
            })
        <?php } ?>
    });
</script>

<?= $this->endSection() ?>