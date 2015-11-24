<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orden_trabajo extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_materia_prima');        
        $this->load->model('model_orden_trabajo');        
    }

	public function index()
	{
		$data['materias_primas'] = $this->model_materia_prima->get_all_materias();
		$data['masterbachs'] = $this->model_materia_prima->get_all_masterbachs();
		$data['ordenes_trabajo'] = $this->model_orden_trabajo->get_all_ordenes();
		foreach ($data['ordenes_trabajo'] as $key => $orden) {
			$prox = $this->model_orden_trabajo->get_prox_entrega($orden->id_orden);
			$data['ordenes_trabajo'][$key] = (object) array_merge( (array) $data['ordenes_trabajo'][$key], (array) array('proxima' => $prox));
		}
		$this->load->view('view_header');
		$this->load->view('view_orden_trabajo', $data);
	}

	public function orden($id_orden = 0)
	{
		if($id_orden == 0) redirect("orden_trabajo");
		$data['orden_trabajo'] = $this->model_orden_trabajo->get_orden($id_orden);
		if($data['orden_trabajo'] == '') redirect("orden_trabajo");
		$data['materias_x_orden'] = $this->model_orden_trabajo->get_materia_x_orden($id_orden);
		$data['entregas_x_orden'] = $this->model_orden_trabajo->get_entregas_x_orden($id_orden);
		$this->load->view('view_header');
		$this->load->view('view_orden', $data);
	}
}