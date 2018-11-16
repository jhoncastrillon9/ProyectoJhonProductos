<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador Para los servicios REST
1 listar Productos 
2 cotizar un producto de acuer a los datos que traiga 
*/
class Rest extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->Model('Productos_model');
		$this->load->Model('Login_model');

	}

	public function productos_get($param="")
	{
		$registros = $this->Productos_model->listar();

		echo json_encode($registros);
	}

	public function productos_post()
	{
		$registros = $this->Login_model->validar_usuario();

		if	(count($registros)>0){
			//operacion de insercion
			
			$respuesta = $this->Productos_model->agregar();
			
			if($respuesta){
				$mensaje="Referencia Cargada";
			}else{
				$mensaje="Referecia no se puede cargar";
			}

		}else{
			$mensaje="El usuario no esta autenticado";
		}

		$vector=array("mensaje"=>$mensaje);

		echo json_encode($mensaje);
	}

		public function productos_put()
	{
		//$registros = $this->Productos_model->listar();

		//echo json_encode($registros);
	}

		public function productos_delete()
	{
		$registros = $this->Login_model->validar_usuario();

		if	(count($registros)>0){
			//operacion de insercion
			
			$respuesta = $this->Productos_model->eliminar();
			
			if($respuesta){
				$mensaje="Referencia Elinada";
			}else{
				$mensaje="Referecia no se puede Eliminar";
			}

		}else{
			$mensaje="El usuario no esta autenticado";
		}

		$vector=array("mensaje"=>$mensaje);

		echo json_encode($mensaje);
	}

}
