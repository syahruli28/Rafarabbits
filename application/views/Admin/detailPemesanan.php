<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <title>Detail Pesanan | RafaRabbit's</title>
</head>
<body>
    
    <div class="container">
        <div class="row mt-5 mb-5">

            <div class="col-md-12">
                <div class="alert alert-success">
                    <h2>Detail Pesanan an. <?= html_escape($dp['nama_lengkap_pemesan']);?></h2>
                </div>
            </div>

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        ID Pemesanan : <?= html_escape($dp['id_pemesanan']);?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Alamat : <?= html_escape($dp['alamat_lengkap_pemesan']);?></li>
                        <li class="list-group-item">No. Telp : <?= html_escape($dp['no_wa_pemesan']);?></li>
                        <li class="list-group-item">List Pembelian : <?= html_escape($dp['list_pembelian']);?></li>
                        <li class="list-group-item">Total Tagihan : <?= "Rp" . number_format(html_escape($dp['total_pembayaran']),0,',','.');?></li>
                        <li class="list-group-item">Tanggal Pemesanan : <?= html_escape($dp['tanggal_pemesanan']);?></li>
                        <li class="list-group-item text-danger">Batas Pembayaran : <?= html_escape($dp['batas_pembayaran']);?></li>
                    </ul>
                </div>

            </div>
            
            <div class="col-md-12">
                <div class="alert alert-warning">
                    <p>* Mohon pastikan tanggal batas pembayaran belum berakhir.</p>
                </div>
            </div>

            <div class="col-md-12">
                <a href="<?= base_url(); ?>admin/antrianPesanan" class="btn btn-warning float-left mt-4">Kembali</a>
                <button class="btn btn-success mt-4 ml-2" onclick="window.print()">Print bukti pemesanan</button>
                <a href="<?= base_url(); ?>admin/pesananSelesai/<?= $dp['id_pemesanan']; ?>/<?= $dp['total_pembayaran']; ?>" class="btn btn-primary float-left mt-4 ml-2">Pesanan selesai</a>
            </div>
        </div>
    </div>

</body>
</html>