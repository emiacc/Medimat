<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function index()	
	{
		redirect('login/logueado');
	}

	public function iniciar_sesion() 
	{
      	$this->load->view('view_login');
	}

	public function iniciar_sesion_post() 
	{
      if ($this->input->post()) {
         //si el usuario desea que se mantenga iniciada la sesion
         $mantener = $this->input->post('mantener');
         if($mantener) $this->session->sess_expire_on_close = FALSE;
         else $this->session->sess_expire_on_close = TRUE;
         
         $nombre_usuario = $this->input->post('nombre_usuario');
         $password = $this->input->post('password');
         $this->load->model('model_login');
         $usuario = $this->model_login->login($nombre_usuario, $password);
         
         //guardo los datos del usuario
         if ($usuario) {
            $usuario_data = array(
               'logueado' => TRUE,
               'userdata' => array(
                  'id_usuario' => $usuario->id_usuario,
                  'username' => $usuario->nombre_usuario,
                  'nombre' => $usuario->nombre,
                  'apellido' => $usuario->apellido,
                  'foto' => $usuario->foto,
                  'rol' => $usuario->rol
               )
            );
            $this->session->set_userdata($usuario_data);
            redirect('login/logueado');
         } 
         else {
            $this->session->set_flashdata('state', '1');
            redirect('login/iniciar_sesion');
         }
      } 
      else {
         $this->iniciar_sesion();
      }
   }

   public function logueado() 
   {
      if($this->session->userdata('logueado'))
         redirect('home');
      else
         redirect('login/iniciar_sesion');
      
   }

   public function cerrar_sesion() 
   {
      $usuario_data = array(
         'logueado' => FALSE
      );
      $this->session->set_userdata($usuario_data);
      redirect('login/iniciar_sesion');
   }
}
?>