        <!-- isi -->
    <div class="container">

        <div class="row mt-5">
            <div class="col-md-6">
                <a href="<?= base_url(); ?>admin/halamanRegistrasiRR" class="btn btn-success">Tambah Admin</a>
            </div>
        </div>
    </div>
    <!-- isi akhir -->
    
    <!-- data -->
    <div class="container">
        <hr>
        <div class="row mt-5">
            <div class="col-lg-12">
                <h3 class="text-center mb-4">Data Admin</h3>

                <?php if ( $this->session->flashdata('msg-success') ) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Admin <strong>berhasil</strong> <?= $this->session->flashdata('msg-success'); ?> .
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                    </div>
                </div>
                <?php elseif ( $this->session->flashdata('msg-gagalubah') ) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data Admin <strong>Gagal</strong> <?= $this->session->flashdata('msg-gagalubah'); ?> .
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                    </div>
                </div>
                <?php elseif ( $this->session->flashdata('msg-no') ) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?= $this->session->flashdata('msg-no'); ?></strong> 
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
                        <td>Nama Admin/Username</td>
                        <td>Email</td>
                    </tr>

                    <tr>
                    <?php $i= 1; ?>
                    <?php foreach( $admin as $a ): ?>

                        <td><?= $i;  ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/ubah_data_admin/<?= $a['id_admin']; ?>" class="btn btn-outline-primary">ubah</a>
                            <a href="<?= base_url(); ?>admin/hapus_data_admin/<?= $a['id_admin']; ?>" onclick="return confirm('Apa anda yakin ?');" class="btn btn-outline-danger">hapus</a>
                        </td>
                        <td><?= html_escape($a['username_admin']) ;?></td>
                        <td><?= html_escape($a['email_admin']) ;?></td>
                    </tr>
                    <?php $i++ ; ?>
                    <?php endforeach; ?>

                </table>

                <?php if ( empty($admin) ) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan.
                        </div>
                    <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- data -->