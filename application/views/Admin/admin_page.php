        <!-- isi -->
    <div class="container">

        <div class="row mt-5">
            <div class="col-md-6">
                <?= form_open(); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari nama item.." name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Cari</button>
                        </div>
                    </div>
                <?= form_close(); ?>
            </div>
            <div class="col-md-6">
                <a href="<?= base_url(); ?>admin/tambahForm" class="btn btn-success">Tambah Data</a>
            </div>
        </div>
    </div>
    <!-- isi akhir -->
    
    <!-- data -->
    <!-- <div class="container"> -->
        <hr>
        <div class="row mt-5">
            <div class="col-lg-12">
                <h3 class="text-center mb-4">Data Hewan</h3>

                <?php if ( $this->session->flashdata('msg-success') ) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Hewan <strong>berhasil</strong> <?= $this->session->flashdata('msg-success'); ?> .
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <table class="table table-striped table-bordered">
                    <tr style="background: #db5b20;color: #fff;text-transform:uppercase;">
                        <td>No</td>
                        <td>Opsi</td>
                        <td>Gambar</td>
                        <td>Nama Item</td>
                        <td>Kategori</td>
                        <td>Harga</td>
                        <td>Deskripsi</td>
                        <td>Ketersediaan</td>
                        <td>Tanggal Ubah/Masuk</td>
                        <td>Jenis Makanan</td>
                        <td>Aksesoris</td>
                    </tr>

                    <tr>
                    <?php $i= 1; ?> 
                    <?php foreach( $hewan as $h ): ?>

                        <td><?= $i;  ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/ubah_data/<?= $h['id_data']; ?>" class="btn btn-outline-primary">ubah</a>
                            <a href="<?= base_url(); ?>admin/hapus_data/<?= $h['id_data']; ?>" onclick="return confirm('Apa anda yakin ?');" class="btn btn-outline-danger">hapus</a>
                        </td>
                        <td><img src="<?= base_url('assets/img/dataweb/') . html_escape($h['gambar_hewan']); ?>" width="80"></td>
                        <td><?= html_escape($h['nama_hewan']) ;?></td>
                        <td><?= html_escape($h['nama_kategori']) ;?></td>
                        <td><?= "Rp " . number_format(html_escape($h['harga_hewan']),0,'.','.') ;?></td>
                        <td><?= html_escape($h['catatan_tambahan']) ;?></td>
                        <td><?= html_escape($h['ketersediaan']) ;?></td>
                        <td><?= html_escape($h['tanggal_ubah']) ;?></td>
                        <td><?= html_escape($h['jenis_makanan']) ;?></td>
                        <td><?= html_escape($h['aksesoris']) ;?></td>
                    </tr>
                    <?php $i++ ; ?>
                    <?php endforeach; ?>

                </table>

                <?php if ( empty($hewan) ) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan.
                        </div>
                    <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- data -->