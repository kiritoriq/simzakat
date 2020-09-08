<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends MX_Controller {

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
        $this->load->model('query');
        $this->load->helper('url');
    }

	public function index()
	{
		$data['main_view'] = 'page/home';
        $this->load->view('template/index', $data);
	}

	function home() {
		$this->load->view('page/home');
	}

	function donasi() {
		$data['rs'] = $this->query->getMetodepembayaran();
		$this->load->view('page/formdonasi', $data);
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

	function postDonasi() {
		$this->form_validation->set_rules('jns_donasi', 'Jenis Donasi', 'required');
		$this->form_validation->set_rules('subjenis', 'Pengkhususan Donasi', 'required');
		$this->form_validation->set_rules('jml_donasi', 'Nominal Donasi', 'required');
		$this->form_validation->set_rules('nama_dp', 'Sapaan', 'required');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Alamat Email', 'required');
		$this->form_validation->set_rules('telp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('payment', 'Metode Pembayaran', 'required');
		// print_r($this->form_validation->run($this));
		// exit();
		if($this->form_validation->run($this) == true) {
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
				$ins_temp = $this->db->insert("tr_donasi_temp", $data);
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
		}
	}

	function ringkasan() {
		// $no_referensi = $this->input->post('noreferensi');
		$no_referensi = $this->input->get('noreferensi');
		$data['rs'] = $this->query->getDonaturtempByref($no_referensi);
		$this->load->view('page/ringkasan', $data);
		// $data['main_view'] = 'page/ringkasan';
		// print_r($data['rs']);
		// exit();
		// $this->load->view('template/index', $data);
	}

	function postBayar() {
		$insert = $this->db->query("INSERT INTO tr_donasi SELECT * FROM tr_donasi_temp WHERE noreferensi = \"".$this->input->post('no_referensi')."\" ");
		if($this->db->error()['code'] == false) {
			$delete = $this->db->query("DELETE FROM tr_donasi_temp WHERE noreferensi = \"".$this->input->post('no_referensi')."\" ");
			$response['status'] = "true";
		} else {
			$response['status'] = "false";
			$response['msg'] = $this->db->error();
		}
		echo json_encode($response);
	}

	function pembayaran() {
		$no_referensi = $this->input->get('no_referensi');
		$data['rs'] = $this->query->getDonaturByref($no_referensi);
		$this->load->view('page/pembayaran', $data);
	}

	function formkelompok() {
		$tipe = $this->input->post('tipedonatur');
		$html = "";
		if($tipe == 2) {
			$html = "<div class=\"form-group\">
						<label>Nama Institusi <b>(*)</b>:</label>
						<input type=\"text\" class=\"validate[required] form-control\" name=\"institusi\" required>
					</div>
					<div class=\"form-group\">
						<label>NPWP <b>(*)</b>:</label>
						<input type=\"text\" class=\"validate[required] form-control\" maxlength=\"16\" name=\"npwp\" required>
					</div>
					<div class=\"form-group\">
						<label>Kota <b>(*)</b>:</label>
						<input type=\"text\" class=\"validate[required] form-control\" name=\"kota_institusi\" required>
					</div>
					<div class=\"form-group\">
						<label>Provinsi <b>(*)</b>:</label>
						<input type=\"text\" class=\"validate[required] form-control\" name=\"prov_institusi\" required>
					</div>
					<div class=\"form-group\">
						<label>Negara <b>(*)</b>:</label>
						<input type=\"text\" class=\"validate[required] form-control\" name=\"negara\" required>
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

	function invoice() {
		$no_referensi = $this->uri->segment(3);
		$data['rs'] = $this->query->getDonaturByref($no_referensi);
		$this->load->view("portal/page/invoice", $data);
	}
}
