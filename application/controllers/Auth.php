<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
		$this->load->library('form_validation');
	}

    public function index()
	{
		// if ($this->session->userdata('email') ){
		// 	redirect('user');
		// } // cek apakah data session masih ada.
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ( $this->form_validation->run() == FALSE ){
			$this->load->view('auth/login');
		} else {
			// validasinya sukses
			$this->_login();
		}
    }

    private function _login()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$admin = $this->db->get_where('tb_admin', ['username_admin' => $username])->row_array();
		
		// jika usernya ada

		if($admin){
			// cek password
			if (password_verify($password, $admin['password_admin'])){
				$data = [
					'email' => $admin['email_admin']
				];
                $this->session->set_userdata($data);
                redirect('admin');
			} else {
				$this->session->set_flashdata('message', 'Password Salah.');
				redirect('auth');
            }
        }else{
			$this->session->set_flashdata('message', 'Username Salah.');
			redirect('auth');
		}
    }

    // private function halamanRegistrasi()
    // {
    //     $this->form_validation->set_rules('username', 'Username', 'required');
    //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_admin.email_admin]', [
	// 		'is_unique' => 'Email sudah terdaftar, gunakan Email yang lainnya.'
	// 	]);
	// 	$this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]', [
	// 		'matches' => 'Password tidak sama',
	// 		'min_length' => 'Password terlalu pendek, minimal 3 kata'
	// 	]);
    //     $this->form_validation->set_rules('password2', 'Password', 'required');
        
    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('auth/halaman-registrasi');
    //     } else {
    //         $username = $this->input->post('username');
    //         $email = $this->input->post('email');
    //         $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
    //         $data = array(
    //             'username_admin'    => $username,
    //             'email_admin'       => $email,
    //             'password_admin'    => $password,
    //         );
    //         // print_r($data);die;
    //         $this->db->insert('tb_admin', $data);
    //         redirect('admin/dataAdmin');
    //     }
	// }
	
	public function logout()
	{
		$this->session->unset_userdata('email');

		$this->session->set_flashdata('logout-msg', 'Kamu telah logout.');
		redirect('auth');
	}

}