<?php

class Model_login extends CI_Model 
{
	public function login($nombre_usuario, $password) 
	{
    	$this->db->select('*');
      	$this->db->from('usuarios');
      	$this->db->where('nombre_usuario', $nombre_usuario);
      	$this->db->where('password', $password);
      	$consulta = $this->db->get();
      	$resultado = $consulta->row();
      	return $resultado;
   }
}