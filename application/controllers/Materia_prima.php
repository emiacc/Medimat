<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materia_prima extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_materia_prima');        
    }

	public function index($id_materia = 0)
	{
		if($id_materia != 0)
		{
			$data['historial'] = $this->model_materia_prima->get_historial($id_materia);
			$data['materia_seleccionada'] = $this->model_materia_prima->get_materia($id_materia);			
		}
		$data['materias_primas'] = $this->model_materia_prima->get_all_materias();
		$this->load->view('view_header');
		$this->load->view('view_materia_prima', $data);
	}

	public function ingreso()
	{
		$fecha = $this->input->post('fecha_ingreso');
		$fecha = date('Y-m-d',strtotime($fecha));
		$id_materia = $this->input->post('select_materias');
		$cantidad = $this->input->post('cantidad');
		$this->model_materia_prima->ingreso($fecha, $id_materia, $cantidad);
		redirect("materia_prima/index/$id_materia");
	}
}