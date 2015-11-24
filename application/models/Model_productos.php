<?php

class Model_productos extends CI_Model 
{
	public function get_all_productos()
	{
		return $this->db->get("productos")->result();
	}	

	public function get_producto($id_producto)
	{
		return $this->db->get_where("productos", array("id_producto" => $id_producto))->row();
	}

	public function get_materias_producto($id_producto)
	{
		$this->db->select("*");
		$this->db->from("productos_materias");
		$this->db->join("materias_primas", "materias_primas.id_materia = productos_materias.id_materia");
		$this->db->where("id_producto", $id_producto);
		return $this->db->get()->result();		
	}

	public function get_masters_producto($id_producto)
	{
		$this->db->select("*");
		$this->db->from("productos_masters");
		$this->db->join("masterbach", "masterbach.id_masterbach = productos_masters.id_masterbach");
		$this->db->where("id_producto", $id_producto);
		return $this->db->get()->result();	
	}

	public function add_producto($descripcion, $codigo, $gr_pieza, $scrap, $pallets)
	{
		$data = array(
			'descripcion' => $descripcion,
        	'codigo' => $codigo,
        	'gr_pieza' => $gr_pieza,
        	'scrap' => $scrap,
        	'pallets' => $pallets
		);
		$this->db->insert('productos', $data);
		return $this->db->insert_id();
	}

	public function add_producto_master($id_producto, $id_masterbach, $cantidad)
	{
		$data = array(
			'id_producto' => $id_producto,
        	'id_masterbach' => $id_masterbach,
        	'cantidad' => $cantidad
		);
		$this->db->insert('productos_masters', $data);
	}

	public function add_producto_materia($id_producto, $id_materia, $virgen, $recuperado)
	{
		$data = array(
			'id_producto' => $id_producto,
        	'id_materia' => $id_materia,
        	'virgen' => $virgen,
        	'recuperado' => $recuperado
		);
		$this->db->insert('productos_materias', $data);
	}

	//mezclas
	public function get_all_mezclas()
	{
		return $this->db->select("*")->from("mezcla")->join("mezcla_productos", "mezcla.id_producto = mezcla_productos.id_producto")->get()->result();		
	}

	public function get_materias_mezcla()
	{
		return $this->db->select("*")->from("mezcla_materia")->join("materias_primas", "materias_primas.id_materia = mezcla_materia.id_materia")->get()->result();		
	}

	public function get_masters_mezcla()
	{
		return $this->db->select("*")->from("mezcla_master")->join("masterbach", "mezcla_master.id_master = masterbach.id_masterbach")->get()->result();	
	}
	//end mezclas
}