<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keywords" content="Beli hewan peliharaan online">
    <title><?= $judul;?></title>
    <meta name="description" content="Temukan dan dapatkan hewan peliharaan yang sesuai dengan keinginan Anda dan makanannya dengan harga TERBAIK!, KHUSUS Wilayah JABODETABEK.">
    <meta name="og:description" content="Temukan dan dapatkan hewan peliharaan yang sesuai dengan keinginan Anda dan makanannya dengan harga TERBAIK!, KHUSUS Wilayah JABODETABEK.">
    <meta name="robots" content="index,follow">
    <meta name="author" content="Rafa Rabbit's">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">
</head>
<body>
    
    <!-- nav awal -->
    <div class="snavbar-kontak">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <p>Untuk konsultasi/pertanyaan hubungi : 085211673330 <img src="<?= base_url();?>assets/img/telephone.png" width="15px"></p>
                </div>
                <div class="col-md-2 login">
                    <a href="<?= base_url();?>auth">Login <img src="<?= base_url();?>assets/img/login.png"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- nav awal -->

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <marquee behavior="scroll" direction="left" scrollamount="10">
                        Membuka jasa Grooming, Suntik & Treatment khusus <b>Kelinci</b>, klik untuk <a href="<?= base_url();?>pengunjung/tentangKami">Info</a>
                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <!-- navbar asli -->
    <div class="stickyNav">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- logo -->
                    <a class="navbar-brand" href="<?= base_url();?>">RafaRabbits</a>
                    <!-- Logo akhir -->
                    <!-- hamburger menu -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- hamburger menu akhir -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <!-- links kiri -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link" href="<?= base_url();?>pengunjung/tentangKami">Tentang Kami</a>
                            </li>
                            <!-- li dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownRafa" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Toko
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownRafa">
                                <a class="dropdown-item" href="<?= base_url();?>pengunjung/tokoKami">Semua Kategori</a>
                                <div class="dropdown-divider"></div>
                                <?php foreach($kategori as $k):?>
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="<?= base_url();?>pengunjung/perKategori/<?= $k['id_kategori'];?>"><?= $k['nama_kategori'];?></a>
                                <?php endforeach;?>
                                </div>
                            </li>
                            <!-- li dropdown -->
                            <li class="nav-item">
                            <a class="nav-link" href="<?= base_url();?>pengunjung/bantuan">Bantuan</a>
                            </li>
                            <!-- links kiri -->
                            <!-- links kanan -->
                            <li class="nav-item box-scart">
                                <a class="nav-link scart" href="<?= base_url();?>pengunjung/halamanKeranjang">
                                    <p class="scart-count">
                                    <?= $this->cart->total_items();?>
                                    </p>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                </a>
                            </li>
                            <!-- link kanan akhir -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    </div>
    <!-- navbar asli akhir -->