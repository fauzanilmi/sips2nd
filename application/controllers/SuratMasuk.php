<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SuratMasuk_Model','person');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('SuratMasuk_view');
	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->no_surat;
			$row[] = $person->nama_pengirim;
			$row[] = $person->tanggal_surat;
			$row[] = $person->perihal_surat;
			$row[] = $person->tanggal_surat_diterima;
			if($person->foto_surat)
				$row[] = '<a href="'.base_url('upload/'.$person->foto_surat).'" target="_blank">'.($person->foto_surat).'</a>';
			else
				$row[] = '(No File)';

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
        $data->tanggal_surat = ($data->tanggal_surat == '0000-00-00') ? '' : $data->tanggal_surat; // if 0000-00-00 set tu empty for datepicker compatibility
        $data->tanggal_surat_diterima = ($data->tanggal_surat_diterima == '0000-00-00') ? '' : $data->tanggal_surat_diterima;
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				    'no_surat' => $this->input->post('no_surat'),
					'nama_pengirim' => $this->input->post('nama_pengirim'),
					'tanggal_surat' => $this->input->post('tanggal_surat'),
					'perihal_surat' => $this->input->post('perihal_surat'),
					'tanggal_surat_diterima' => $this->input->post('tanggal_surat_diterima'),
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
					'nama_pengirim' => $this->input->post('nama_pengirim'),
					'tanggal_surat' => $this->input->post('tanggal_surat'),
					'perihal_surat' => $this->input->post('perihal_surat'),
					'tanggal_surat_diterima' => $this->input->post('tanggal_surat_diterima'),
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

		if($this->input->post('nama_pengirim') == '')
		{
			$data['inputerror'][] = 'nama_pengirim';
			$data['error_string'][] = 'Nama Pengirim is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanggal_surat') == '')
		{
			$data['inputerror'][] = 'tanggal_surat';
			$data['error_string'][] = 'Tanggal Surat is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('perihal_surat') == '')
		{
			$data['inputerror'][] = 'perihal_surat';
			$data['error_string'][] = 'Perihal Surat is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanggal_surat_diterima') == '')
		{
			$data['inputerror'][] = 'tanggal_surat_diterima';
			$data['error_string'][] = 'Tanggal Surat Diterima is required';
			$data['status'] = FALSE;
		}
        

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	

}
