<?php

echo "lalalalala";
  function validar_registro($validacion){

    // Validar nombre.
    // Chequear si el nombre está vacío.
    if ($_POST["nombre"] == "") {
        $validacion["error"]["nombre"] = "Este campo es obligatorio.";
    } else {
        $validacion["valor"]["nombre"] = $_POST["nombre"];
        // Chequear si el nombre sólo contiene letras y espacios.
        if (!preg_match("/^[a-zA-Z ]*$/",$validacion["valor"]["nombre"])) {
          $validacion["error"]["nombre"] = "El nombre sólo puede contener letras y espacios.";
          $validacion["valor"]["nombre"] = "";
        }
      }

    // Validar apellido.
    // Chequear si el apellido está vacío.
    if ($_POST["apellido"] == "") {
      $validacion["error"]["apellido"] = "Este campo es obligatorio.";
    } else {
        $validacion["valor"]["apellido"] = $_POST["apellido"];
        // Chequear si el apellido sólo contiene letras y espacios.
        if (!preg_match("/^[a-zA-Z ]*$/",$validacion["valor"]["apellido"])) {
          $validacion["error"]["apellido"] = "El apellido sólo puede contener letras y espacios.";
          $validacion["valor"]["apellido"] = "";
        }
      }

    // Validar username.
    // Chequear si el username está vacío.
    if ($_POST["username"] == "") {
      $validacion["error"]["username"] = "Este campo es obligatorio.";
    } else {
        $validacion["valor"]["username"] = $_POST["username"];
        // El username debe tener entre 5 y 20 caracteres, y sólo se permiten caracteres alfanuméricos.
        if (!preg_match("/^(?=.{5,20}$)[a-zA-Z0-9]+$/",$validacion["valor"]["username"])) {
          $validacion["error"]["username"] = "El username debe contener entre 5 y 20 caracteres alfanuméricos.";
          $validacion["valor"]["username"] = "";
        } elseif (usuario_registrado()){
            $validacion["error"]["username"] = "El username ingresado ya existe.";
            $validacion["valor"]["username"] = "";
        }
      }

    // Validar email.
    // Chequear si el email está vacío.
    if ($_POST["email"] == "") {
      $validacion["error"]["email"] = "Este campo es obligatorio.";
    } else {
        $validacion["valor"]["email"] = $_POST["email"];
        // Chequear si el email tiene el formato correcto.
        if (!filter_var($validacion["valor"]["email"], FILTER_VALIDATE_EMAIL)) {
          $validacion["error"]["email"] = "El email no tiene el formato correcto.";
          $validacion["valor"]["email"] = "";
        }
        elseif (email_registrado()){
          $validacion["error"]["email"] = "Ya existe una cuenta con el email ingresado.";
          $validacion["valor"]["email"] = "";
      }
      }

    // Validar fecha de nacimiento.
    // Chequear si la fecha de nacimiento está vacia.
    if($_POST["fecha-nac"] == ""){
      $validacion["error"]["fecha-nac"] = "Este campo es obligatorio.";
    } else {
        $validacion["valor"]["fecha-nac"] = $_POST["fecha-nac"];
        if($validacion["valor"]["fecha-nac"] > date("Y-m-d")){
          $validacion["error"]["fecha-nac"] = "La fecha ingresada no es válida.";
          $validacion["valor"]["fecha-nac"] = "";
        }
      }

    // Validar género.
    // Chequear si el género está vacío.
    if (!isset($_POST["genero"])) {
      $validacion["error"]["genero"] = "Este campo es obligatorio.";
    } else {
        $validacion["valor"]["genero"] = $_POST["genero"];
      }

    // Validar foto de perfil.
    $validacion["valor"]["foto-perfil"] = false;
    if($_FILES["foto-perfil"]["error"] === UPLOAD_ERR_OK){
      $directorio_destino = "fotos-perfil/";
      $archivo_destino = $directorio_destino . basename($_FILES["foto-perfil"]["name"]);
      $error_foto = 0;
      $extension = strtolower(pathinfo($_FILES["foto-perfil"]["name"],PATHINFO_EXTENSION));
      // Chequear el tamaño del archivo.
      if ($_FILES["foto-perfil"]["size"] > 500000) {
        $validacion["error"]["foto-perfil"] = "El archivo es demasiado grande.";
          $error_foto = 1;
      }
      // Chequear que el archivo tenga una extensión permitida.
      if($extension != "jpg" && $extension != "png" && $extension != "jpeg"
      && $extension != "gif" ) {
        $validacion["error"]["foto-perfil"] = "Sólo se permiten archivos JPG, JPEG, PNG o GIF.";
          $error_foto = 1;
      }
      // Si no hubo errores, tratar de subir el archivo.
      if ($error_foto == 0) {
          $validacion["valor"]["foto-perfil"] = true;
      }
    }

    // Validar contraseña.
    // Chequear si la contraseña está vacía.
    if($_POST["clave"] == ""){
      $validacion["error"]["clave"] = "Este campo es obligatorio.";
    } else {
        $validacion["valor"]["clave"] = $_POST["clave"];
        // Chequear si la contraseña tiene el formato correcto.
        if (!preg_match("/^\S*(?=\S{8,})(?=\S*[\d])\S*$/",$validacion["valor"]["clave"])) {
          $validacion["error"]["clave"] = "La contraseña debe contener al menos 8 caracteres y un número.";
          $validacion["valor"]["clave"] = "";
        }
        }
    // Chequear si la confirmación de contraseña está vacía.
    if($_POST["conf-clave"] == ""){
      $validacion["error"]["conf-clave"] = "Confirmar la contraseña.";
    } else {
        $validacion["valor"]["conf-clave"] = $_POST["conf-clave"];
        // Chequear si las contraseñas coinciden.
        if($_POST["conf-clave"] != $_POST["clave"]){
          $validacion["error"]["conf-clave"] = "Las contraseñas no coinciden.";
          $validacion["valor"]["conf-clave"] = "";
        }
      }

    return $validacion;
  }
  ?>
