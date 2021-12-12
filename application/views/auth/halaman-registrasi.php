<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <title>RafaRabbit's | Halaman Registrasi</title>
</head>
<body>

    <div class="container">


    <div class="row mt-4">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header" style="background: #db5b20;color:#fff;">
                    Form Registrasi Admin
                </div>

                <div class="card-body">
                    <?= form_open('admin/halamanRegistrasiRR'); ?>
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                        <small class="form-text text-danger"><?= form_error('username'); ?></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email" class="form-control">
                        <small class="form-text text-danger"><?= form_error('email'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="password1">password</label>
                        <input type="password" name="password1" id="password1" class="form-control">
                        <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="password2">Ulangi password</label>
                        <input type="password" name="password2" id="password2" class="form-control">
                        <small class="form-text text-danger"><?= form_error('password2'); ?></small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary float-right">Buat Akun</button>	
                    <?= form_close(); ?>
                </div>
            </div>

        </div>
    </div>
    </div>
    
    