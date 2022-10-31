<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi');
	}

	public function index()
	{
			$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan

			$period_awal 	= date('Y-m-d',strtotime($this->session->userdata('ses_period_awal')));
			$period_akhir 	= date('Y-m-d',strtotime($this->session->userdata('ses_period_akhir')));
			$dept			= $this->session->userdata('ses_dept');
			$karyawan 		= $this->session->userdata('ses_karyawan');

			$config["base_url"] 		= base_url() . "Laporan";
	        $config["total_rows"] 		= $this->M_transaksi->get_count($period_awal,$period_akhir,$dept,$karyawan);
	        $config["per_page"] 		= 10;
	        $config["uri_segment"] 		= 2;

	        $config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';

			$this->pagination->initialize($config);

	        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

	        $data['nomor'] = $page;

	        $data["links"] = $this->pagination->create_links();

	        $data['laporan'] = $this->M_transaksi->lihat_laporan($config["per_page"],$page,$period_awal,$period_akhir,$dept,$karyawan);
			$data['menu'] 		= "laporan";

			$data['dept'] 	= $this->M_transaksi->lihat_dept();
			$this->load->view('template/header',$data);
			$this->load->view('laporan/index',$data);
			$this->load->view('template/footer');
	}

	public function filter()
	{
		$period_awal  		= date('Y-m-d',strtotime($this->input->post('period_awal')));
		$period_akhir 		= date('Y-m-d',strtotime($this->input->post('period_akhir')));
		$dept 				= $this->input->post('dept');
		$karyawan 			= $this->input->post('karyawan');

		$submit = $this->input->post('submitdata');	

		if ($submit == 'Reset') {

				$this->session->unset_userdata(array('ses_period_awal','ses_period_akhir','ses_dept','ses_karyawan'));
				redirect('Laporan');

			}else if($submit == 'Print'){

				$data['period_awal'] = date('d-m-Y',strtotime($this->input->post('period_awal')));
				$data['period_akhir'] = date('d-m-Y',strtotime($this->input->post('period_akhir')));
				$data['cetak'] = $this->M_transaksi->lihat_laporan2($period_awal,$period_akhir,$dept,$karyawan);
				$this->load->view('laporan/cetak_kantin',$data);

			}else if($submit == 'Excel'){

				$data['period_awal'] = date('d-m-Y',strtotime($this->input->post('period_awal')));
				$data['period_akhir'] = date('d-m-Y',strtotime($this->input->post('period_akhir')));

				$semua_pengguna = $this->M_transaksi->lihat_laporan2($period_awal,$period_akhir,$dept,$karyawan);

				$spreadsheet = new Spreadsheet;

		          $spreadsheet->setActiveSheetIndex(0)
		                      ->setCellValue('A1', 'NO')
		                      ->setCellValue('B1', 'TANGGAL')
		                      ->setCellValue('C1', 'JAM')
		                      ->setCellValue('D1', 'NIK')
		                      ->setCellValue('E1', 'NAMA')
		                      ->setCellValue('F1', 'DEPARTEMENT');

		          $kolom = 2;
		          $nomor = 1;
		          foreach($semua_pengguna->result() as $pengguna) {

		               $spreadsheet->setActiveSheetIndex(0)
		                           ->setCellValue('A' . $kolom, $nomor)
		                           ->setCellValue('B' . $kolom, date('d M y',strtotime($pengguna->TglTrans)))
		                           ->setCellValue('C' . $kolom, date('H : i :s',strtotime($pengguna->JamTrans)))
		                           ->setCellValue('D' . $kolom, $pengguna->NikUser)
		                           ->setCellValue('E' . $kolom, $pengguna->NamaUser)
		                           ->setCellValue('F' . $kolom, $pengguna->DeptUser);

		               $kolom++;
		               $nomor++;

		          }

		          $writer = new Xlsx($spreadsheet);

		      $tanggal 	= date('d-m-Y');
		      $jam 		= date('H:i:s');

		      header('Content-Type: application/vnd.ms-excel');
			  header('Content-Disposition: attachment;filename="Laporan Check In Canteen.xls"');
			  header('Cache-Control: max-age=0');

			  $writer->save('php://output');
			}else if($submit == 'Search'){

				$data = array(
					'ses_period_awal' 	=> $this->input->post('period_awal'),
					'ses_period_akhir' 	=> $this->input->post('period_akhir'),
					'ses_dept' 			=> $this->input->post('dept'),
					'ses_karyawan' 		=> $this->input->post('karyawan')

				);

				$this->session->set_userdata($data);

				// var_dump($data);
				redirect('Laporan');
			}
			else{
				redirect('Laporan');
			}	
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$this->M_transaksi->hapus_trans($id);
		$this->session->set_flashdata('success', 'Berhasil DiHapus!!');
        redirect('Laporan');
	}
}
 ?>