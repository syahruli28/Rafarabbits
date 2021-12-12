<?php 

class Admin_model extends CI_Model {

	public function getAllHewan()
	{
		// return $this->db->get('tb_dagangan')->result_array();
		$this->db->select('*');
		$this->db->from('tb_dagangan');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_dagangan.id_kategori', 'left');
		return $this->db->get()->result_array();
	}
	
	public function getHewanById($id)
	{
		return $this->db->get_where('tb_dagangan', ['id_data' => $id])->row_array();
	}

    public function tambahDataHewan()
	{
		$nama			= $this->input->post('nama', true);
		$kategori			= $this->input->post('kategori', true);
	    $makanan			= $this->input->post('jenismakanan', true);
	    $aksesoris			= $this->input->post('aksesoris', true);
		$gambar			= $_FILES['gambar'];
		if ($gambar=''){}else{
			$config['upload_path']	=	'./assets/img/dataweb';
			$config['allowed_types']	=	'jpg|png';
			$config['encrypt_name']	=	true;
			
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('gambar')){
				echo "Upload Gagal"; die();
			}else{
				$gambar=$this->upload->data('file_name');
			}
		}
	    $harga			= $this->input->post('harga', true);
		$ketersediaan	= $this->input->post('ketersediaan', true);
		$catatan	= $this->input->post('catatan', true);
		
