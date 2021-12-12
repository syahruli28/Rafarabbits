<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		is_logged_in();
	}

	public function index()
	{
		// $data['judul'] =  'Halaman Mahasiswa';
		$data['judul']  =  'RafaRabbits | Halaman Admin';
		$data['hewan'] = $this->Admin_model->getAllHewan();
		if ( $this->input->post('keyword') ) {
			$data['hewan'] = $this->Admin_model->cariDataHewan();
		}
		$this->load->view('templates/header_admin', $data);
		$this->load->view('Admin/admin_page', $data);
		$this->load->view('templates/footer_admin');
	}

	public function tambahForm()
    {
		// form validation
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[6]');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');

		$data['kategori'] = $this->Admin_model->getAllKategori();

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('admin/tambah_form', $data);
    		$this->load->view('templates/footer_admin');
		} else {
			$this->Admin_model->tambahDataHewan();
			$this->session->set_flashdata('msg-success', 'Ditambahkan');
			redirect('Admin');
			// flashdata
		}
        
	}
	
	public function hapus_data($id)
	{
		$data['hewan'] = $this->Admin_model->getHewanById($id);
		$this->Admin_model->hapusDataHewan($id, $data);
		$this->session->set_flashdata('msg-success', 'Dihapus');
		redirect('admin');
	}

	public function ubah_data($id)
	{
		$data['hewan'] = $this->Admin_model->getHewanById($id);
		$data['ketersediaan'] = ['Ada', 'Kosong'];
		$data['kategori'] = $this->Admin_model->getAllKategori();

		// form validation
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[6]');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('admin/ubah_form', $data);
			$this->load->view('templates/footer_admin');
		} else {
			$this->Admin_model->ubahDataHewan($data);
			// flashdata
			$this->session->set_flashdata('msg-success', 'Diubah');
			redirect('admin');
		}
	}

	public function dataKategori()
	{
		// $data['judul'] =  'Halaman Mahasiswa';
		$data['judul']  =  'RafaRabbits | Halaman Jenis Kategori';
		$data['kategori'] = $this->Admin_model->getAllKategori();

		$this->load->view('templates/header_admin', $data);
		$this->load->view('Admin/kategori_page', $data);
		$this->load->view('templates/footer_admin');
	}

	public function tambahFormKategori()
    {
		// form validation
		$this->form_validation->set_rules('namakategori', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('admin/tambah_form_kategori');
    		$this->load->view('templates/footer_admin');
		} else {
			$this->Admin_model->tambahDataKategori();
			$this->session->set_flashdata('msg-success', 'Ditambahkan');
			redirect('Admin/dataKategori');
			// flashdata
		}
        
	}

	public function ubah_data_kategori($id)
	{
		$data['kategori'] = $this->Admin_model->getKategoriById($id);

		// form validation
		$this->form_validation->set_rules('namakategori', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('admin/ubah_form_kategori', $data);
			$this->load->view('templates/footer_admin');
		} else {
			$this->Admin_model->ubahDataKategori($data);
			// flashdata
			$this->session->set_flashdata('msg-success', 'Diubah');
			redirect('admin/dataKategori');
		}
	}

	public function hapus_data_kategori($id)
	{
		$data['kategori'] = $this->Admin_model->getKategoriById($id);
		// $data['hewan'] = $this->Admin_model->getHewanById($id);
		$this->Admin_model->hapusDataKategori($id);
		$this->session->set_flashdata('msg-success', 'Dihapus');
		redirect('admin/dataKategori');
	}

	public function dataAdmin()
	{
		// $data['judul'] =  'Halaman Mahasiswa';
		$data['judul']  =  'RafaRabbits | Halaman Data Admin';
		$data['admin'] = $this->Admin_model->getAllAdmin();

		$this->load->view('templates/header_admin', $data);
		$this->load->view('Admin/v_admin', $data);
		$this->load->view('templates/footer_admin');
	}

	public function halamanRegistrasiRR()
	{
		$this->halamanRegistrasi();
	}

	private function halamanRegistrasi()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_admin.email_admin]', [
			'is_unique' => 'Email sudah terdaftar, gunakan Email yang lainnya.'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama',
			'min_length' => 'Password terlalu pendek, minimal 3 kata'
		]);
        $this->form_validation->set_rules('password2', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/halaman-registrasi');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $data = array(
                'username_admin'    => $username,
                'email_admin'       => $email,
                'password_admin'    => $password,
            );
            // print_r($data);die;
            $this->db->insert('tb_admin', $data);
            redirect('admin/dataAdmin');
        }
	}
	
	public function ubah_data_admin($id)
	{
		$data['admin'] = $this->Admin_model->getAdminById($id);

		// form validation
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		// is_unique[tb_admin.email_admin]', [
		// 	'is_unique' => 'Email sudah terdaftar, gunakan Email yang lainnya.'
		// ]);
		$this->form_validation->set_rules('passwordlama', 'Password Lama', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama',
			'min_length' => 'Password terlalu pendek, minimal 3 kata'
		]);
        $this->form_validation->set_rules('password2', 'Password', 'required');

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('admin/ubah_form_admin', $data);
			$this->load->view('templates/footer_admin');
		} else {
			$this->Admin_model->ubahDataAdmin($data);
			// flashdata
			// $this->session->set_flashdata('msg-success', 'Diubah');
			// redirect('admin/dataAdmin');
		}
	}

	public function hapus_data_admin($id)
	{
		$data['admin'] = $this->Admin_model->getAdminById($id);
		$this->Admin_model->hapusDataAdmin($id, $data);
		// $this->session->set_flashdata('msg-success', 'Dihapus');
		// redirect('admin/dataAdmin');
	}

	// PENGELOLAAN PEMESANAN
	public function antrianPesanan()
	{
		$data['judul']  =  'RafaRabbits | Antrian Pesanan';
		$data['pesanan'] = $this->Admin_model->getAntrianPesanan();
		if ( $this->input->post('cariidnama') ) {
			$data['pesanan'] = $this->Admin_model->cariDataPesanan();
		}
		$this->load->view('templates/header_admin', $data);
		$this->load->view('Admin/antrianPemesanan', $data);
		$this->load->view('templates/footer_admin');
	}

	public function detailPesanan($id)
	{
		// $data['judul'] = 'RafaRabbit`s | Detail';
		$data['dp'] = $this->Admin_model->getPesananById($id);

		$this->load->view('Admin/detailPemesanan', $data);
		$this->load->view('templates/footer_admin');
	}

	public function hapusPesanan($id)
	{
		$data['pesanan'] = $this->Admin_model->getPesananById($id);
		$this->Admin_model->hapusDataPesanan($id);
		$this->session->set_flashdata('msg-success', 'Dihapus');
		redirect('admin/antrianPesanan');
	}

	public function pesananSelesai()
	{
		// form validation
		$this->form_validation->set_rules('pembayaran', 'Total pembayaran', 'required|numeric');

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('admin/formPesananSelesai');
    		$this->load->view('templates/footer_admin');
		} else {
			$this->Admin_model->tambahDataSelesai();

			$this->session->set_flashdata('msg-success', 'Ditambahkan');
			redirect('admin/selesai');
			// flashdata
		}

	}

	public function selesai()
		{
			// $data['judul'] =  'Halaman Mahasiswa';
			$data['judul']  =  'RafaRabbits | Pesanan Selesai';
			$data['selesai'] = $this->Admin_model->getAllSelesai();
			if ( $this->input->post('carit') ) {
				$data['selesai'] = $this->Admin_model->cariDataSelesai();
			}
			$this->load->view('templates/header_admin', $data);
			$this->load->view('Admin/selesai', $data);
			$this->load->view('templates/footer_admin');
		}

		public function hapusPesananSelesai($id)
	{
		$data['selesai'] = $this->Admin_model->getSelesaiById($id);
		$this->Admin_model->hapusDataSelesai($id, $data);
		$this->session->set_flashdata('msg-success', 'Dihapus');
		redirect('admin/selesai');
	}

}
