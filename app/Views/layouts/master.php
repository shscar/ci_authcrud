<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? esc($title) : 'Document' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
    <div class="container">
        <!-- Memanggil file navbar -->
        <?= $this->include('layouts/navbar'); ?>

        <!-- Untuk mengisi section pada layout -->
        <?= $this->renderSection('content') ?>

        <!-- Memanggil file footer -->
        <?= $this->include('layouts/footer'); ?>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>