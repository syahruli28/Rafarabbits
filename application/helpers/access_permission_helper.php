<?php 

function is_logged_in()
{
	$ci = get_instance(); // untuk ngambil fitur $this CodeIgniter
	if (!($ci->session->userdata('email')) ) { // cek data session
		redirect('auth'); // kembalikan ke halaman default.
    }
}