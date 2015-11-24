<?php

class Model_materia_prima extends CI_Model 
{
	public function get_all_materias()
	{
		return $this->db->get('materias_primas')->result();
	}

	public function get_all_masterbachs()
	{
		return $this->db->get('masterbach')->result();
	}	

	public function get_historial($id_materia)
	{
		return $this->db->get_where('movimientos_materia_prima', array('id_materia' => $id_materia))->result();
	}

	public function get_materia($id_materia)
	{
		return $this->db->get_where('materias_primas', array('id_materia' => $id_materia))->row();
	}

	public function ingreso($fecha, $id_materia, $cantidad)
	{
		$data = array(
			'id_materia' => $id_materia,
        	'fecha' => $fecha,
        	'ingreso' => 1,
        	'cantidad' => $cantidad
		);
		$this->db->insert('movimientos_materia_prima', $data);
	}
}