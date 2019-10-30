<?php

// el echo esta para verificar que los archivos estan vinculados.
//echo "lalalalala";

  // Paso 9: Incluir archivos necesarios e ir chequeando que funcione bien.
  include_once "funciones-Paso6y7y8y10.php";

/* Paso 3 creo la funcion para validar
 si la informacion esta bien o necesito
 que me emita un error.*/

  function validar_registro($validacion){

    // Validar nombre.
    // Chequear si el nombre está vacío.
    /*Esta funcion nos dice que si se envia informacion por el metodo post,
      tomar la informacion de name="nombre" y si es = a vacio, entonces
      que tome de la variable $validacion que esta definida en el archivo
      registroPaso2 la posicion "error" y dentro de este arrar la posicion
      nombre y cambiar su informacion que esta "" vacia por "Este campo
      es obligatorio" y ...*/

/* El if ($_POST){ pregunta que si se envio informacion por post entre a las llaves y realice
    todos los if que estan dentro, sino estuviera este, me surgiria el erro antes que del formulario*/
    if ($_POST){

    if ($_POST["nombre"] == "") {
        $validacion["error"]["nombre"] = "Este campo es obligatorio.";
    }

   /* ...si no (else) esta vacio que reemplace en el array la
    posicion "nombre" que esta vacia de la variable $validacion por la informacion
    enviada por $_POST["nombre"]. y si pasa esto...*/

    else {
        $validacion["valor"]["nombre"] = $_POST["nombre"];

        // Chequear si el nombre sólo contiene letras y espacios.
    /*...como la informacion enviada no esta vacia, entonces hay que
      verificar que la informacion cumpla con los requisitos que decidimos
      con las expresiones regulares que en este caso si no tiene solo letras y
      espacios entonces reemplaza en la variable $validacion, en las posicion
      "error" y dentro de este arrray la posicion "nombre" "El nombre sólo
      puede contener letras y espacios." y a la vez en la posicion "valor" "nombre"
      reemplazarlo por vacio "", es decir borrar el contenido puesto en el rectangulo
      porque esta mal y asi el usuario lo vuelve a completar.*/

        if (!preg_match("/^[a-zA-Z ]*$/",$validacion["valor"]["nombre"])) {
          $validacion["error"]["nombre"] = "El nombre sólo puede contener letras y espacios.";
          $validacion["valor"]["nombre"] = "";
        }
      }
      //Validar apellido.
      //Chequear si el apellido esta vacio.
      if($_POST["apellido"]==""){
        $validacion["error"]["apellido"] = "Este campo es obligatorio.";
      }else{
        $validaion["valor"]["apellido"] = $_POST["apellido"];
        // Chequear si el apellido sólo contiene letras y espacios.
        if(!preg_match("/^[a-zA-Z ]*$/",$validacion["valor"]["apellido"])){
          $validacion["error"]["apellido"] = "El apellido solo puede contener letras y espacios.";
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
        if(!preg_match("/^(?=.{5,20}$)[a-zA-Z0-9]+$/",$validacion ["valor"]["username"])){
          $validacion["error"]["username"] = "El username debe contener entre 5 y 20 caracteres alfanuméricos.";
          $validacion["valor"]["username"] = "";
        }
      }

      // Validar email.
      // Chequear si el email está vacío.
      if ($_POST["email"] == "") {
        $validacion ["error"]["email"] = "Este campo es obligatorio.";
      } else {
        // Chequear si el email tiene el formato correcto.
        $validacion ["valor"]["email"] = $_POST["email"];
        if(!filter_var($validacion["valor"]["email"], FILTER_VALIDATE_EMAIL)){
          $validacion["error"] ["email"] = "El mail no tiene el formato correcto.";
          $validacion["valor"] ["email"] = "";
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

    // Preguntar por esto, que es lo que hace y como se hace.
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
    // Chequear si la contraseña completada en el formulario está vacía.
    if($_POST["clave"] == ""){
    // Si esta vacia que conplete la variable $validacion en posicion error
    // dentro de ese la posicion clave y completarlo con el texto indicado
      $validacion["error"]["clave"] = "Este campo es obligatorio.";
    }
    // sino estas vacio comparar la variable $validacion en la posicion
    // valor y de ahi la posicion clave sea igual a lo enviado por post, si es es true
    else {
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

    }
    return $validacion;

  }

?>
