<?php
class Query extends CI_Model {
	
	function getMetodepembayaran() {
        $rs = $this->db->get_where('mast_payment', array('is_aktif' => 1));
        return $rs;
    }

    function selectDonasi() {
        $rs = $this->db->query("SELECT * FROM mast_jenisdonasi WHERE is_aktif = \"1\" ");
        $select = "<select class=\"validate[required] form-control jns_donasi\" id=\"jns_donasi\" name=\"jns_donasi\" required>";
        $select .= "<option value=\"\">.: Pilih :.</option>";
        foreach($rs->result() as $item) {
            $select .= "<option value=\"".$item->id."\">".$item->nama."</option>";
        }
        $select .= "</select>";
        return $select;
    }

    function selectSubdonasi($id_jenis) {
        $rs = $this->db->get_where('mast_subjenisdonasi', array('id_jnsdonasi' => $id_jenis, 'is_aktif' => 1));
        $select = "<select class=\"validate[required] form-control subjenis\" id=\"subjenis\" name=\"subjenis\" required>";
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

    function getNoreferensi($jenis) {
        $rs = $this->db->query("SELECT * FROM mast_jenisdonasi WHERE id=\"".$jenis."\" ")->row();
        $nomor = $this->db->query("SELECT LPAD(IFNULL(MAX(RIGHT(noreferensi,4))+1,1),4,0) AS nomor FROM tr_donasi")->row();
        $no = $rs->kode.date('m').date('y').$nomor->nomor;
        $res = array('kd_unik' => $nomor->nomor, 'no' => $no);
        return $res;
    }

    function getJenisDonasi($id_jenis) {
        $rs = $this->db->get_where("mast_jenisdonasi", array('id' => $id_jenis))->row();
        return $rs->nama;
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

    function getDonaturtempByref($no) {
        $rs = $this->db->get_where("tr_donasi_temp", array('noreferensi' => $no))->row();
        return $rs;
    }

    function getDonaturByref($no) {
        $rs = $this->db->get_where("tr_donasi", array('noreferensi' => $no))->row();
        return $rs;
    }
    
}