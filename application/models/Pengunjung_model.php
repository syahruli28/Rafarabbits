<?php 

class Pengunjung_model extends CI_Model {

	public function tampilkanberitaBaru()
	{
        // $this->db->order_by('name', 'ASC');
        // return $this->db->get('tb_dagangan')->result_array();
        // ->result_array();
        $this->db->order_by("tanggal_ubah", "desc");
        $this->db->limit(6);
        return $this->db->get_where('tb_dagangan', ['ketersediaan' => 'Ada'])->result_array();

        // return $query->result();
    }

    public function getHewanById($id)
	{
	    return $this->db->get_where('tb_dagangan', ['id_data' => $id])->row_array();
    }
    
    public function find($id)
    {
        $hasil = $this->db->where('id_data', $id)
                            ->limit(1)
                            ->get('tb_dagangan');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        }else{
            return array();
        }
    }

    public function masukanKeAntrianPesanan()
    {
        $mengerti = $this->input->post('mengerti');
        if(!$mengerti){
            $this->session->set_flashdata('msg-failed', 'Gagal');
            redirect('pengunjung/formPemesanan');
        }else{
            date_default_timezone_set('Asia/Jakarta');
            $idpemesanan        = $this->input->post('kode');
            $namapemesan        = $this->input->post('nama', true);
            $alamatpemesan      = $this->input->post('alamat', true);
            $nowa               = $this->input->post('nowa', true);
            $listbeli           = $this->input->post('lb');

            $totalbayar         = $this->cart->total();

            $data = array(
                'id_pemesanan'              => $idpemesanan,
                'nama_lengkap_pemesan'		=> $namapemesan,
                'alamat_lengkap_pemesan'	=> $alamatpemesan,
                'no_wa_pemesan'			    => $nowa,
                'list_pembelian'            => $listbeli,
                'total_pembayaran'          => $totalbayar,
                'tanggal_pemesanan'			=> date('Y-m-d H:i:s'),
                'batas_pembayaran'          => date('Y-m-d H:i:s', mktime( date('H'), date('i'), date('s'), date('m'), date('d')+2, date('Y'))),
		);
        // print_r($data);die;
        $this->db->insert('tb_antrian_pemesanan', $data);
        }
        
    }

    public function getAllDagangan()
    {
        return $this->db->get('tb_dagangan')->result_array();
    }

    public function cariDataHewan()
	{
        $keyword = $this->input->post('cariToko', true);
		$this->db->like('nama_hewan', $keyword);
		return $this->db->get('tb_dagangan')->result_array();
    }

    public function getDaganganByKategori($id)
	{
	    return $this->db->get_where('tb_dagangan', ['id_kategori' => $id])->result_array();
    }

    public function detailNamaKategori($id)
	{
        // $this->db->select('*');
        // $this->db->from('tb_dagangan');
        // $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_dagangan.id_kategori', 'left');
	    return $this->db->get_where('tb_dagangan', ['id_data' => $id])->row_array();
    }

    public function detailNamaKategoriS($id)
	{
        // return $this->db->get('tb_dagangan')->result_array();
		$this->db->select('*');
		$this->db->from('tb_dagangan');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_dagangan.id_kategori', 'left');
		// return $this->db->get()->result_array();
	    return $this->db->get_where('tb_dagangan', ['id_kategori' => $id])->row_array();
    }
}