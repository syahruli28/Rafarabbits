<div class="container">
<div class="row mt-5 mb-5">
    <div class="col-md-12">

    <div class="card mb-3" style="max-width: 100%;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/dataweb/') . html_escape($detail['gambar_hewan']); ?>" class="card-img">
            </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title text-uppercase"><b><?=html_escape($detail['nama_hewan']);?></b></h1>
                    <h3 class="card-text text-muted"><b><?= "Rp " . number_format(html_escape($detail['harga_hewan']),0,'.','.') ;?></b></h3>
                    <h3 class="card-text mb-5">Deskripsi : <?=html_escape($detail['catatan_tambahan']);?></h3>
                    
                    <p class="card-text">Jenis makanan : <?=html_escape($detail['jenis_makanan']);?></p>
                    <p class="card-text">Aksesoris: <?=html_escape($detail['aksesoris']);?></p>
                    <p class="card-text">Ketersediaan : <?=html_escape($detail['ketersediaan']);?></p>
                    <h5>Tanggal update : 
                        <div class="btn btn-warning" style="color:#fff;">     
                            <?= html_escape($detail['tanggal_ubah']);?>
                        </div>
                    </h5>

                    <!-- tambah btn -->
                    <?php if ($detail['ketersediaan'] == 'Ada') : ?>
                        <a href="<?= base_url();?>pengunjung/tambah_ke_keranjang/<?= $detail['id_data'];?>" class="add_cart btn btn-success btn-block">Masukkan ke keranjang</a>
                    <?php else: ?>
                        <button class="add_cart btn btn-success btn-block mt-1" onclick="alert('Stok habis')">Masukkan ke keranjang</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
</div>