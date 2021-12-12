<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <title>RafaRabbit's | Tambah Form Kategori</title>
</head>
<body>

    <div class="container">


    <div class="row mt-4">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header" style="background: #db5b20;color:#fff;">
                    Form Tambah Data Kategori
                </div>

                <div class="card-body">
                    <?= form_open_multipart('admin/tambahFormKategori'); ?>
                    
                    <div class="form-group">
                        <label for="namakategori">Nama Kategori</label>
                        <input type="text" name="namakategori" id="namakategori" class="form-control" placeholder="Masukan kategori baru..">
                        <small class="form-text text-danger"><?= form_error('namakategori'); ?></small>
                    </div>

                    <a href="<?= base_url(); ?>admin/dataKategori" class="btn btn-warning float-left">Kembali</a>
                    <button type="submit" class="btn btn-primary float-right">Tambah Data</button>	
                    <?= form_close(); ?>
                </div>
            </div>

        </div>
    </div>
    </div>
    
    