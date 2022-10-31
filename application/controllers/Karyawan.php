<?php 

/**
 * 
 */
class Karyawan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library("pagination");

		$this->load->model('M_user');
		$this->load->model('M_jabatan');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_IdUser');
		if ($user=="") {
			redirect('login');
		}else{
			$this->session->unset_userdata(array('ses_period_awal','ses_period_akhir','ses_dept','ses_karyawan')); //hapus session cari laporan

			if ($this->input->post('cek') == 'Cari' && $this->input->post('cari') != '') {
            $oke_cari = array(
                    'ses_cari' => $this->input->post('cari')
                    );
	            $this->session->set_userdata($oke_cari);
	            $search = $this->session->userdata('ses_cari');
	        }else if($this->input->post('cek') == '' && $this->input->post('cari') != ''){
	            $search = $this->session->userdata('ses_cari');
	        }
	        else if($this->input->post('cek') == '' && $this->input->post('cari') == ''){
	            $search = $this->session->userdata('ses_cari');
	        }
	        else if($this->input->post('cek') == 'Cari' && $this->input->post('cari') == ''){
	            $this->session->unset_userdata('ses_cari');
	            $search = '';
	        }else if($this->input->post('cek') == 'Reset'){
	            $this->session->unset_userdata('ses_cari');
	            $search = '';
	        }

	        $config["base_url"] 		= base_url() . "Karyawan";
	        $config["total_rows"] 		= $this->M_user->get_count($search);
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

	        $data['karyawan'] = $this->M_user->lihat_karyawan($config["per_page"], $page, $search);

			$data['jabatan'] 	= $this->M_jabatan->lihat_data();
			$data['menu'] 		= "karyawan";
			$this->load->view('template/header',$data);
			$this->load->view('karyawan/index',$data);
			$this->load->view('template/footer');
		}
	}

	public function simpan()
	{
        $no_kartu = $this->input->post('no_kartu');
        $this->db->where('NoKartu',$no_kartu);
        $query_cek = $this->db->get('M_user');

        if ($query_cek->num_rows() > 0) {
        	$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
        	$this->session->set_flashdata('error', 'Nomor kartu sudah digunakan karyawan lain!!');
        	redirect('Karyawan');

        }else{
        	$id = $this->input->post('nik');
        	$this->db->where('NikUser',$id);
        	$query_nik = $this->db->get('M_user');
        	if ($query_nik->num_rows() > 0) {
        		$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
        		$this->session->set_flashdata('error', 'NIK sudah digunakan karyawan lain!!');
        	redirect('Karyawan');
        	} else {
        		$config['upload_path'] = 'assets/upload/images/'; //path folder
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        		$this->upload->initialize($config);
		        if(!empty($_FILES['image']['name'])){
		 
		            if ($this->upload->do_upload('image')){
		                $gbr = $this->upload->data();
		                //Compress Image
		                $config['image_library']='gd2';
		                $config['source_image']='assets/upload/images/'.$gbr['file_name'];
		                $config['create_thumb']= FALSE;
		                $config['maintain_ratio']= FALSE;
		                $config['quality']= '50%';
		                $config['width']= 400;
		                $config['height']= 500;
		                $config['new_image']= 'assets/upload/images/'.$gbr['file_name'];
		                $this->load->library('image_lib', $config);
		                $this->image_lib->resize();

		                $gambar=$gbr['file_name'];
		                // echo "Image berhasil diupload";

		                if (isset($_POST)) {
		                	$this->M_user->simpan_karyawan($gambar);
		                	$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
							$this->session->set_flashdata('success', 'Berhasil Menyimpan');
							redirect('Karyawan');						
		                }
		            }else{
		            	$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
		            	$this->session->set_flashdata('error', 'Ukuran Gambar Terlalu Besar atau format gambar tidak sesuai !!');
						redirect('Karyawan');
		            }
		                      
		        }else{
		        	$gambar = null;
		            if (isset($_POST)) {
		                	$this->M_user->simpan_karyawan($gambar);
							// berhasil simpan
							$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
							$this->session->set_flashdata('success', 'Berhasil Menyimpan');
							redirect('Karyawan');						
		                }
		        }
        	}       	
        	
        }	
	}

	public function update()
	{
    	$config['upload_path'] = 'assets/upload/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
		$this->upload->initialize($config);
        if(!empty($_FILES['image']['name'])){
 
            if ($this->upload->do_upload('image')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='assets/upload/images/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 400;
                $config['height']= 500;
                $config['new_image']= 'assets/upload/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                // echo "Image berhasil diupload";

                $id 		= $this->input->post('id');
				$nik 		= $this->input->post('nik');
				$nama 		= $this->input->post('nama');
				$dept 		= $this->input->post('dept');
				$jabatan 	= $this->input->post('jabatan');

				$data = array(
					'NikUser'	=> $nik,
					'NamaUser' 	=> $nama,
					'ID_Jabatan'=> $jabatan,
					'DeptUser' 	=> $dept,
					'ImageUser'	=> $gambar
					);

				$where = array(
					'ID_User' 		=> $id
					);

				$this->M_user->update_data($where,$data,'M_user');
				$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
				$this->session->set_flashdata('success', 'Berhasil Diubah!');
				redirect('Karyawan');
            }
                      
        }else{
        	$id 		= $this->input->post('id');
			$nik 		= $this->input->post('nik');
			$nama 		= $this->input->post('nama');
			$dept 		= $this->input->post('dept');
			$jabatan 	= $this->input->post('jabatan');

			$data = array(
				'NikUser'	=> $nik,
				'NamaUser' 	=> $nama,
				'ID_Jabatan'=> $jabatan,
				'DeptUser' 	=> $dept
				);

			$where = array(
				'ID_User' 		=> $id
				);

			$this->M_user->update_data($where,$data,'M_user');
			$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
			$this->session->set_flashdata('success', 'Berhasil Diubah!');
			redirect('Karyawan');
        }

	}

	public function hapus()
	{
		$id = $this->input->post('id');
        $this->M_user->delete_karyawan($id);
        $this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
        $this->session->set_flashdata('success', 'Berhasil DiHapus!!');
        redirect('Karyawan');
	}

	public function ganti_kartu()
	{
		$id 		= $this->input->post('id');
		$no_kartu 	= $this->input->post('no_kartu');

		$this->db->where('NoKartu',$no_kartu);
		$query_cek = $this->db->get('m_user');

		if ($query_cek->num_rows() > 0) {
			$this->session->set_flashdata('msg',
						'<div class="alert alert-danger alert-dismissible">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                  <h5><i class="icon fas fa-ban"></i> Kartu Sudah Digunakan Karyawan Lain!</h5>
		                </div>');
			$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
			$this->session->set_flashdata('error', 'Kartu Sudah Digunakan Karyawan Lain!');
        	redirect('Karyawan');
		} else {
			$data = array(
				'NoKartu' => $no_kartu
			); 

			$where = array(
				'ID_User' => $id
			);
			$this->M_user->update_data($where,$data,'M_user');
			$this->session->unset_userdata('ses_cari'); //hapus session cari karyawan
			$this->session->set_flashdata('success', 'Berhasil DiUbah!!');
			redirect('Karyawan');
		}		
	}
}
 ?>