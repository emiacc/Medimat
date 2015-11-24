<?php

class Model_orden_trabajo extends CI_Model 
{
	public function get_all_ordenes()
	{
		$this->db->select('*');
		$this->db->from('ordenes_trabajo');
		$this->db->join('estados', 'estados.id_estado = ordenes_trabajo.id_estado');
		return $this->db->get()->result();
	}	

	public function get_prox_entrega($id_orden)
	{
		$this->db->select('MIN(fecha_entrega) as fecha');
		$this->db->from('ordenes_trabajo_cantidades');
		$this->db->where('id_orden', $id_orden);
		$this->db->where('entregado', 0);
		return $this->db->get()->row()->fecha;
	}

	public function get_orden($id_orden)
	{
		return $this->db->get_where('ordenes_trabajo', array('id_orden' => $id_orden))->row();
	}

	public function get_materia_x_orden($id_orden)
	{
		$this->db->select('o.lote, m.descripcion as materia, s.descripcion as master');
		$this->db->from('ordenes_trabajo_materias o');
		$this->db->join('materias_primas m', 'm.id_materia = o.id_materia');
		$this->db->join('masterbach s', 's.id_masterbach = o.id_masterbach');
		$this->db->where('id_orden', $id_orden);
		return $this->db->get()->result();
	}
		
	public function get_entregas_x_orden($id_orden)
	{
		return $this->db->get_where('ordenes_trabajo_cantidades', array('id_orden' => $id_orden))->result();
	}
}