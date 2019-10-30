<?php
  //Paso 11: se crea el archivo alta-usuario.

  //Paso 12: se incluyen los archivos necesarios para crear la funcion.
    include_once "php/funciones-Paso6y7y8y10.php";

  //Paso 13: Se crea la funcion para dar de alta al usuario.
  // Hasta aca se llego el dia 23-10-2019.
    function alta_usuario($datos){

        $alta_usuario = false;

        // Chequear si están completos todos los campos obligatorios
        // que hace esta funcion
        if($datos["nombre"] && $datos["apellido"] && $datos["username"] && $datos["email"] && $datos["fecha-nac"] && $datos["genero"] && $datos["clave"]){
            $alta_usuario = true;
            $usuarios = traer_usuarios();
            $id = strval(count($usuarios));

            // Si no hubo errores, tratar de subir el archivo (si hay archivo).
            if ($datos["foto-perfil"]) {
                $directorio_destino = "fotos-perfil/";
                $extension = strtolower(pathinfo($_FILES["foto-perfil"]["name"],PATHINFO_EXTENSION));
                $archivo_destino = $directorio_destino.$id.".".$extension;
                if (!move_uploaded_file($_FILES["foto-perfil"]["tmp_name"], $archivo_destino)) {
                    $alta_usuario = false;
                    return "Hubo un error al subir el archivo.";
                }
            }
            else {
                $archivo_destino = "";
            }
        }

// Guardar el usuario si los datos ingresados son correctos.
    if($alta_usuario){
        $usuario_nuevo = [
            "id" => $id,
            "nombre" => $datos["nombre"],
            "apellido" => $datos["apellido"],
            "username" => $datos["username"],
            "email" => $datos["email"],
            "fecha-nac" => $datos["fecha-nac"],
            "genero" => $datos["genero"],
            "foto-perfil" => $archivo_destino,
            "clave" => password_hash($datos["clave"], PASSWORD_DEFAULT)
        ];

        $usuarios[] = $usuario_nuevo;
        guardar_usuarios($usuarios);

        // Siempre recordar al usuario hasta que se cierre el navegador, excepto que cierre sesión.
        //$_SESSION["username"] = $_POST["username"];

        // Redirigir a home.
        header("Location:index.php");
    }

        return "";

    }
?>
