<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
    <title>RafaRabbit's | Antrian Pesanan</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <style>
        .table-orange{
            background: #db5b20;
        }
    </style>
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
                <?= form_open('admin/pesananSelesai'); ?>
                
                <div class="form-group">
                    <label for="id">ID Transaksi</label>
                    <input type="text" name="id" id="id" class="form-control" value="<?= $this->uri->segment(3);?>" readonly>
                </div>

                <div class="form-group">
                    <label for="pembayaran">Total Pembayaran</label>
                    <input type="text" name="pembayaran" id="pembayaran" class="form-control" placeholder="Contoh : 21000">
                    <small class="form-text text-danger">Mohon diisi sesuai format, total bayar jangan lebih rendah dari total tagihan. (<strong>total tagihan : <?= $this->uri->segment(4) ;?>)</strong></small>
                    <small class="form-text text-danger"><?= form_error('pembayaran'); ?></small>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal pembayaran</label>
                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('d/m/Y');?>" readonly>
                    <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                </div>
                
                <a href="<?= base_url(); ?>admin/antrianPesanan" class="btn btn-warning float-left">Kembali</a>
                <button  onclick="return confirm('Apa anda yakin menyelesaikan pesanan ini?');" class="btn btn-primary float-right">Selesai</button>	
                <?= form_close(); ?>
            </div>
        </div>

    </div>

    <div class="col-md-12">
        <div class="alert alert-warning">
            <p>
                * Setelah <strong>menekan tombol SELESAI</strong>, <strong>data antrian pesanan</strong> sesuai dengan data diatas akan <strong>terhapus secara otomatis dari tabel antrian pesanan</strong>.
            </p>
        </div>
    </div>

</div>
</div>