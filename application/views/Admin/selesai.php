    <!-- isi -->
    <div class="container">

        <div class="row mt-5">
            <div class="col-md-6">
                <?= form_open(); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="ID Transaksi/Tanggal Pembayaran (Contoh : 21/02/2021)..." name="carit">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Cari</button>
                        </div>
                    </div>
                <?= form_close(); ?>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary" onclick="window.print()">Print</button>
            </div>
        </div>
    </div>
    <!-- isi akhir -->
    
    <!-- data -->
    <div class="container">
        <hr>
        <div class="row mt-5">
            <div class="col-md-12">
                <h3 class="text-center mb-4">Data Pemesanan Selesai</h3>

                <?php if ( $this->session->flashdata('msg-success') ) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Pesanan Selesai <strong>berhasil</strong> <?= $this->session->flashdata('msg-success'); ?> .
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
                        <td>ID Transaksi</td>
                        <td>Total Bayar</td>
                        <td>Tanggal Bayar</td>
                    </tr>

                    <tr>
                    <?php $i= 1; ?>
                    <?php foreach( $selesai as $s ): ?>

                        <td><?= $i;  ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/hapusPesananSelesai/<?= $s['id_pembayaran']; ?>" onclick="return confirm('Apa anda yakin ?');" class="btn btn-outline-danger">hapus</a>
                        </td>
                        <td><?= html_escape($s['id_pembayaran']);?></td>
                        <td><?= "Rp " . number_format(html_escape($s['total_pembayaran']),0,',','.');?></td>
                        <td><?= html_escape($s['tanggal_pembayaran']) ;?></td>
                    </tr>
                    <?php $i++ ; ?>
                    <?php endforeach; ?>

                </table>

                <?php if ( empty($selesai) ) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan.
                        </div>
                    <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- data -->