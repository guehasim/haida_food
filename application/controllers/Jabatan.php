<?php 

/**
 * 
 */
class Jabatan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_jabatan');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_IdUser');
		if ($user=="") {
			redirect('login');
		}else{
			$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
			$this->session->unset_userdata(array('ses_period_awal','ses_period_akhir','ses_dept','ses_karyawan')); //hapus session cari laporan

			$data['jabatan'] 	= $this->M_jabatan->lihat_data();
			$data['menu'] 	= "jabatan";
			$this->load->view('template/header',$data);
			$this->load->view('jabatan/index',$data);
			$this->load->view('template/footer');
		}
	}

	public function simpan()
	{
		$jabat = $this->input->post('jabatan');

		$this->db->where('NamaJabatan', $jabat);
		$query = $this->db->get('M_jabatan');

		if ($query->num_rows() > 0) {
			$this->session->set_flashdata('error', 'Data Tidak Tersimpan, Jabatan Sudah Ada!');
			redirect('Jabatan');
		}else{
			if (isset($_POST)) {
			$this->M_jabatan->simpan_data();
			$this->session->set_flashdata('success', 'Berhasil Menyimpan');
			redirect('Jabatan');
			}
		}	
	}

	public function update()
	{
		$id 		= $this->input->post('id');
		$jabat 		= $this->input->post('jabatan');

		$data = array(
			'NamaJabatan'	=> $jabat
			);

		$where = array(
			'ID_Jabatan' 	=> $id
			);

		$this->M_jabatan->update_data($where,$data,'M_jabatan');

		$this->session->set_flashdata('success', 'Berhasil Diubah!!');

		redirect('Jabatan');
	}

	public function hapus()
	{
		$id = $this->input->post('id');
        $this->M_jabatan->delete_data($id);

        $this->session->set_flashdata('success', 'Berhasil Dihapus!!');
        redirect('Jabatan');
	}
}
 ?>