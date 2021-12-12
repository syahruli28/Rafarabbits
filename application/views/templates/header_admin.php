<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex,nofollow">
        
        <!-- CSS -->
        <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
        <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">

        <title><?= $judul ;?></title>
        <style>
            .table-orange{
                background: #db5b20;
            }
        </style>
    </head>
    <body>
        
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #db5b20;">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url();?>admin">Rafarabbit's</a>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        
                        <!-- peng. Toko -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownRafa" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pengelolaan Toko
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownRafa">
                                <a class="dropdown-item" href="<?= base_url();?>admin">Pengelolaan Dagangan</a>
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="<?= base_url();?>admin/dataKategori">Pengelolaan Jenis Kategori</a>
                                <a class="dropdown-item" href="<?= base_url();?>admin/dataAdmin">Pengelolaan Admin</a>
                            </div>
                        </li>
                        <!-- peng. Toko -->

                        <!-- peng. Pemesanan -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownRafa" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pengelolaan Pemesanan
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownRafa">
                                <a class="dropdown-item" href="<?= base_url();?>admin/antrianPesanan">Antrian Pemesanan</a>
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="<?= base_url();?>admin/selesai">Pesanan Selesai</a>
                            </div>
                        </li>
                        <!-- peng. Pemesanan -->

                    </ul>
                </div>

                <!-- tombol logout -->
                <a class="btn btn-danger align-right" href="<?= base_url();?>auth/logout">Logout</a>
            </div>
        </nav>
        <!-- Navbar akhir -->