    <!-- isi -->
    <div class="container">

        <div class="row mt-5">
            <div class="col-md-6">
                <?= form_open(); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="ID/Nama.." name="cariidnama">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Cari pesanan</button>
                        </div>
                    </div>
                <?= form_close(); ?>
            </div>
            <div class="col-md-6 text-center">
                <h4>Tanggal : <?= date('d-m-Y');?></h4>
            </div>
        </div>
    </div>
    <!-- isi akhir -->
    
    <?php if ( $this->session->flashdata('toolow') ) : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong?><?= $this->session->flashdata('toolow'); ?></strong>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- data -->
    <div class="container">
        <hr>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    <p>* Mohon pastikan tanggal batas pembayaran belum berakhir.</p>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <h3 class="text-center mb-4">Data Pemesanan</h3>

                <?php if ( $this->session->flashdata('msg-success') ) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Pesanan <strong>berhasil</strong> <?= $this->session->flashdata('msg-success'); ?> .
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
                        <td>OPSI</td>
                        <td>ID Pemesanan</td>
                        <td>Nama Lengkap Pemesan</td>
                        <td>Tanggal Pemesanan</td>
                        <td>Tanggal Pembayaran</td>
                    </tr>

                    <tr>
                    <?php $i= 1; ?>
                    <?php foreach( $pesanan as $p ): ?>

                        <td><?= $i;  ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/detailPesanan/<?= $p['id_pemesanan']; ?>" class="btn btn-outline-primary">detail</a>
                            <a href="<?= base_url(); ?>admin/hapusPesanan/<?= $p['id_pemesanan']; ?>" onclick="return confirm('Apa anda yakin ?');" class="btn btn-outline-danger">hapus</a>
                        </td>
                        <td><?= html_escape($p['id_pemesanan']);?></td>
                        <td><?= html_escape($p['nama_lengkap_pemesan']) ;?></td>
                        <td><?= html_escape($p['tanggal_pemesanan']) ;?></td>
                        <td class="text-danger"><?= html_escape($p['batas_pembayaran']) ;?></td>
                    </tr>
                    <?php $i++ ; ?>
                    <?php endforeach; ?>

                </table>

                <?php if ( empty($pesanan) ) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan.
                        </div>
                    <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- data -->