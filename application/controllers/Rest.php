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

	}


	public function productos_get($param="")
	{
		$registros = $this->Productos_model->listar();

		echo json_encode($registros);
	}

}
