<?php
/* 
Modelo general de productos
*/
class Productos_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->helper('security');
		$this->tabla="tblproductos";
	}

	function listar() {
	
		$query=$this->db->get($this->tabla);
		return $query->result_array();
	
	}

	function agregar() {
	
		$nombre=$this->input->post("nombre");
		$descripcion=$this->input->post("descripcion");
		$precio=$this->input->post("precio");
		$impuestos=$this->input->post("impuestos");
		$referencia=$this->input->post("referencia");

		$nombre=$this->security->xss_clean($nombre);
		$descripcion=$this->security->xss_clean($descripcion);
		$precio=$this->security->xss_clean($precio);
		$impuestos=$this->security->xss_clean($impuestos);
		$referencia=$this->security->xss_clean($referencia);

		$data=array("referencia"=>$referencia);

		$query=$this->db->get_where($this->tabla, $data);
		$res=$query->result_array();

		//si se inserta devuelva true
		if (count($res)>0) {
			return false;
		}
		else{
			$data=array
			(
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'precio' => $precio,
			'impuestos' => $impuestos,
			'referencia'=> $referencia
			);

			if ($this->db->insert($this->tabla,$data)) {
				return true;
			}else{
				return false;
			}
			
		}
	
	}



	function eliminar() {	

		$referencia=$this->input->post("referencia");
		$referencia=$this->security->xss_clean($referencia);
		$data=array("referencia"=>$referencia);
		//Consultamos si hay un registro con ese caso

		//Condicion para eliminar 
		$this->db->where("referencia", $referencia);
		
		//si se elimina devuelva true
		if ($this->db->delete($this->tabla)) {
			return true;
		}
		else{	
			return false;
		}
	
	}

}
?>










