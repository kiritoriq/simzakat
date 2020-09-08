<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
		parent::__construct();
		$this->load->library(array('session', 'form_validation'));
        $this->load->model('query');
        $this->load->helper('url');
    }

	public function index()
	{
		if($this->session->userdata('logged_in')) {
			// $this->load->view('admin/dashboard/index');
			$this->dashboard();
		} else {
			$this->load->view('admin/login/index');
		}
		// $this->load->view('welcome_message');
		// $this->load->view('home');
	}

	public function systemAuth() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$login = $this->query->doLogin($username, $password);
			// print_r($login);
			// exit();
			if($this->query->doLogin($username, $password)) {
				redirect('admin');
			} else {
				$this->session->set_flashdata('message', '<b>Gagal masuk! Username dan Kata Sandi anda salah!</b>');
			}
		} else {
			$this->session->set_flashdata('message', '<strong> Maaf!</strong> Nama Pengguna, Kata Sandi dan Validasi Keamanan harus diisi.');
			redirect('admin');
		}
	}

	function logout() {
		session_destroy();
		$this->session->sess_destroy();
		redirect('admin');
	}

	function set_current($current) {
		if($this->session->userdata('logged_in')) {
			if($current == 'dashboard' OR $current == 'admin') {
				$data['dashboard'] = 'active';
			} else if($current == 'datamustahiq') {
				$data['masterdata'] = 'active';
			} else if($current == 'users') {
				$data['setting'] = 'active';
			} else if($current == 'daftardonasi' OR $current == 'proposal') {
				$data['transaksi'] = 'active';
			} else if($current == 'laporanuangmasuk' OR $current == 'laporanuangkeluar') {
				$data['laporan'] = 'active';
			} else {
				$data['dashboard'] = '';
			}
			return $data;
		} else {
			redirect('admin');
		}
	}
	
	function set_subcurrent($subcurrent) {
		if($subcurrent == 'masterproduk') {
			$data['masterproduk'] = 'active';
		} else if($subcurrent == 'users') {
			$data['users'] = 'active';
		} else if($subcurrent == 'daftardonasi') {
			$data['daftardonasi'] = 'active';
		} else if($subcurrent == 'laporanuangmasuk') {
			$data['laporanuangmasuk'] = 'active';
		} else if($subcurrent == 'laporanuangkeluar') {
			$data['laporanuangkeluar'] = 'active';
		} else if($subcurrent == 'laporandistribusi') {
			$data['laporandistribusi'] = 'active';
		} else if($subcurrent == 'datamustahiq') {
			$data['datamustahiq'] = 'active';
		} else if($subcurrent == 'proposal') {
			$data['proposal'] = 'active';
		} else {
			$data['dashboard'] = '';
		}
		return $data;
	}

	function dashboard(){
		if($this->session->userdata('logged_in')) {
			$current = ($this->uri->segment(2)!=null)?$this->uri->segment(2):$this->uri->segment(1);
			// print_r($current);
			// exit();
			$data['current'] = $this->set_current($current);
			$data['main_view'] = 'admin/dashboard/page/maindashboard';
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function daftardonasi() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			$data['rs'] = $this->query->getDonatur();
			$data['main_view'] = 'admin/dashboard/page/listdonasi';
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function proposal() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			$data['main_view'] = 'admin/dashboard/page/listproposal';
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function createproposal() {
		if($this->session->userdata('logged_in')) {
			$this->load->view('admin/dashboard/page/createproposal');
		} else {
			redirect('admin');
		}
	}

	function subjenisdonasi() {
		$id_jenis = $this->input->post('id_jenis');
		$html = $this->query->selectSubdonasi($id_jenis);
		echo $html;
	}

	function ketdonasi() {
		$id_jenis = $this->input->post('id_jenis');
		$id_subjenis = $this->input->post('id_subjenis');
		$html = $this->query->selectKetdonasi($id_jenis,$id_subjenis);
		echo $html;
	}

	function formkelompok() {
		$tipe = $this->input->post('tipedonatur');
		$html = "";
		if($tipe == 2) {
			$html = "<div class=\"form-group\">
						<label class=\"control-label col-sm-3\">Nama Institusi:</label>
						<div class=\"col-sm-8\">
							<input type=\"text\" class=\"validate[required] form-control\" name=\"institusi\" required>
						</div>
					</div>
					<div class=\"form-group\">
						<label class=\"control-label col-sm-3\">NPWP:</label>
						<div class=\"col-sm-8\">
							<input type=\"text\" class=\"validate[required] form-control\" maxlength=\"16\" name=\"npwp\" required>
						</div>
					</div>
					<div class=\"form-group\">
						<label class=\"control-label col-sm-3\">Kota:</label>
						<div class=\"col-sm-8\">
							<input type=\"text\" class=\"validate[required] form-control\" name=\"kota_institusi\" required>
						</div>
					</div>
					<div class=\"form-group\">
						<label class=\"control-label col-sm-3\">Provinsi:</label>
						<div class=\"col-sm-8\">
							<input type=\"text\" class=\"validate[required] form-control\" name=\"prov_institusi\" required>
						</div>
					</div>
					<div class=\"form-group\">
						<label class=\"control-label col-sm-3\">Negara:</label>
						<div class=\"col-sm-8\">
							<input type=\"text\" class=\"validate[required] form-control\" name=\"negara\" required>
						</div>	
					</div>";
		} else {
			$html = "<input type=\"hidden\" class=\"form-control\" name=\"institusi\">
					<input type=\"hidden\" class=\"form-control\" name=\"npwp\">
					<input type=\"hidden\" class=\"form-control\" name=\"kota_institusi\">
					<input type=\"hidden\" class=\"form-control\" name=\"prov_institusi\">
					<input type=\"hidden\" class=\"form-control\" name=\"negara\">";
		}
		echo $html;
	}

	function detailpesan() {
		if($this->session->userdata('logged_in')) {
			$data['rs'] = $this->query->getDonaturByref($this->input->post('noreferensi'));
			// $data['rb'] = $this->query->getDetailbarang($this->input->post('nopesan'));
			$this->load->view('admin/dashboard/page/detailpesan', $data);
		} else {
			redirect('admin');
		}
	}

	function invoice() {
		$no_referensi = $this->uri->segment(3);
		$data['result'] = $this->query->getDonaturByref($no_referensi);
		// print_r($data['rs']);
		// exit();
		$this->load->view("admin/dashboard/page/invoice", $data);
	}

	function postDonasi() {
		// if($this->form_validation->run($this) == true) {
			$msg = "<ul>";
			$status = "";
			if($this->input->post('jml_donasi') != "") {
				if($this->input->post('jml_donasi') <= 9999) {
					$status = "error";
					$msg .= "<li>Jumlah Donasi Minimal adalah Rp 10.000</li>";
				} else {
					$status = "not error";
				}
			} 
			
			$msg .= "</ul>";
			if($status == "error") {
				$response = array(
					'status' => "Error",
					'html' => $msg
				);
				echo json_encode($response);
			} else {
				$post = $_POST;
				foreach($post as $key => $val) {
					if($key == "tipedonatur") {
						$data['tipe'] = $val;
					} else {
						$data[$key] = $val;
					}
				}
				$referensi = $this->query->getNoreferensi($this->input->post('jns_donasi'));
				$data['noreferensi'] = $referensi['no'];
				$data['kd_unik'] = substr($referensi['kd_unik'],1,3);
				$data['jml_payment'] = intval($this->input->post('jml_donasi')+$data['kd_unik']);
				$data['is_bayar'] = 0;
				$data['created_at'] = date('Y-m-d H:i:s');
				$ins_temp = $this->db->insert("tr_donasi", $data);
				if($this->db->error()['code'] == false) {
					$response['no_referensi'] = $referensi['no'];
					$response['status_insert'] = "Ok";
				} else {
					$response['status_insert'] = "error";
					$response['error_message'] = $this->db->error();
				}
				$response['status'] = $status;

				echo json_encode($response);
			}
		// }
	}

	function konfirmasibayar() {
		if($this->session->userdata('logged_in')) {
			$data['is_bayar'] = 1;
			$update = $this->db->update("tr_donasi", $data, array("noreferensi" => $this->input->post('noreferensi')));
			if($this->db->error()['code'] == false) {
				echo "true";
			} else {
				echo "false";
			}
		}else {
			redirect('admin');
		}
	}

	function inputdonasi() {
		$this->load->view('admin/dashboard/page/inputdonasi');
	}

	function laporanuangmasuk() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			$data['rs'] = $this->query->getDonatur();
			$data['main_view'] = "admin/dashboard/page/laporanpenjualan";
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function datamustahiq() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			$data['main_view'] = "admin/dashboard/page/listmustahiq";
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function createmustahiq() {
		if($this->session->userdata('logged_in')) {
			$this->load->view('admin/dashboard/page/createmustahiq');
		} else {
			redirect('admin');
		}
	}

	function users() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			// print_r($data['subcurrent']);
			// exit();
			$data['rs'] = $this->db->query("SELECT a.*, b.role FROM users a INNER JOIN roles b ON a.role_id = b.id ORDER BY a.created_at DESC");
			$data['main_view'] = "admin/dashboard/page/listuser";
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}
	
	function simpanuser() {
		if($this->session->userdata('logged_in')) {
			// $data = $_POST;
			if($this->input->post('edit') == 0) {
				$insert = $this->db->insert('users', array(
					"nama" => $this->input->post('nama'),
					"email" => $this->input->post('email'),
					"role_id" => $this->input->post('role_id'),
					"username" => $this->input->post('username'),
					"password" => md5($this->input->post('password')),
					"foto" => 'avatar2.png',
				));
			} else {
				$update = $this->db->update("users", array(
					"nama" => $this->input->post('nama'),
					"email" => $this->input->post('email'),
					"role_id" => $this->input->post('role_id'),
					"username" => $this->input->post('username'),
					"password" => md5($this->input->post('password')),
					"foto" => 'avatar2.png',
				), array("id" => $this->input->post('id')));
			}
			if($this->db->error()['code'] == false) {
				echo "true";
			} else {
				echo "false";
			}
		} else {
			redirect('admin');
		}
	}

	function deleteuser() {
		if($this->session->userdata('logged_in')) {
			$del = $this->db->query("DELETE FROM users WHERE id = \"".$this->input->post('id')."\" ");
			if($this->db->error()['code'] == false) {
				echo "true";
			} else {
				echo "false";
			}
		} else {
			redirect('admin');
		}
	}

	function createuser() {
		if($this->session->userdata('logged_in')) {
			$data['cek'] = 0;
			if($this->input->post('edit') == 1) {
				$q = $this->db->query("SELECT a.* FROM users a WHERE a.id = \"".$this->input->post('id')."\"");
				$data['cek'] = $q->num_rows();
				$data['rs'] = $q->row();
			}
			// $data['main_view'] = "admin/dashboard/page/createuser";
			$this->load->view('admin/dashboard/page/createuser', $data);
		} else {
			redirect('admin');
		}
	}

	// function simpanproduk() {
	// 	if($this->session->userdata('logged_in')) {
	// 		$this->form_validation->set_rules('kd_produk', 'Kode Produk', 'required');
	// 		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
	// 		$this->form_validation->set_rules('spesifikasi', 'Spesifikasi Produk', 'required');
	// 		$this->form_validation->set_rules('manfaat', 'Manfaat Produk', 'required');
	// 		if($this->form_validation->run($this) == true) {
	// 			// if(!empty($_FILES['gambar']['name'])) {

	// 			// }
	// 		}
	// 	} else {
	// 		redirect('admin');
	// 	}
	// }
}
