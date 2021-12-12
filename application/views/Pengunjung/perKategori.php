<div class="container">

    <div class="row mt-5">
        <div class="col-md-4">
            <h2>Toko Kami</h2>
        </div>
        <div class="col-md-8">
            <?= form_open(); ?>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari nama <?= $namakategori['nama_kategori'] ;?>.." name="cariToko">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Cari</button>
                    </div>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
    <hr>

    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <h3 align="center">Kategori : <?= $namakategori['nama_kategori'];?></h3>
        </div>
    </div>

    <?php if ( empty($hewan) ) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan.
                        </div>
                    <?php endif; ?>

    <!-- card berita -->
    <div class="row mx-auto mb-5">
                    <?php foreach ($hewan as $h) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/img/dataweb/') . html_escape($h['gambar_hewan']); ?>" style="height:16rem;" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title text-uppercase"><?= $h['nama_hewan'];?></h4>
                            <p class="card-text text-muted"><?= "Rp " . number_format(html_escape($h['harga_hewan']),0,'.','.') ;?></p>
                            <p class="card-title">Stok : <?= $h['ketersediaan'];?></p>
                            <p>Tanggal update : <?= $h['tanggal_ubah'];?></p>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?= base_url();?>pengunjung/detail/<?= $h['id_data']; ?>" class="btn btn-primary btn-block mb-2">Detail</a>
                                </div>
                                <div class="col-md-12">    
                                <?php if ($h['ketersediaan'] == 'Ada') : ?>
                                    <a href="<?= base_url();?>pengunjung/tambah_ke_keranjang/<?= $h['id_data'];?>" class="add_cart btn btn-success btn-block">Masukkan ke keranjang</a>
                                <?php else: ?>
                                    <button class="add_cart btn btn-success btn-block" onclick="alert('Stok habis')">Masukkan ke keranjang</button>
                                <?php endif; ?>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>
                <!-- card berita -->

</div>