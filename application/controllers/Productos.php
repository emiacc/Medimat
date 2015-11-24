<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller 
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
		$data['productos'] = $this->model_productos->get_all_productos();
		$this->load->view('view_header');
		$this->load->view('view_productos', $data);
	}

	public function producto($id_producto = 0)
	{
		if($id_producto == 0) redirect('productos');
		$data['producto'] = $this->model_productos->get_producto($id_producto);
		$data['materia_producto'] = $this->model_productos->get_materias_producto($id_producto);
		$data['masters_producto'] = $this->model_productos->get_masters_producto($id_producto);
		$this->load->view('view_header');
		$this->load->view('view_producto', $data);
	}

	public function nuevo_producto()
	{
		$descripcion = $this->input->post('descripcion');		
		$codigo = $this->input->post('codigo');		
		$gr_pieza = $this->input->post('gr_pieza');		
		$scrap = $this->input->post('scrap');		
		$pallets = $this->input->post('pallets');		
		$id_masterbaches = $this->input->post('id_masterbach');		
		$cantidad = $this->input->post('cantidad');		
		$id_materias = $this->input->post('id_materia');		
		$virgen = $this->input->post('virgen');		
		$recuperado = $this->input->post('recuperado');	

		$this->db->trans_start();
		
		$id_producto = $this->model_productos->add_producto($descripcion, $codigo, $gr_pieza, $scrap, $pallets);	
		
		foreach ($id_masterbaches as $key => $id_masterbach) 
		{
			$this->model_productos->add_producto_master($id_producto, $id_masterbach, $cantidad[$key]);
		}
		
		foreach ($id_materias as $key => $id_materia) 
		{
			$this->model_productos->add_producto_materia($id_producto, $id_materia, $virgen[$key], $recuperado[$key]);
		}

		$this->db->trans_complete();
		redirect('productos');
	}
}