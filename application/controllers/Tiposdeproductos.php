<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador Para los tipos de productos

*/
class Tiposdeproductos extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		// cargar la libreria del rud grocery
		
		$this->load->library("grocery_CRUD");

		if (!$this->session->userdata("idusuario")) {
			redirect('login');
		}
	}


	public function index()
	{
		$vector["usuario"]=$this->session->userdata("nombredeusuario");
		$crud=new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('tiposdeproductos'); 
		$crud->set_subject('Listado de tipos de productos');	
		$crud->display_as('nombre','Ingrese el tipo de producto');
		$crud->display_as('fechaderegistro','Fecha de ingreso');
		$crud->display_as('fechademodificacion','Ultimo cambio en el sistema');
		$crud->required_fields(array('nombre'));
		$crud->unique_fields(array('nombre'));
		$crud->fields('nombre');	
		$tabla=$crud->render();
		$vector['tabla']=$tabla->output;
		$vector['css_files']=$tabla->css_files;
		$vector['js_files']=$tabla->js_files;
		$vector["fotousuario"]=$this->session->userdata("imgusuario");
		$vector["idusuario"]=$this->session->userdata("idusuario");
		$vector["idperfil"]=$this->session->userdata("idperfil");
		$vector["correousuario"]=$this->session->userdata("correousuario");

		$this->load->view('tiposdeproductos',$vector);
	}

}
