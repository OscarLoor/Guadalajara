<?php
// process.php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array

    if (empty($_POST['nombre']))
        $errors['nombre'] = 'Nombre es requerido.';

    if (empty($_POST['email']))
        $errors['email'] = 'Email es requerido.';

    if (empty($_POST['telefono']))
        $errors['telefono'] = 'Teléfono es requerido.';

    if (empty($_POST['mensaje']))
        $errors['mensaje'] = 'Mensaje es requerido.';


// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message

        // DO ALL YOUR FORM PROCESSING HERE
        // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)
// El mensaje
$mensaje = "Nombre: ".$_POST['nombre']."<br>Teléfono: ".$_POST['telefono']."<br>Email: ".$_POST['email']."<br>Mensaje: ".$_POST['mensaje'];


$cabeceras = 'From: dwquito@hotmail.com' . "\r\n" .
    'Reply-To: dwquito@hotmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion() . "\r\n" .
    "Content-type: text/html; charset=UTF-8";
// Enviarlo
$resultado = mail('dwquito@hotmail.com', 'Formulario de Contacto Transportes Guadalajara', $mensaje, $cabeceras);

     if($resultado==true){
      //Mensaje enviado correctamente
       $data['success'] = true;
        $data['message'] = 'Mensaje enviado correctamente';
     }else{
      $data['success'] = false;
      $errors['servidor'] = 'El servidor no pudo enviar el email.';
        $data['errors']  = $errors;
     }
        // show a message of success and provide a true success variable

    }

    // return all our data to an AJAX call
    echo json_encode($data);
?>
