<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <title>RafaRabbit's | Tambah Form</title>
</head>
<body>

    <div class="container">


    <div class="row mt-4">
        <div class="col-md-12"> 
            
            <div class="card">
                <div class="card-header" style="background: #db5b20;color:#fff;">
                    Form Tambah Data Hewan
                </div>

                <div class="card-body">
                    <?= form_open_multipart('admin/tambahForm'); ?>
                    
                    <div class="form-group">
                        <label for="nama">Nama/Jenis Item</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="" selected>--Pilih Kategori--</option>
                            <?php foreach($kategori as $k):?>
                                <option value="<?=$k['id_kategori'];?>"><?=$k['nama_kategori'];?></option>
                            <?php endforeach;;?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('kategori'); ?></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control">
                        <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="catatan">Deskripsi</label>
                        <input type="text" name="catatan" id="catatan" class="form-control">
                        <small class="form-text text-danger">beri '-' jika kosong.</small>
                        <small class="form-text text-danger"><?= form_error('catatan'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="ketersediaan">Ketersediaan</label>
                        <select name="ketersediaan" id="ketersediaan" class="form-control">
                            <option value="Ada">Ada</option>
                            <option value="Kosong">Kosong</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="gambar" class="ml-3" required>Gambar Hewan</label><br>
                            <input type="file" name="gambar" id="gambar" class="ml-3"><br>
                            <small class="form-text text-danger"><?= form_error('gambar'); ?></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenismakanan">Jenis Makanan</label>
                        <input type="text" name="jenismakanan" id="jenismakanan" class="form-control">
                        <small class="form-text text-danger">beri '-' jika kosong.</small>
                        <small class="form-text text-danger"><?= form_error('jenismakanan'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="aksesoris">Aksesoris</label>
                        <input type="text" name="aksesoris" id="aksesoris" class="form-control">
                        <small class="form-text text-danger">beri '-' jika kosong.</small>
                        <small class="form-text text-danger"><?= form_error('aksesoris'); ?></small>
                    </div>

                    <a href="<?= base_url(); ?>admin" class="btn btn-warning float-left">Kembali</a>
                    <button type="submit" class="btn btn-primary float-right">Tambah Data</button>	
                    <?= form_close(); ?>
                </div>
            </div>

        </div>
    </div>
    </div>
    
    