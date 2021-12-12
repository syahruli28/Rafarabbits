<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengunjung_model');
		$this->load->model('Admin_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

    public function index()
	{
		// $this->load->model('Admin_model');
		// $data['judul'] =  'Halaman Mahasiswa';
		// $data['hewan'] = $this->Admin_model->getAllHewan();
		$data['berita'] = $this->Pengunjung_model->tampilkanBeritaBaru();
		$data['kategori'] = $this->Admin_model->getAllKategori();
		if ( $this->input->post('cariToko') ) {
			// $data['hewan'] = $this->Pengunjung_model->cariDataHewan();
			// $this->session->set_flashdata('msg-failed', 'Ditemukan');

			// $data['judul'] =  'RafaRabbit`s | Toko Kami';
			// $this->load->view('templates/header', $data);
			// $this->load->view('Pengunjung/toko', $data);
			// $this->load->view('templates/footer_pengunjung');
			$key = $this->input->post('cariToko');
			$this->tokoKami($key);
		}else{
			$data['judul'] = 'RafaRabbit`s | Online PetShop';
			$this->load->view('templates/header', $data);
			$this->load->view('Pengunjung/index', $data);
			// $this->load->view('templates/footer_admin');
		}
        
    }
    
    public function halamanKeranjang()
	{
		// $this->load->model('Admin_model');
		$data['kategori'] = $this->Admin_model->getAllKategori();
		$this->load->view('Pengunjung/keranjang-belanja', $data);
		$this->load->view('templates/footer_pengunjung');
    }

    public function tentangKami()
	{
		// $this->load->model('Admin_model');
		$data['kategori'] = $this->Admin_model->getAllKategori();
        $data['judul'] = 'RafaRabbit`s | Tentang Kami';
		$this->load->view('templates/header', $data);
		$this->load->view('Pengunjung/tentang-kami');
		$this->load->view('templates/footer_pengunjung');
	}
	
	public function halamanLogin()
	{
		$this->load->view('Pengunjung/login-admin-rr');
	}

	public function detail($id)
	{
		$data['judul'] = 'RafaRabbit`s | Detail';
		// $data['detail'] = $this->Pengunjung_model->getHewanById($id);
		$data['kategori'] = $this->Admin_model->getAllKategori();
		$data['detail'] = $this->Pengunjung_model->detailNamaKategori($id);

		$this->load->view('templates/header', $data);
		$this->load->view('Pengunjung/detail', $data);
		$this->load->view('templates/footer_pengunjung');
    }
	
	public function tambah_ke_keranjang($id)
	{
		$hewan = $this->Pengunjung_model->find($id);
		$data = array(
			'id'		=>	$hewan->id_data,
			'qty'		=>	1,
			'price'		=>	$hewan->harga_hewan,
			'name'		=>	$hewan->nama_hewan
		);
		$this->cart->insert($data);
		redirect('pengunjung/tokoKami');
	}

	public function hapusKeranjang()
	{
		$this->cart->destroy();
		redirect('pengunjung');
	}

	public function formPemesanan()
	{
		if($this->cart->total_items() == '0'){
			redirect();
		}else{
			// form validation
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]');
			$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|min_length[35]');
			$this->form_validation->set_rules('nowa', 'No. WhatsApp', 'required|min_length[9]|numeric');

			if ($this->form_validation->run() == FALSE ) {
				$this->load->view('pengunjung/form-pemesanan');
				$this->load->view('templates/footer_admin');
			} else {
				$this->Pengunjung_model->masukanKeAntrianPesanan();
				// $this->session->set_flashdata('msg-success', 'Ditambahkan');
				$this->cart->destroy();
				$this->_selesaiPesan();
				// flashdata
			}
		}
	}

	public function tokoKami($key=null)
	{
		// $this->load->model('Admin_model');
		if ($key){
			$data['judul'] =  'RafaRabbit`s | Toko Kami';
			$data['hewan'] = $this->Pengunjung_model->cariDataHewan();
			$this->load->view('templates/header', $data);
			$this->load->view('Pengunjung/toko', $data);
			$this->load->view('templates/footer_pengunjung');
		}else{
			$data['judul'] =  'RafaRabbit`s | Toko Kami';
			$data['hewan'] = $this->Pengunjung_model->getAllDagangan();
			$data['kategori'] = $this->Admin_model->getAllKategori();
			if ( $this->input->post('cariToko') ) {
				$data['hewan'] = $this->Pengunjung_model->cariDataHewan();
			}
			$this->load->view('templates/header', $data);
			$this->load->view('Pengunjung/toko', $data);
			$this->load->view('templates/footer_pengunjung');
		}
	}

	public function perKategori($id)
	{
		// $this->load->model('Admin_model');
		$data['namakategori'] = $this->Admin_model->getKategoriById($id);
		$data['judul'] =  'RafaRabbit`s | Kategori ';
		$data['hewan'] = $this->Pengunjung_model->getDaganganByKategori($id);
		$data['kategori'] = $this->Admin_model->getAllKategori();
		if ( $this->input->post('cariToko') ) {
			$data['hewan'] = $this->Pengunjung_model->cariDataHewan();
			$this->tokoKami();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('Pengunjung/perKategori', $data);
		$this->load->view('templates/footer_pengunjung');
	}

	public function bantuan()
	{
		// $this->load->model('Admin_model');
		$data['kategori'] = $this->Admin_model->getAllKategori();
		$data['judul'] =  'RafaRabbit`s | Bantuan';
		$this->load->view('templates/header', $data);
		$this->load->view('Pengunjung/bantuan', $data);
		$this->load->view('templates/footer_pengunjung');
	}

	private function _selesaiPesan(){
		$this->load->view('pengunjung/halamanBantuanTransaksi');
		$this->load->view('templates/footer_pengunjung');
	}

}