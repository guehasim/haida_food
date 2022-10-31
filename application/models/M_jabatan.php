<?php 


class M_jabatan extends CI_Model
{
	
	public function lihat_data()
	{
		$query = $this->db->query("SELECT * FROM m_jabatan ORDER BY ID_Jabatan DESC");
		return $query;
	}

	public function simpan_data()
	{
		$data = array(
			'ID_Jabatan' 	=> null,
			'NamaJabatan' 	=> $this->input->post('jabatan')
		);

		$this->db->insert('m_jabatan',$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete_data($id)
	{
		$this->db->where('ID_Jabatan',$id);
        $this->db->delete('m_jabatan');
	}
}
 ?>