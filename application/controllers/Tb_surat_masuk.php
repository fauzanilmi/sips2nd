<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_surat_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_surat_masuk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tb_surat_masuk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tb_surat_masuk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tb_surat_masuk/index.html';
            $config['first_url'] = base_url() . 'tb_surat_masuk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tb_surat_masuk_model->total_rows($q);
        $tb_surat_masuk = $this->Tb_surat_masuk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tb_surat_masuk_data' => $tb_surat_masuk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tb_surat_masuk/tb_surat_masuk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_surat_masuk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'no_surat' => $row->no_surat,
		'nama_pengirim' => $row->nama_pengirim,
		'tanggal_surat' => $row->tanggal_surat,
		'perihal_surat' => $row->perihal_surat,
		'tanggal_surat_diterima' => $row->tanggal_surat_diterima,
		'foto_surat' => $row->foto_surat,
	    );
            $this->load->view('tb_surat_masuk/tb_surat_masuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_surat_masuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_surat_masuk/create_action'),
	    'id' => set_value('id'),
	    'no_surat' => set_value('no_surat'),
	    'nama_pengirim' => set_value('nama_pengirim'),
	    'tanggal_surat' => set_value('tanggal_surat'),
	    'perihal_surat' => set_value('perihal_surat'),
	    'tanggal_surat_diterima' => set_value('tanggal_surat_diterima'),
	    'foto_surat' => set_value('foto_surat'),
	);
        $this->load->view('tb_surat_masuk/tb_surat_masuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_surat' => $this->input->post('no_surat',TRUE),
		'nama_pengirim' => $this->input->post('nama_pengirim',TRUE),
		'tanggal_surat' => $this->input->post('tanggal_surat',TRUE),
		'perihal_surat' => $this->input->post('perihal_surat',TRUE),
		'tanggal_surat_diterima' => $this->input->post('tanggal_surat_diterima',TRUE),
		'foto_surat' => $this->input->post('foto_surat',TRUE),
	    );

            $this->Tb_surat_masuk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_surat_masuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_surat_masuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_surat_masuk/update_action'),
		'id' => set_value('id', $row->id),
		'no_surat' => set_value('no_surat', $row->no_surat),
		'nama_pengirim' => set_value('nama_pengirim', $row->nama_pengirim),
		'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),
		'perihal_surat' => set_value('perihal_surat', $row->perihal_surat),
		'tanggal_surat_diterima' => set_value('tanggal_surat_diterima', $row->tanggal_surat_diterima),
		'foto_surat' => set_value('foto_surat', $row->foto_surat),
	    );
            $this->load->view('tb_surat_masuk/tb_surat_masuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_surat_masuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'no_surat' => $this->input->post('no_surat',TRUE),
		'nama_pengirim' => $this->input->post('nama_pengirim',TRUE),
		'tanggal_surat' => $this->input->post('tanggal_surat',TRUE),
		'perihal_surat' => $this->input->post('perihal_surat',TRUE),
		'tanggal_surat_diterima' => $this->input->post('tanggal_surat_diterima',TRUE),
		'foto_surat' => $this->input->post('foto_surat',TRUE),
	    );

            $this->Tb_surat_masuk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_surat_masuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_surat_masuk_model->get_by_id($id);

        if ($row) {
            $this->Tb_surat_masuk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_surat_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_surat_masuk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_surat', 'no surat', 'trim|required');
	$this->form_validation->set_rules('nama_pengirim', 'nama pengirim', 'trim|required');
	$this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');
	$this->form_validation->set_rules('perihal_surat', 'perihal surat', 'trim|required');
	$this->form_validation->set_rules('tanggal_surat_diterima', 'tanggal surat diterima', 'trim|required');
	$this->form_validation->set_rules('foto_surat', 'foto surat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_surat_masuk.xls";
        $judul = "tb_surat_masuk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pengirim");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Perihal Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Surat Diterima");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto Surat");

	foreach ($this->Tb_surat_masuk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pengirim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perihal_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_surat_diterima);
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
        header("Content-Disposition: attachment;Filename=tb_surat_masuk.doc");

        $data = array(
            'tb_surat_masuk_data' => $this->Tb_surat_masuk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_surat_masuk/tb_surat_masuk_doc',$data);
    }

}

/* End of file Tb_surat_masuk.php */
/* Location: ./application/controllers/Tb_surat_masuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-14 14:58:17 */
/* http://harviacode.com */