		$data = array(
			'nama_hewan'			=> $nama,
			'gambar_hewan'			=> $gambar,
			'catatan_tambahan'		=> $catatan,
			'harga_hewan'			=> $harga,
			'ketersediaan'			=> $ketersediaan,
			'tanggal_ubah'			=> date('Y/m/d'),
			'jenis_makanan'			=> $makanan,
			'aksesoris'				=> $aksesoris,
			'id_kategori'			=> $kategori,
		);
		// print_r($data);die;
	    $this->db->insert('tb_dagangan', $data);
	}

	public function hapusDataHewan($id, $data)
	{
		$gambar = $data['hewan']['gambar_hewan'];
		if ($gambar){
			unlink(FCPATH . 'assets/img/dataweb/' . $gambar);
				// hapus gambar lama 
		}
		$this->db->where('id_data', $id);
		$this->db->delete('tb_dagangan');
	}

	public function ubahDataHewan($data)
	{

		$nama = htmlspecialchars($this->input->post('nama'));
		$harga = htmlspecialchars($this->input->post('harga'));
		$kategori = htmlspecialchars($this->input->post('kategori'));
		$makanan = htmlspecialchars($this->input->post('jenismakanan'));
		$aksesoris = htmlspecialchars($this->input->post('aksesoris'));
		$ketersediaan = htmlspecialchars($this->input->post('ketersediaan'));
		$catatan	= $this->input->post('catatan');
		$upload_image = $_FILES['gambar'];
		// cek jika ada gambar yang diupload
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'png|jpg'; // format gambar yang dibolehkan
			$config['upload_path']   = './assets/img/dataweb/'; // tempat file untuk upload gambar
			$config['encrypt_name']	=	true;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('gambar')) {
				$old_image = $data['hewan']['gambar_hewan']; // ambil data gambar lama dari session.
				if ($old_image) {
					unlink(FCPATH . 'assets/img/dataweb/' . $old_image);
					// hapus gambar lama 
				}

				$new_image = $this->upload->data('file_name');
				// $this->db->set('gambar_hewan', $new_image); // update gambar lama dengan yang baru.
			} else {
				echo $this->upload->display_errors();
			}
		}else{
			$new_image = $data['hewan']['gambar_hewan'];
		}

		$data = array(
			'nama_hewan'			=> $nama,
			'gambar_hewan'			=> $new_image,
			'catatan_tambahan'		=> $catatan,
			'harga_hewan'			=> $harga,
			'ketersediaan'			=> $ketersediaan,
			'tanggal_ubah'			=> date('Y/m/d'),
			'jenis_makanan'			=> $makanan,
			'aksesoris'				=> $aksesoris,
			'id_kategori'			=> $kategori,
		);

		// print_r($data);die;
		$this->db->where('id_data', $this->input->post('id'));
		$this->db->update('tb_dagangan', $data);
	}

	public function cariDataHewan()
	{
		$keyword = $this->input->post('keyword');
		$this->db->like('nama_hewan', $keyword);
		// return $this->db->get('tb_dagangan')->result_array();
		$this->db->select('*');
		$this->db->from('tb_dagangan');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_dagangan.id_kategori', 'left');
		return $this->db->get()->result_array();
	}

	public function getAllKategori()
	{
	    return $this->db->get('tb_kategori')->result_array();
	}

	public function tambahDataKategori()
	{
	    $nama = $this->input->post('namakategori', true);
	
		$data = array(
			'nama_kategori'			=> $nama,
		);
		// print_r($data);die;
	    $this->db->insert('tb_kategori', $data);
	}

	public function getKategoriById($id)
	{
		return $this->db->get_where('tb_kategori', ['id_kategori' => $id])->row_array();
	}

	public function ubahDataKategori($data)
	{

		$nama = htmlspecialchars($this->input->post('namakategori'));

		$data = array(
			'nama_kategori'			=> $nama,
		);

		// print_r($data);die;
		$this->db->where('id_kategori', $this->input->post('id'));
		$this->db->update('tb_kategori', $data);
	}

	public function hapusDataKategori($id)
	{
		$gambarnya =  $this->db->get_where('tb_dagangan', ['id_kategori' => $id])->result_array();
		// hapus pada tb dagang
		foreach ($gambarnya as $g) {
			# code...
			$gambar = $g['gambar_hewan'];
			if ($gambar){
				unlink(FCPATH . 'assets/img/dataweb/' . $gambar);
					// hapus gambar lama 
			}
			$this->db->where('id_kategori', $id);
			$this->db->delete('tb_dagangan');

		}
		
		// hapus pada tb kategori dan dagangan
		$this->db->where('id_kategori', $id);
		$this->db->delete('tb_kategori');

	}

	public function getAllAdmin()
	{
	    return $this->db->get('tb_admin')->result_array();
	}

	public function getAdminById($id)
	{
		return $this->db->get_where('tb_admin', ['id_admin' => $id])->row_array();
	}

	public function ubahDataAdmin($data)
	{

		$idadmin = $this->input->post('id');
		$passwordlama = htmlspecialchars($this->input->post('passwordlama'));
		$adminse = $this->db->get_where('tb_admin', ['id_admin' => $idadmin])->row_array();
		// cek password lama apakah benar
		if ($adminse){
			// cek passwordnya
			if(password_verify($passwordlama, $adminse['password_admin'])){
				$username = htmlspecialchars($this->input->post('username', true));
				$email = htmlspecialchars($this->input->post('email', true));
				$password = password_hash($this->input->post('password1', true), PASSWORD_DEFAULT);

				$data = array(
					'username_admin'			=> $username,
					'email_admin'				=> $email,
					'password_admin'			=> $password,
				);

				// print_r($data);die;
				$this->db->where('id_admin', $this->input->post('id'));
				$this->db->update('tb_admin', $data);

				$this->session->set_flashdata('msg-success', 'Diubah');
				redirect('admin/dataAdmin');
			}else{
				$this->session->set_flashdata('msg-gagalubah', 'Diubah (Password lama salah.)');
				redirect('admin/dataAdmin');
			}
		}
		
	}

	public function hapusDataAdmin($id)
	{
		$idakunutama = $this->db->get_where('tb_admin', ['email_admin' => $this->session->userdata('email')])->row_array();

		$targetdelete = $this->db->get_where('tb_admin', ['id_admin' => $id])->row_array();
		// $emailsession = $this->session->userdata('email');

		// cek apakah email sama dengan email target akun yang akan dihapus
		if($this->session->userdata('email') == $targetdelete['email_admin']){
			// cek apakah akun utama yang akan dihapus
			if($id == 7 ){
				$this->session->set_flashdata('msg-no', 'Anda tidak bisa menghapus akun utama.');
				redirect('admin/dataAdmin');
			}
			// kalau bukan akun utama yang akan dihapus
			$this->db->where('id_admin', $id);
			$this->db->delete('tb_admin');

			$this->session->unset_userdata('email');
			$this->session->set_flashdata('message', 'Akun admin berhasil dihapus.');
			redirect('auth');

		// cek apakah akun utama yang menghapus
		}elseif($idakunutama['id_admin'] == 7){
			$this->db->where('id_admin', $id);
			$this->db->delete('tb_admin');
			$this->session->set_flashdata('msg-success', 'Dihapus');
			redirect('admin/dataAdmin');
		}else{
			// cek apakah akun utama yang akan dihapus
			if($id == 7 ){
				$this->session->set_flashdata('msg-no', 'Anda tidak bisa menghapus akun utama.');
				redirect('admin/dataAdmin');
			}
			$this->session->set_flashdata('msg-gagalubah', 'Dihapus (Anda tidak berwenang menghapus akun admin ini.)');
			redirect('admin/dataAdmin');
		}
	}

	// PENGELOLAAN PEMESANAN
	public function getAntrianPesanan()
	{
	    return $this->db->get('tb_antrian_pemesanan')->result_array();
	}

	public function getPesananById($id)
	{
		return $this->db->get_where('tb_antrian_pemesanan', ['id_pemesanan' => $id])->row_array();
	}

	public function cariDataPesanan()
	{
		$keyword = $this->input->post('cariidnama');
		$this->db->like('id_pemesanan', $keyword);
		$this->db->or_like('nama_lengkap_pemesan', $keyword);
		return $this->db->get('tb_antrian_pemesanan')->result_array();
	}

	public function hapusDataPesanan($id)
	{
		$this->db->where('id_pemesanan', $id);
		$this->db->delete('tb_antrian_pemesanan');
	}

	public function tambahDataSelesai()
	{
	    $idpem			= $this->input->post('id', true);
	    $total			= $this->input->post('pembayaran', true);
		$tanggal		= $this->input->post('tanggal', true);
		
		$data = array(
			'id_pembayaran'				=> $idpem,
			'total_pembayaran'			=> $total,
			'tanggal_pembayaran'		=> $tanggal
		);
		// print_r($data);die;
		$this->db->insert('tb_pesanan_selesai', $data);

		// hapus data dari tabel antrian pesanan
		$this->db->where('id_pemesanan', $idpem);
		$this->db->delete('tb_antrian_pemesanan');
		
	}

	public function getAllSelesai()
	{
		return $this->db->get('tb_pesanan_selesai')->result_array();
	}

	public function getSelesaiById($id)
	{
		return $this->db->get_where('tb_pesanan_selesai', ['id_pembayaran' => $id])->row_array();
	}

	public function hapusDataSelesai($id)
	{
		$this->db->where('id_pembayaran', $id);
		$this->db->delete('tb_pesanan_selesai');
	}

	public function cariDataSelesai()
	{
		$keyword = $this->input->post('carit');
		$this->db->like('id_pembayaran', $keyword);
		$this->db->or_like('tanggal_pembayaran', $keyword);
		return $this->db->get('tb_pesanan_selesai')->result_array();
	}

}
