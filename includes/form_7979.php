<?php
	if (empty($_POST['nombre']) && strlen($_POST['nombre']) == 0 || empty($_POST['telefono']) && strlen($_POST['telefono']) == 0 || empty($_POST['correo']) && strlen($_POST['correo']) == 0)
	{
		return false;
	}
	
	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	$optin_24998_45298_7979 = $_POST['optin_24998_45298_7979'];
	
	// Create Message	
	$to = 'correo@itesla.edu.mx';
	$email_subject = "Mensaje de enviado desde www.itesla.edu.mx";
	$email_body = "Tienes mensaje nuevo. \n\nNombre: $nombre \nTelefono: $telefono \nCorreo: $correo \nAsunto: $asunto \nMensaje: $mensaje \nOptin_24998_45298_7979: $optin_24998_45298_7979 \n";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
	$headers .= "From: noresponder@itesla.edu.mx\r\n";
	$headers .= "Reply-To: $correo";

	// Post Message
	if (function_exists('mail'))
	{
		$result = mail($to,$email_subject,$email_body,$headers);
	}
	else // Mail() Disabled
	{
		$error = array("message" => "The php mail() function is not available on this server.");
	    header('Content-Type: application/json');
	    http_response_code(500);
	    echo json_encode($error);
	}	
?>