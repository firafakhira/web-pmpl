<!-- Fakhira Zahra Zulfira 1301164549 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('web');
    }
 
	public function index(){
		$data = array(
			'title' => 'Data Makanan',
			'cemalcemil' => $this->web->get_data()
		);
		$this->load->view('order',$data);
	}


	function create(){
		$selectnama = $_POST['namamalmil'];
		$jum = $_POST['jumlah'];

		$query = $this->db->query("INSERT INTO transaksi VALUES('','1',NOW(),'$selectnama','$jum','5000','','') ");
		
		$query2 = $this->db->query("INSERT INTO transaksi_tampil VALUES('','1',NOW(),'$selectnama','$jum','5000','','','') "); //Monica Dessy Amanda 1301164452
		if($query) {
			redirect(base_url('index.php/order'));
		}
	}

	function add_lokasi() {
		$pilihlokasi = $_POST['lokasix'];
		$catatan = $_POST['keterangan'];

		$query = $this->db->query("UPDATE transaksi SET lokasi='$pilihlokasi' , notes='$catatan' WHERE idTransaksi=1");
		$query2 = $this->db->query("UPDATE transaksi_tampil SET lokasi='$pilihlokasi' , notes='$catatan' WHERE idTransaksi=1"); //Monica Dessy Amanda 1301164452
		if ($query) {
			redirect(base_url('index.php/driver/getD'));
		}
	}


	public function delete_item($id_detail = 0) {
		if ($id_detail != 0) {
			$this->web->delete_item($id_detail);
			echo "<script>alert('Gagal Hapus Data');</script>";	
			redirect(base_url('index.php/order'));
		} else {
			redirect(base_url('index.php/order'));
		}
	}

}