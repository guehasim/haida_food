<?php 

date_default_timezone_set('Asia/Jakarta');

class M_transaksi extends CI_Model
{
	
	public function lihat_trans()
	{
		$bulan = date('m');
		$tahun = date('Y');
		$query = $this->db->query("SELECT
										tbl_transaksi.ID_Trans, 
										tbl_transaksi.TglTrans, 
										tbl_transaksi.JamTrans,
										tbl_transaksi.ID_User, 
										m_user.NoKartu, 
										m_user.NamaUser, 
										m_user.DeptUser,
										m_jabatan.NamaJabatan,  
										m_user.ImageUser
									FROM
										tbl_transaksi
									LEFT JOIN
										m_user
									ON 
										tbl_transaksi.ID_User = m_user.ID_User
									LEFT JOIN
										m_jabatan
									ON
										m_user.ID_Jabatan = m_jabatan.ID_Jabatan
									WHERE
										MONTH(tbl_transaksi.TglTrans) = '$bulan' AND YEAR(tbl_transaksi.TglTrans) = '$tahun'
									ORDER BY
										tbl_transaksi.ID_Trans DESC
									LIMIT 1");
		return $query;
	}

	public function lihat_kemarin($id)
	{
		$period_awal = date('Y-m',strtotime('-1 months'))."-01";
		$period_akhir = date('Y-m-t',strtotime('-1 months'));
		$query = $this->db->query("SELECT
										COUNT(tbl_transaksi.ID_User) AS total
									FROM
										tbl_transaksi
									WHERE
										tbl_transaksi.ID_User = '$id' AND
										tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir'");
		return $query;
	}

	public function lihat_laporan($limit,$start,$period_awal,$period_akhir,$dept,$karyawan)
	{
		if ($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept != '' || $dept != NULL) && $karyawan != NULL) {
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir' AND m_user.DeptUser = '$dept' AND m_user.NikUser = '$karyawan' ";
		}else if($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept != '' || $dept != NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir' AND m_user.DeptUser = '$dept'";
		}else if($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept == '' || $dept == NULL) && $karyawan != NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir' AND m_user.NikUser = '$karyawan' ";
		}else if($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir'";
		}else if($period_awal != '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans >= '$period_awal'";
		}else if($period_awal == '1970-01-01' && $period_akhir != '1970-01-01' && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans <= '$period_akhir' ";
		}else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept != '' || $dept != NULL) && $karyawan == NULL){
			$tampil = "WHERE m_user.DeptUser = '$dept'";
		}else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept == '' || $dept == NULL) && $karyawan != NULL){
			$tampil = "WHERE m_user.NikUser = '$karyawan'";
		}else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept != '' || $dept != NULL) && $karyawan != NULL){
			$tampil = "WHERE m_user.DeptUser = '$dept' AND m_user.NikUser = '$karyawan' ";
		}
		else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "";
		}

		var_dump($tampil);
		$query = $this->db->query("SELECT
										tbl_transaksi.ID_Trans, 
										tbl_transaksi.TglTrans, 
										tbl_transaksi.JamTrans,
										tbl_transaksi.ID_User,
										m_user.NikUser, 
										m_user.NoKartu, 
										m_user.NamaUser, 
										m_user.DeptUser,  
										m_user.ImageUser,
										m_jabatan.NamaJabatan
									FROM
										tbl_transaksi
										INNER JOIN
										m_user
										ON 
											tbl_transaksi.ID_User = m_user.ID_User
										LEFT JOIN
										m_jabatan
										ON
											m_user.ID_Jabatan = m_jabatan.ID_Jabatan
									$tampil
									ORDER BY
										tbl_transaksi.ID_Trans DESC
									LIMIT $start,$limit");
		return $query;
	}

	public function get_count($period_awal,$period_akhir,$dept,$karyawan)
	{
		if ($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept != '' || $dept != NULL) && $karyawan != NULL) {
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir' AND m_user.DeptUser = '$dept' AND m_user.NikUser = '$karyawan' ";
		}else if($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept != '' || $dept != NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir' AND m_user.DeptUser = '$dept'";
		}else if($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept == '' || $dept == NULL) && $karyawan != NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir' AND m_user.NikUser = '$karyawan' ";
		}else if($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir'";
		}else if($period_awal != '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans >= '$period_awal'";
		}else if($period_awal == '1970-01-01' && $period_akhir != '1970-01-01' && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans <= '$period_akhir' ";
		}else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept != '' || $dept != NULL) && $karyawan == NULL){
			$tampil = "WHERE m_user.DeptUser = '$dept'";
		}else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept == '' || $dept == NULL) && $karyawan != NULL){
			$tampil = "WHERE m_user.NikUser = '$karyawan'";
		}else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept != '' || $dept != NULL) && $karyawan != NULL){
			$tampil = "WHERE m_user.DeptUser = '$dept' AND m_user.NikUser = '$karyawan' ";
		}
		else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "";
		}
		$query = $this->db->query("SELECT
										tbl_transaksi.ID_Trans, 
										tbl_transaksi.TglTrans, 
										tbl_transaksi.JamTrans,
										tbl_transaksi.ID_User,
										m_user.NikUser, 
										m_user.NoKartu, 
										m_user.NamaUser, 
										m_user.DeptUser,  
										m_user.ImageUser
									FROM
										tbl_transaksi
										INNER JOIN
										m_user
										ON 
											tbl_transaksi.ID_User = m_user.ID_User
									$tampil
									ORDER BY
										tbl_transaksi.ID_Trans DESC");
		return $query->num_rows();
	}

	public function lihat_laporan2($period_awal,$period_akhir,$dept,$karyawan)
	{
		if ($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept != '' || $dept != NULL) && $karyawan != NULL) {
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir' AND m_user.DeptUser = '$dept' AND m_user.NikUser = '$karyawan' ";
		}else if($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept != '' || $dept != NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir' AND m_user.DeptUser = '$dept'";
		}else if($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept == '' || $dept == NULL) && $karyawan != NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir' AND m_user.NikUser = '$karyawan' ";
		}else if($period_awal != '1970-01-01' && $period_akhir != '1970-01-01' && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir'";
		}else if($period_awal != '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans >= '$period_awal'";
		}else if($period_awal == '1970-01-01' && $period_akhir != '1970-01-01' && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "WHERE tbl_transaksi.TglTrans <= '$period_akhir' ";
		}else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept != '' || $dept != NULL) && $karyawan == NULL){
			$tampil = "WHERE m_user.DeptUser = '$dept'";
		}else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept == '' || $dept == NULL) && $karyawan != NULL){
			$tampil = "WHERE m_user.NikUser = '$karyawan'";
		}else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept != '' || $dept != NULL) && $karyawan != NULL){
			$tampil = "WHERE m_user.DeptUser = '$dept' AND m_user.NikUser = '$karyawan' ";
		}
		else if($period_awal == '1970-01-01' && ($period_akhir == '1970-01-01' || $period_akhir == '') && ($dept == '' || $dept == NULL) && $karyawan == NULL){
			$tampil = "";
		}
		$query = $this->db->query("SELECT
										tbl_transaksi.ID_Trans, 
										tbl_transaksi.TglTrans, 
										tbl_transaksi.JamTrans,
										tbl_transaksi.ID_User,
										m_user.NikUser, 
										m_user.NoKartu, 
										m_user.NamaUser, 
										m_user.DeptUser,  
										m_user.ImageUser,
										m_jabatan.NamaJabatan
									FROM
										tbl_transaksi
										INNER JOIN
										m_user
										ON 
											tbl_transaksi.ID_User = m_user.ID_User
										LEFT JOIN
										m_jabatan
										ON
											m_user.ID_Jabatan = m_jabatan.ID_Jabatan
									$tampil
									ORDER BY
										tbl_transaksi.ID_Trans DESC");
		return $query;
	}



	public function lihat_dept()
	{
		$query = $this->db->query("SELECT DISTINCT
										m_user.DeptUser AS dept
									FROM
										tbl_transaksi
										INNER JOIN
										m_user
										ON 
											tbl_transaksi.ID_User = m_user.ID_User");
		return $query;
	}

	public function simpan_trans($id)
	{
		$data = array(
			'ID_Trans' 	=> null,
			'TglTrans'	=> date('Y-m-d'),
			'JamTrans' 	=> date('H:i:s'),
			'ID_User'	=> $id
		);

		$this->db->insert('tbl_transaksi',$data);
	}

	public function hapus_trans($id)
    {
        $this->db->where('ID_Trans',$id);
        $this->db->delete('tbl_transaksi');
    }
}
 ?>