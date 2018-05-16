<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratKeluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SuratKeluar_Model','person');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('SuratKeluar_view');
		$data = array(
            'tb_surat_keluar_data' => $tb_surat_keluar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
	}

	public function ajax_list()
	{

		$this->load->library('form_validation');
		
		$this->load->helper('url');

		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->no_surat;
			$row[] = $person->tgl_surat;
			$row[] = $person->nama_pengirim;
			$row[] = $person->perihal_surat;
			$row[] = $person->waktu_input;
			if($person->foto_surat)
				$row[] = '<a href="'.base_url('upload/'.$person->foto_surat).'" target="_blank">'.($person->foto_surat).'</a>';
			else
				$row[] = '(No photo)';

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
        $data->tanggal_surat = ($data->tgl_surat == '0000-00-00') ? '' : $data->tgl_surat; // if 0000-00-00 set tu empty for datepicker compatibility
        $data->tanggal_surat_diterima = ($data->waktu_input == '0000-00-00') ? '' : $data->waktu_input;
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				    'no_surat' => $this->input->post('no_surat'),
					'tgl_surat' => $this->input->post('tgl_surat'),
					'nama_pengirim' => $this->input->post('nama_pengirim'),
					'perihal_surat' => $this->input->post('perihal_surat'),
					'waktu_input' => $this->input->post('waktu_input'),
			);

		if(!empty($_FILES['foto_surat']['name']))
		{

			$upload = $this->_do_upload();
			$data['foto_surat'] = $upload;
		}

		$insert = $this->person->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				    'no_surat' => $this->input->post('no_surat'),
					'tgl_surat' => $this->input->post('tgl_surat'),
					'nama_pengirim' => $this->input->post('nama_pengirim'),
					'perihal_surat' => $this->input->post('perihal_surat'),
					'waktu_input' => $this->input->post('waktu_input'),
			);

		

		if(!empty($_FILES['foto_surat']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$person = $this->person->get_by_id($this->input->post('id'));
			if(file_exists('upload/'.$person->foto_surat) && $person->foto_surat)
				unlink('upload/'.$person->foto_surat);

			$data['foto_surat'] = $upload;
		}

		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$person = $this->person->get_by_id($id);
		if(file_exists('upload/'.$person->foto_surat) && $person->foto_surat)
			unlink('upload/'.$person->foto_surat);
		
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
        $config['max_size']             = 1000000; //set max size allowed in Kilobyte
        // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto_surat')) //upload and validate
        {
            $data['inputerror'][] = 'foto_surat';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('no_surat') == '')
		{
			$data['inputerror'][] = 'no_surat';
			$data['error_string'][] = 'No Surat is required';
			$data['status'] = FALSE;
		}

		
		if($this->input->post('tgl_surat') == '')
		{
			$data['inputerror'][] = 'tgl_surat';
			$data['error_string'][] = 'Tanggal Surat is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_pengirim') == '')
		{
			$data['inputerror'][] = 'nama_pengirim';
			$data['error_string'][] = 'Nama Pengirim is required';
			$data['status'] = FALSE;
		}
		

		if($this->input->post('perihal_surat') == '')
		{
			$data['inputerror'][] = 'perihal_surat';
			$data['error_string'][] = 'Perihal Surat is required';
			$data['status'] = FALSE;
		}
		

		if($this->input->post('waktu_input') == '')
		{
			$data['inputerror'][] = 'waktu_input';
			$data['error_string'][] = 'Waktu Input Diterima is required';
			$data['status'] = FALSE;
		}
        

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	public function excel()
        {
            $this->load->helper('exportexcel');
            $namaFile = "tb_surat_keluar.xls";
            $judul = "tb_surat_keluar";
            $tablehead = 0;
            $tablebody = 1;
            $nourut = 1;
            //penulisan header
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Content-Disposition: attachment;filename=" . $namaFile . "");
            header("Content-Transfer-Encoding: binary ");

            xlsBOF();

            $kolomhead = 0;
            xlsWriteLabel($tablehead, $kolomhead++, "No");
    	xlsWriteLabel($tablehead, $kolomhead++, "No Surat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Surat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pengirim");
    	xlsWriteLabel($tablehead, $kolomhead++, "Perihal Surat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Waktu Input");
    	xlsWriteLabel($tablehead, $kolomhead++, "Foto Surat");

    	foreach ($this->Tb_surat_keluar_model->get_all() as $data) {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->no_surat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_surat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pengirim);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->perihal_surat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu_input);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->foto_surat);

    	    $tablebody++;
                $nourut++;
            }

            xlsEOF();
            exit();
        }

        public function word()
        {
            header("Content-type: application/vnd.ms-word");
            header("Content-Disposition: attachment;Filename=tb_surat_keluar.doc");

            $data = array(
                'tb_surat_keluar_data' => $this->Tb_surat_keluar_model->get_all(),
                'start' => 0
            );
            
            $this->load->view('tb_surat_keluar/tb_surat_keluar_doc',$data);
        }

}

