<?php

class beranda extends CI_Controller {
	public function index()
	{
		$this->load->view("index.php");
	}
		public function smasuk()
	{
		$this->load->view("SuratMasuk_view.php");
	}
    	public function skeluar()
	{
		$this->load->view("SuratKeluar_view.php");
	}
		public function cetak_masuk()
	{
		$this->load->view("cetak_masuk.php");
	}    
		public function cetak_keluar()
	{
		$this->load->view("cetak_keluar.php");
	}
}