<?php 
//Cliente o escrit que permite invocar servicio
//existen dos metodos 
$ruta="http://localhost:81/ProyectoJhonProductos/ProyectoJhonProductos/index.php/rest/productos_get";

//metodo curl
$curl = curl_init($ruta);
//pasar parametros de conexion
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-typy: multipart/form-data;charset=\"utf-8\""));
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_TIMEOUT, 10);

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
	echo "<h1>Resultados Encontrados</h1>";
	$data= json_decode($resultado,true);
	//recorrer resultado

	 ?>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <div class="container">
<table class="table table">
  <tr>
    <td>Nombre</td>
    <td>Descripción</td>
    <td>Precio</td>
    <td>Imagen</td>
  </tr>
  <?php 
	foreach ($data as $producto) {		

	echo "<tr><td>".$producto["nombre"]."</td>";
	echo "<td>".$producto["descripcion"]."</td>";  
	echo "<td>".$producto["precio"]."</td>";   
	echo "<td><img src='http://localhost:81/ProyectoJhonProductos/ProyectoJhonProductos/assets/imagenes/productos/".$producto["imagen"]."'></td></tr>";  
		
	}
}

   ?>
</table>
</div>

 <?php  

curl_close($curl);

 ?>
