<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mezcla extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_materia_prima'); 
        $this->load->model('model_productos');        
    }

	public function index()
	{
		$data['materias_primas'] = $this->model_materia_prima->get_all_materias();
		$data['masterbachs'] = $this->model_materia_prima->get_all_masterbachs();
		$data['productos'] = $this->model_productos->get_all_mezclas();

		$data['mezcla_materia'] = $this->model_productos->get_materias_mezcla();
		$data['mezcla_master'] = $this->model_productos->get_masters_mezcla();

		$this->load->view('view_header');
		$this->load->view('view_mezclas', $data);
	}
}