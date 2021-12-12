<?php

if($this->session->userdata('email')){
    redirect('admin');
}

;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/img/favicon/rr.ico">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/login.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">
    <title>RafaRabbit's | Login Page</title>
</head>
<body>
    <div class="box-kembali">
        <div class="container">
            <a href="<?= base_url() ;?>">Kembali</a>
        </div>
    </div>

    <?php if ( $this->session->flashdata('message') ) : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong?><?= $this->session->flashdata('message'); ?></strong>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif ( $this->session->flashdata('logout-msg') ): ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong?><?= $this->session->flashdata('logout-msg'); ?></strong>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="box">
		<h2>Login</h2>
		<?= form_open('auth') ;?>
			<div class="inputform">
                <input type="text" name="username" id="username" required>
                <small class="form-text text-danger"><?= form_error('username'); ?></small>
				<label for="username">Username</label>
			</div>
			<div class="inputform">
                <input type="password" name="password" id="password" required>
                <small class="form-text text-danger"><?= form_error('password'); ?></small>
				<label for="password">Password</label>
			</div>
			<button type="submit">Submit</button>
			<?= form_close() ;?>
	</div>
</body>
</html>