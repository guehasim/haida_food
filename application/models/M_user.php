<?php 

/**
 * 
 */
class M_user extends CI_Model
{

	//====================================== admin
	
	public function lihat_user()
	{
		$query = $this->db->query("SELECT * FROM m_user WHERE StatusUser = '0' ORDER BY ID_User DESC");
		return $query;
	}

	public function simpan_user()
	{
		$data = array(
			'ID_User' 	=> null,
			'NikUser' 	=> null,
			'NoKartu'	=> null,
			'NamaUser'	=> $this->input->post('nama'),
			'Username' 	=> $this->input->post('user'),
			'ID_Jabatan'=> null,
			'PassUser'	=> sha1(md5($this->input->post('pass'))),
			'DeptUser' 	=> null,
			'ImageUser'	=> null,
			'StatusUser'=> 0
		);

		$this->db->insert('m_user',$data);
	}

	public function get_user($id)
	{
		$query = $this->db->query("SELECT * FROM m_user WHERE ID_User = '$id' ");
		return $query;
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete_user($id)
	{
		$this->db->where('ID_User',$id);
        $this->db->delete('m_user');
	}

	//============================================================= user

	public function lihat_karyawan($limit,$start,$search)
	{
		if ($search != '') {
			$tampil = "WHERE m_user.StatusUser = 1 AND m_user.NikUser LIKE '%$search%' OR m_user.NoKartu LIKE '%$search%' OR m_user.NamaUser LIKE '%$search%' OR m_user.DeptUser LIKE '%$search%' OR m_jabatan.NamaJabatan LIKE '%$search%' ";
		}else{
			$tampil = "WHERE m_user.StatusUser = 1";
		}
		$query = $this->db->query("SELECT
										m_user.ID_User, 
										m_user.NikUser, 
										m_user.NoKartu, 
										m_user.NamaUser, 
										m_user.Username, 
										m_user.ID_Jabatan, 
										m_user.PassUser, 
										m_user.DeptUser, 
										m_user.ImageUser, 
										m_user.StatusUser, 
										m_jabatan.NamaJabatan
									FROM
										m_user
										INNER JOIN
										m_jabatan
										ON 
											m_user.ID_Jabatan = m_jabatan.ID_Jabatan
									$tampil
									ORDER BY
										m_user.ID_User DESC
									LIMIT $start,$limit");
		return $query;
	}

	public function get_count($search) {
		if ($search == '') {
			return $this->db->count_all('m_user');	
		}else{
			$query = $this->db->query("SELECT
										m_user.ID_User, 
										m_user.NikUser, 
										m_user.NoKartu, 
										m_user.NamaUser, 
										m_user.Username, 
										m_user.ID_Jabatan, 
										m_user.PassUser, 
										m_user.DeptUser, 
										m_user.ImageUser, 
										m_user.StatusUser, 
										m_jabatan.NamaJabatan
									FROM
										m_user
										INNER JOIN
										m_jabatan
										ON 
											m_user.ID_Jabatan = m_jabatan.ID_Jabatan
									WHERE m_user.StatusUser = 1 AND m_user.NikUser LIKE '%$search%' OR m_user.NoKartu LIKE '%$search%' OR m_user.NamaUser LIKE '%$search%' OR m_user.DeptUser LIKE '%$search%' OR m_jabatan.NamaJabatan LIKE '%$search%'");
			return $query->num_rows();
		}
        
    }

	public function simpan_karyawan($gambar)
	{
		$data = array(
			'ID_User' 	=> null,
			'NikUser'	=> $this->input->post('nik'),
			'NoKartu'	=> $this->input->post('no_kartu'),
			'NamaUser'	=> $this->input->post('nama'),
			'Username' 	=> null,
			'ID_Jabatan'=> $this->input->post('jabatan'),
			'PassUser'	=> null,
			'DeptUser' 	=> $this->input->post('dept'),
			'ImageUser'	=> $gambar,
			'StatusUser'=> 1
		);

		$this->db->insert('m_user',$data);
	}

	public function get_karyawan($id)
	{
		$query = $this->db->query("SELECT * FROM m_user WHERE ID_User = '$id' ");
		return $query;
	}

	public function delete_karyawan($id)
	{
		$this->db->where('ID_User',$id);
        $this->db->delete('m_user');
	}

	//dashboard

	public function total_user()
	{
		$query = $this->db->query("SELECT
										COUNT(m_user.ID_User) AS total
									FROM
										m_user
									WHERE
										m_user.StatusUser = 0");
		return $query;
	}

	public function total_karyawan()
	{
		$query = $this->db->query("SELECT
										COUNT(m_user.ID_User) AS total
									FROM
										m_user
									WHERE
										m_user.StatusUser = 1");
		return $query;
	}

	public function total_transaksi()
	{
		$query = $this->db->query("SELECT
										COUNT(tbl_transaksi.ID_Trans) AS total
									FROM
										tbl_transaksi");
		return $query;
	}
}
 ?>