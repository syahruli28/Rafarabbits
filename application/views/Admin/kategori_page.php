        <!-- isi -->
    <div class="container">

        <div class="row mt-5">
            <div class="col-md-6">
                <a href="<?= base_url(); ?>admin/tambahFormKategori" class="btn btn-success">Tambah Jenis Kategori</a>
            </div>
        </div>
    </div>
    <!-- isi akhir -->
    
    <!-- data -->
    <div class="container">
        <hr>
        <div class="row mt-5">
            <div class="col-lg-12">
                <h3 class="text-center mb-4">Data Jenis Kategori</h3>

                <?php if ( $this->session->flashdata('msg-success') ) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Kategori <strong>berhasil</strong> <?= $this->session->flashdata('msg-success'); ?> .
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
                        <td>Nama Kategori</td>
                    </tr>

                    <tr>
                    <?php $i= 1; ?>
                    <?php foreach( $kategori as $k ): ?>

                        <td><?= $i;  ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/ubah_data_kategori/<?= $k['id_kategori']; ?>" class="btn btn-outline-primary">ubah</a>
                            <a href="<?= base_url(); ?>admin/hapus_data_kategori/<?= $k['id_kategori']; ?>" onclick="return confirm('Jika Anda menghapus jenis kategori ini maka seluruh item dengan jenis kategori ini akan terhapus semua, Apa anda yakin ?');" class="btn btn-outline-danger">hapus</a>
                        </td>
                        <td><?= html_escape($k['nama_kategori']) ;?></td>
                    </tr>
                    <?php $i++ ; ?>
                    <?php endforeach; ?>

                </table>

                <?php if ( empty($kategori) ) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan.
                        </div>
                    <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- data -->