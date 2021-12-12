<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <title>RafaRabbit's | Form Pemesanan</title>
</head>
<body>

    <div class="container">

    <?php if ( $this->session->flashdata('msg-failed') ) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Mohon men-Check tombol <strong>'Mengerti'</strong><?= $this->session->flashdata('msg-success'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header" style="background: #db5b20;color:#fff;">
                    Form Pemesanan
                </div>

                <?php 
                    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < 3; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $id_pemesanan = $randomString.'-'.mt_rand(0,210301).date('d-m-Y');
                ;?>

                <div class="card-body">
                    <?= form_open('pengunjung/formPemesanan'); ?>

                    <div class="form-group">
                        <label for="kode">Id Pemesanan</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="<?= $id_pemesanan;?>" readonly>
                        <small class="form-text text-danger">Silahkan dicatat Id Pemesananannya.</small>
                        <small class="form-text text-danger">Id Pemesanan berganti setiap kali refresh halaman.</small>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama lengkap..">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Contoh : Kota, Kec. xxx, Kel. xxx, Nama Perumahan/Komplek, Rt. X/Rw. X, No Rumah. X (nama jalan jika ada.)">
                        <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="nowa">No Telepon</label>
                        <input type="text" name="nowa" id="nowa" class="form-control" placeholder="No Telepon...">
                        <small class="form-text text-danger"><?= form_error('nowa'); ?></small>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">List Pemesanan</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea" name="lb" readonly>
                            <?php foreach($this->cart->contents() as $item ):?>
                            <?= $item['name'];?>
                            <?= $item['qty'];?>
                            Rp <?= number_format($item['price'],0,',','.') ;?>,

                            <?php endforeach;?>
                        </textarea>
                    </div>

                    <div class="alert alert-success">
                        <h5>Total : Rp <?= number_format($this->cart->total(),0,'.','.');?> (sudah termasuk biaya pengiriman.)</h5>
                        <hr>
                        <h5>Aturan/alur Pemesanan :</h5>
                        <p>1. Pemesan <strong>WAJIB menyimpan/memfoto/mencatat Id pemesanan</strong>.</p>
                        <p>...(mengingat <strong>Nama Lengkap</strong> pada saat pemesanan <strong>OPSIONAL)</strong>.</p>
                        <p>2. Pemesan WAJIB mengisi form pemesanan dengan <strong>BENAR & LENGKAP.</strong></p>
                        <p>3. Setelah tombol pesan diklik, form pesanan Anda akan tersimpan dalam penyimpanan sistem kami.</p>
                        <p>4. <strong>untuk pembayaran</strong>, Pemesan <strong>menghubungi</strong> (telephone/WA Chat) salah satu <strong>Admin Rafa Rabbit's</strong> :</p>
                        <p><img src="<?= base_url();?>assets/img/telephone.png" width="15px"> Admin 1 082122427128 (Ella)</p>
                        <p><img src="<?= base_url();?>assets/img/telephone.png" width="15px"> Admin 2 082122427138 (Iki)</p>
                        <p><img src="<?= base_url();?>assets/img/telephone.png" width="15px"> Admin 3 085211673330</p>
                        <p>* <strong>dengan mengirimkan Id Pemesanan dan Nama Lengkap sesuai pada saat mengisi form pemesanan</strong>.</p>
                        <p>5. <strong>Admin menkonfirmasi adanya pemesanan sesuai Id pemesanan dan nama lengkap</strong>, lalu <strong>Admin akan memberitahukan jumlah pembayaran/info pembayaran ke Pemesan<strong>.</p>
                        <p>6. Pemesan melakukan <strong>pembayaran via BANK/ATM</strong> sesuai jumlah tagihan pembayaran yang telah diberikan.</p>
                        <p>7. <strong>Pemesan mengirimkan bukti pembayaran kepada Admin sebelumnya (memberikan id pemesanan & nama lengkap bersifat OPSIONAL)</strong>.</p>
                        <p>8. <strong>Admin menkonfirmasi</strong> adanya <strong>pembayaran</strong>, dan akan <strong>memproses pengiriman pesanan</strong>.</p>
                        <p>SELESAI.</p>

                        <div class="form-check" align="right">
                            <input type="checkbox" class="form-check-input" name="mengerti" id="mengerti">
                            <label class="form-check-label" for="mengerti">Mengerti</label>
                        </div>

                    </div>
                    <div class="alert alert-danger">
                        <p>*. Dahulukan untuk menghubungi Admin kami sebelum melakukan pembayaran.</p>
                    </div>

                    <a href="<?= base_url(); ?>pengunjung/halamanKeranjang" class="btn btn-warning float-left">Kembali</a>
                    <button type="submit" class="btn btn-primary float-right">Pesan</button>

                    <?= form_close(); ?>
                </div>
            </div>

        </div>
    </div>
    </div>
    
    