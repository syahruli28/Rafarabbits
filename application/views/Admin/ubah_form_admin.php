<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <title>RafaRabbit's | Ubah Form Admin</title>
</head>
<body>

    <div class="container">

    <div class="row mt-4">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header" style="background: #db5b20;color:#fff;">
                    Form Ubah Data Admin
                </div>

                <div class="card-body">
                    <?= form_open(''); ?>

                    <input type="hidden" name="id" id="id" value="<?= $admin['id_admin']; ?>">
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?= $admin['username_admin']; ?>" class="form-control">
                        <small class="form-text text-danger"><?= form_error('username'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?= $admin['email_admin']; ?>" class="form-control">
                        <small class="form-text text-danger"><?= form_error('email'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="passwordlama">Password Lama Anda</label>
                        <input type="password" name="passwordlama" id="passwordlama" placeholder="Password Lama Anda.." class="form-control">
                        <small class="form-text text-danger"><?= form_error('passwordlama'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="password1">Password Baru</label>
                        <input type="password" name="password1" id="password1" placeholder="Password baru.." class="form-control">
                        <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="password2">Password Baru</label>
                        <input type="password" name="password2" id="password2" placeholder="Ulangi password baru.." class="form-control">
                        <small class="form-text text-danger"><?= form_error('password2'); ?></small>
                    </div>

                    <a href="<?= base_url(); ?>admin/dataAdmin" class="btn btn-warning float-left">Kembali</a>
                    <button type="submit" class="btn btn-primary float-right">Ubah Data</button>	
                    <?= form_close(); ?>
                </div>
            </div>

        </div>
    </div>
    </div>
    
    