<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <title>RafaRabbit's | Ubah Form Kategori</title>
</head>
<body>

    <div class="container">

    <div class="row mt-4">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header" style="background: #db5b20;color:#fff;">
                    Form Ubah Data Kategori
                </div>

                <div class="card-body">
                    <?= form_open(''); ?>

                    <input type="hidden" name="id" id="id" value="<?= $kategori['id_kategori']; ?>">
                    
                    <div class="form-group">
                        <label for="namakategori">Nama/Jenis Hewan</label>
                        <input type="text" name="namakategori" id="namakategori" value="<?= $kategori['nama_kategori']; ?>" class="form-control">
                        <small class="form-text text-danger"><?= form_error('namakategori'); ?></small>
                    </div>

                    <a href="<?= base_url(); ?>admin/dataKategori" class="btn btn-warning float-left">Kembali</a>
                    <button type="submit" class="btn btn-primary float-right">Ubah Data</button>	
                    <?= form_close(); ?>
                </div>
            </div>

        </div>
    </div>
    </div>
    
    