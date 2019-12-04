<!-- Fakhira Zahra Zulfira 1301164549 -->
<?php 
defined('BASEPATH') or exit('No direct script access allowed');
/**
* 
*/
class Web extends CI_Model
{


    public function get_data()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$query = $this->db->get();
		return $query->result();
	}


    public function delete_item($id_detail) {
		$this->db->delete('transaksi', array('id_detail' => $id_detail));
	}

}

?>