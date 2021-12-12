
    <!-- image slider -->
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="hero">
                    <img name="slide" class="img-fluid img-slider">
                    <div class="headline">
                        <h1>Selamat datang di Rafarabbit's</h1>
                        <!-- search form -->
                        <?= form_open(); ?>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari.." name="cariToko">
                                <div class="input-group-append">
                                    <button class="btn btn-orange" type="submit">Cari</button>
                                </div>
                            </div>    
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- image slider akhir -->

    <!-- berita -->
    <div class="container">
        <div class="row mt-4 mb-3">
            <div class="col-md-12">
                <h3 class="berita-text">BARU</h3>
                <hr>
                <!-- card berita -->
                <div class="row mx-auto">
                    <?php foreach ($berita as $b) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= base_url('assets/img/dataweb/') . html_escape($b['gambar_hewan']); ?>" style="height:16rem;" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title text-uppercase"><?= $b['nama_hewan'];?></h4>
                            <p class="card-text text-muted"><?= "Rp " . number_format(html_escape($b['harga_hewan']),0,'.','.') ;?></p>
                            <p class="card-title">Stok : <?= $b['ketersediaan'];?></p>

                            <p>Tanggal update : <?= $b['tanggal_ubah'];?></p>    
                                        
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?= base_url();?>pengunjung/detail/<?= $b['id_data']; ?>" class="btn btn-primary btn-block mb-2">Detail</a>
                                </div>
                                <div class="col-md-12">    
                                <?php if ($b['ketersediaan'] == 'Ada') : ?>
                                    <a href="<?= base_url();?>pengunjung/tambah_ke_keranjang/<?= $b['id_data'];?>" class="add_cart btn btn-success btn-block">Masukkan ke keranjang</a>
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
        </div>
    </div>

    <!-- afoot -->
    <div class="afoot">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-6 ll">
                    <h5>Lokasi & Info Layanan</h5>
                    <hr>
                    <p><img src="<?= base_url();?>assets/img/lokasi.png" width="30px"> Jl. Sumatera No.2, Jombang, Kec. Ciputat, Kota Tangerang Selatan, Banten 15414</p>
                    <p><img src="<?= base_url();?>assets/img/alarm-clock.png" width="30px"> Senin-Sabtu, 10.00–19.30</p>
                    <p><img src="<?= base_url();?>assets/img/alarm-clock.png" width="30px"> Minggu, 10.00–17.00</p>
                </div>
                <div class="col-md-6">
                    <h5>Social Media & Toko Lainnya</h5>
                    <hr>
                    <a href="https://www.instagram.com/rabbitrafa/" target="_blank"><p><img src="<?= base_url();?>assets/img/colorinstagram.png" width="20px"> : @rabbitrafa</p></a>
                    <a href="https://www.tokopedia.com/ayyacollection" target="_blank"><p><img src="<?= base_url();?>assets/img/tokopedia.png" width="20px"> : ayyacollection</p></a>
                    <a href="https://shopee.co.id/ayyacollection" target="_blank"><p><img src="<?= base_url();?>assets/img/shopee.png" width="20px"> : ayyacollection</p></a>
                    <a href="https://www.bukalapak.com/u/ria_revalina" target="_blank"><p><img src="<?= base_url();?>assets/img/bukalapak.png" width="20px"> : ayyacollection</p></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <p>&copy; RafaRabbit's, 2020.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- afoot akhir -->

    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- <script src="js/script.js"></script> -->

    <script>
		var i = 0; //start point
		var images = [];
		var time = 3800;

		// list gambar
		images[0] = './././assets/img/peyman-toodari-hS41iEO300E-unsplash.jpg';
		images[1] = './././assets/img/martina-vitakova-OgTBKxHltuM-unsplash.jpg';
		images[2] = './././assets/img/noah-silliman-doBrZnp_wqA-unsplash.jpg';

		// berganti gambar
		function changeImg(){
			document.slide.src = images[i];

			if(i < images.length -1 ){
				i++;
			} else {
				i = 0;
			}

			setTimeout("changeImg()", time);
		}
		window.onload = changeImg;

	</script>
</body>
</html>