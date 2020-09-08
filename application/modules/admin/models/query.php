<?php
class Query extends CI_Model {
	
	// public function getFilmAll() {
	// 	$data = $this->db->query("SELECT * FROM film ORDER BY id_film");
	// 	return $data->result();
    // }
    
    public function doLogin($username="", $password="") {
        $q = $this->db->select('a.*, b.role')
            ->from('users as a')
            ->join('roles as b', 'a.role_id = b.id')
            ->where(array('username' => $username, 'password' => md5($password)))->get();
        // $q = $this->db->get_where('users', array('username' => $username, 'password' => md5($password)));
        // return $q->result();
        if($q->num_rows() > 0) {
            $rs = $q->row();
            $newdata = array(
                'logged_in' => true,
                'username' => $rs->username,
                'nama' => $rs->nama,
                'user_id' => $rs->id,
                'role_id' => $rs->role_id,
                'role' => $rs->role,
                'image' => $rs->foto
              );
            $this->session->set_userdata($newdata);
            return true;
        } else {
            return false;
        }
    }

    function tanggalindonesia($date) {
        $x = explode('-', $date);
        $tgl = $x[0];
        $bulan = "";
        $thn = $x[2];
        switch($x[1]) {
          case '01':
            $bulan = 'Januari';
            break;
          case '02':
            $bulan = 'Februari';
            break;
          case '03':
            $bulan = 'Maret';
            break;
          case '04':
            $bulan = 'April';
            break;
          case '05':
            $bulan = 'Mei';
            break;
          case '06':
            $bulan = 'Juni';
            break;
          case '07':
            $bulan = 'Juli';
            break;
          case '08':
            $bulan = 'Agustus';
            break;
          case '09':
            $bulan = 'September';
            break;
          case '10':
            $bulan = 'Oktober';
            break;
          case '11':
            $bulan = 'November';
            break;
          case '12':
            $bulan = 'Desember';
            break;
        }
    
        return $tgl." ".$bulan." ".$thn; 
      }

      function selectDonasi() {
        $rs = $this->db->query("SELECT * FROM mast_jenisdonasi WHERE is_aktif = \"1\" ");
        $select = "<select class=\"form-control jns_donasi\" id=\"jns_donasi\" name=\"jns_donasi\" required>";
        $select .= "<option value=\"\">.: Pilih :.</option>";
        foreach($rs->result() as $item) {
            $select .= "<option value=\"".$item->id."\">".$item->nama."</option>";
        }
        $select .= "</select>";
        return $select;
      }

      function getJenisDonasi($id_jenis) {
        $rs = $this->db->get_where("mast_jenisdonasi", array('id' => $id_jenis))->row();
        return $rs->nama;
      }

      function selectSubdonasi($id_jenis) {
        $rs = $this->db->get_where('mast_subjenisdonasi', array('id_jnsdonasi' => $id_jenis, 'is_aktif' => 1));
        $select = "<select class=\"form-control subjenis\" id=\"subjenis\" name=\"subjenis\" required>";
        $select .= "<option value=\"\">.: Pilih :.</option>";
        $i = 1;
        foreach($rs->result() as $item) {
            $select .= "<option data-order=\"".$i++."\" value=\"".$item->id."\">".$item->nama."</option>";
        }
        $select .= "</select>";
        return $select;
      }

      function selectKetdonasi($id_jenis,$id_subjenis) {
        $rs = $this->db->get_where('mast_ketdonasi', array('id_jnsdonasi' => $id_jenis, 'id_subjenis' => $id_subjenis, 'is_aktif' => 1));
        $count = $rs->num_rows();
        if($count == 0) {
            $readonly = 'readonly';
        } else {
            $readonly = '';
        }
        $select = "<select class=\"validate[required] form-control ketdonasi\" id=\"ketdonasi\" name=\"ketdonasi\" ".$readonly.">";
        $select .= "<option value=\"\">.: Pilih :.</option>";
        foreach($rs->result() as $item) {
            $select .= "<option value=\"".$item->id."\">".$item->nama."</option>";
        }
        $select .= "</select>";
        return $select;
      }

      function getSubjenisdonasi($id_subjenis) {
        $rs = $this->db->get_where("mast_subjenisdonasi", array('id' => $id_subjenis))->row();
        return $rs->nama;
      }

      function getKetdonasi($id_ket) {
        $rs = $this->db->get_where("mast_ketdonasi", array('id' => $id_ket))->row();
        return $rs->nama;
      }

      function getLogopayment($kode) {
        $rs = $this->db->get_where("mast_payment", array("kode" => $kode))->row();
        return $rs->logo;
      }

      function getPaymentmethod($kode) {
        $rs = $this->db->get_where("mast_payment", array("kode" => $kode))->row();
        return $rs;
      }

      function getDonaturByref($no) {
        $rs = $this->db->get_where("tr_donasi", array('noreferensi' => $no));
        return $rs;
      }

      function getDonatur() {
        $rs = $this->db->select("*")->from("tr_donasi")->order_by('created_at','asc')->get();
        return $rs;
      }

      function getNoreferensi($jenis) {
        $rs = $this->db->query("SELECT * FROM mast_jenisdonasi WHERE id=\"".$jenis."\" ")->row();
        $nomor = $this->db->query("SELECT LPAD(IFNULL(MAX(RIGHT(noreferensi,4))+1,1),4,0) AS nomor FROM tr_donasi")->row();
        $no = $rs->kode.date('m').date('y').$nomor->nomor;
        $res = array('kd_unik' => $nomor->nomor, 'no' => $no);
        return $res;
      }

      function getSelectrole($name, $pil) {
        $sel = "<select name='$name' id='$name' class='validate[required] form-control'>";
        $sel .= "<option value=''>.:Pilihan:.</option>";
        $q = $this->db->query('SELECT * FROM roles WHERE id NOT IN (1)');
        foreach($q->result() as $item) {
          if($pil == $item->id) {
            $s = 'selected';
          } else {
            $s = '';
          }
          $sel .= "<option value=\"".$item->id."\" ".$s.">".$item->role."</option>";
        }
        $sel .= "</select>";
        return $sel;
      }
    
}