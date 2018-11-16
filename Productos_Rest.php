<?php  


	/*Este escriptpermit   */



	$correo="";
	$clave="";

	$post=array('correo'=> $correo, 'clave' => $clave);

	//rutaparainvocar el API
	$ruta="http://localhost:81/ProyectoJhonProductos/index.php/rest/productos_post";

	//metodo curl
	$curl = curl_init($ruta);
	//pasar parametros de conexion
	curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-typy: multipart/form-data;charset=\"utf-8\""));
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);

	curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
	//vamos a ejecutar dos funciones que posee el curl
	// curl_exec para enviar peticion
	//curl_error en caso de error coge el msj del error
	$resultado = curl_exec($curl);
	$error=curl_error($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	if ($status<>"200") {
		echo "Se presento un error: ".$status.", Error: ".$error." Resultado: ".($resultado);
	}
	else{
		echo "<h1>Resultado de la operacion de insercion de datos</h1>";
		print_r(json_decode($resultado,true));
		//recorrer resultado

		}

	curl_close($curl);

 ?>

