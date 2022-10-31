<?php 


class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->library('session');
	}

	public function index()
	{
		$data['identitas'] 	= $this->M_transaksi->lihat_trans();
		$this->load->view('home/index',$data);
	}

	public function simpan()
	{
		$user = $this->input->post('no_kartu');

		$this->db->where('NoKartu', $user);
		$this->db->where('StatusUser','1');
		$query = $this->db->get('M_user');

		if ($query->num_rows() > 0) {
			$row = $query->row();

				$id	= $row->ID_User;
				
				if (isset($_POST)) {
				$this->M_transaksi->simpan_trans($id);
				// berhasil simpan

				// echo "berhasil";
				redirect('Home');
				}
		}else{						
			// tidak ada Id tersebut
			$this->session->set_flashdata('error','Nomor Kartu Tidak ditemukan disistem');
			redirect('Home');
			
		}
	}
}

 ?>