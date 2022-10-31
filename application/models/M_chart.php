<?php 

/**
 * 
 */
class M_chart extends CI_Model
{
	
	public function lihat_data()
	{
		$period_awal 	= date('Y-m')."-01";
		$period_akhir 	= date('Y-m-t');
		$query = $this->db->query("SELECT
										tbl_transaksi.TglTrans, 
										COUNT(tbl_transaksi.TglTrans) AS total
									FROM
										tbl_transaksi
									WHERE
										tbl_transaksi.TglTrans BETWEEN '$period_awal' AND '$period_akhir'
									GROUP BY
										tbl_transaksi.TglTrans
									ORDER BY
										tbl_transaksi.TglTrans ASC
									");
		return $query;
	}
}

 ?>