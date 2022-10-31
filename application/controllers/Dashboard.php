<?php 

/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_chart');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_IdUser');
		if ($user=="") {
			redirect('login');
		}else{
			$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
			$this->session->unset_userdata(array('ses_period_awal','ses_period_akhir','ses_dept','ses_karyawan')); //hapus session cari laporan

			$data['menu'] 		= "dashboard";
			$data['char'] 		= $this->M_chart->lihat_data();
			$data['user'] 		= $this->M_user->total_user();
			$data['karyawan']	= $this->M_user->total_karyawan();
			$data['transaksi']	= $this->M_user->total_transaksi();
			$this->load->view('template/header',$data);
			$this->load->view('dashboard/index',$data);
			$this->load->view('template/footer',$data);
		}
	}
}
 ?>