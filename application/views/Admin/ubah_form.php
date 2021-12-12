<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <title>RafaRabbit's | Ubah Form</title>
</head>
<body>

    <div class="container">

    <div class="row mt-4">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header" style="background: #db5b20;color:#fff;">
                    Form Ubah Data Hewan
                </div>

                <div class="card-body">
                    <?= form_open_multipart(''); ?>

                    <input type="hidden" name="id" id="id" value="<?= $hewan['id_data']; ?>">
                    
                    <div class="form-group">
                        <label for="nama">Nama Item</label>
                        <input type="text" name="nama" id="nama" value="<?= $hewan['nama_hewan']; ?>" class="form-control">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                        <?php foreach ( $kategori as $k ) : ?>
							
							<?php if ( $hewan['id_kategori'] == $k['id_kategori'] ) : ?>
								<option value="<?= $k['id_kategori']; ?>" selected><?= $k['nama_kategori']; ?></option>
							<?php else : ?>
								<option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
							<?php endif; ?>
							
							<?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" value="<?= $hewan['harga_hewan'];?>" class="form-control">
                        <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="catatan">Deskripsi</label>
                        <input type="text" name="catatan" id="catatan" value="<?= $hewan['catatan_tambahan'];?>" class="form-control">
                        <small class="form-text text-danger"><?= form_error('catatan'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="ketersediaan">Ketersediaan</label>
                        <select name="ketersediaan" id="ketersediaan" class="form-control">
                        <?php foreach ( $ketersediaan as $k ) : ?>
							
							<?php if ( $k == $hewan['ketersediaan'] ) : ?>
								<option value="<?= $k; ?>" selected><?= $k; ?></option>
							<?php else : ?>
								<option value="<?= $k; ?>"><?= $k; ?></option>
							<?php endif; ?>
							
							<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="gambar" class="ml-3">Gambar Hewan</label><br>
                            <input type="file" name="gambar" id="gambar" class="ml-3"><br>
                            <small class="form-text text-danger"><?= form_error('gambar'); ?></small>
                        </div>
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/img/dataweb/') . $hewan['gambar_hewan']; ?>" class="img-thumbnail">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenismakanan">Jenis Makanan</label>
                        <input type="text" name="jenismakanan" id="jenismakanan" value="<?= $hewan['jenis_makanan'];?>" class="form-control">
                        <small class="form-text text-danger">beri '-' jika kosong.</small>
                        <small class="form-text text-danger"><?= form_error('jenismakanan'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="aksesoris">Aksesoris</label>
                        <input type="text" name="aksesoris" id="aksesoris" value="<?= $hewan['aksesoris'];?>" class="form-control">
                        <small class="form-text text-danger">beri '-' jika kosong.</small>
                        <small class="form-text text-danger"><?= form_error('aksesoris'); ?></small>
                    </div>

                    <a href="<?= base_url(); ?>admin" class="btn btn-warning float-left">Kembali</a>
                    <button type="submit" class="btn btn-primary float-right">Ubah Data</button>	
                    <?= form_close(); ?>
                </div>
            </div>

        </div>
    </div>
    </div>
    
    