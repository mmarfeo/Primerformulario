<?php
/*Paso 6: En este paso se crearan las formulas
comunes a toda la pagina.
  Se va a comenzar con la primer formula
  necesaria que va almacenar a los usuraios
  registrados correctamente.*/

  // (1) Se crea la funcion
  // (2) Se crea la variable
  /* Informacion obtenida de: https://www.geeksforgeeks.org/how-to-receive-json-post-with-php/
  Cómo recibir JSON POST con PHP
  Veamos primero las tres características siguientes:
  a) php: // input : esta es una secuencia de solo lectura que nos permite leer datos sin procesar del cuerpo de la solicitud. Devuelve todos los datos sin formato después de los encabezados HTTP de la solicitud, independientemente del tipo de contenido.
  b) (3) Función file_get_contents () : esta función en PHP se usa para leer un archivo en una cadena, si falla devolvera false.
  c) (5) Función json_decode () : esta función toma una cadena JSON y la convierte en una variable PHP que puede ser una matriz o un objeto.

  Se sabe que todos los datos de publicación se pueden recibir en un script PHP utilizando la variable global $ _POST [] . Pero esto falla en el caso cuando queremos recibir una cadena JSON como datos de publicación. Para recibir una cadena JSON podemos usar la "entrada php: //" junto con la función file_get_contents () que nos ayuda a recibir datos JSON como un archivo y los lee en una cadena.

  Más tarde, podemos usar la función json_decode () para decodificar la cadena JSON.
  */
  // (1)
  function traer_usuarios(){
  //(2) Se crea la variable que va a almacenar lo que lee la funcion =
              //=(3) funcion que lee la informacion que esta en el archivo json creado previamente.
  $usuarios_jason= file_get_contents("json/usuarios-Paso5.json");
  //(4) Se crea una variable que va a almacenar la codificacion del archivo anterior
                //=(5) funcion convierte un string codificado en JSON a una variable de PHP,
                //    tomando la variable previamente creada en el paso anterior. Cuando es TRUE,
                //    los object devueltos serán convertidos a array asociativos.
  $usuarios_array = json_decode($usuarios_json,true);
  // para poder usar la variable fuera de la funcion hago un return.
  return $usuarios_array;
}

// Paso 7: se crea la funcion para guardar los usuarios con la variable creada en el paso anterior que fue codificada a un array,
// es decir que esta funcion toma los datos en forma de array.

function guardar_usuarios($usuarios_array){
    // Esta variable va a tener como valor, el resultado de la funcion json_encode.
                  //= Esta funcion codifica a json la informacion que le asignemos,
                  // en este caso una vairable que es array codificado previamente (Paso 6).
    $usuarios_json = json_encode($usuarios_array);
    /* Esta funcion file_put_contents ( string $filename , mixed $data [, i84nt $flags = 0 [, resource $context ]] ) : int, escribe datos en un archivo donde: <FILANAME: es la ruta del archivo donde se escribe la informaicon, si no existe, se crea el fichero. De otro modo, el fichero existente se sobrescribe, a menos que la bandera FILE_APPEND esté establecida>; < DATA: La información a escribir. Puede ser tanto un recurso string, como array o stream.>; < FLAGS: El valor de flags puede ser   cualquier combinación de las siguientes banderas, unidas con el operador binario OR (|).>; < CONTEXT:Un recurso de contexto válido creado con stream_context_create().>.*/

    // En este caso solo tenemos la ruta (FILENAME) "json/usuariosPaso5.json" y los datos a escribir que estan guardados en una variable ($DATA) $usuarios_json
    file_put_contents("json/usuarios-Paso5.json",$usuarios_json);
}
//Paso 8: crearemos la funcion en la cual compare la informacion enviada en el formulario con la informacion de la "base de datos" de jason, y verificar si un usuario ya fue reistrado.

function usuario_registrado(){
   // se crea la variable $usuarios que va a tener la informacion de la funcion ya creada en el paso 6.
    $usuarios = traer_usuarios();
  // como ahora $usuarios es un array como consecuencia de la funcion traer_usuarios() que a la vez contiene la funcion file_get_contents() que puede ser falsa.
  // entonces decimos que si $usuarios no es null, recorra el array con el foreach y si lo enviado por $_POST["username"] en el formulario, es igual a lo que tiene la variable $usuario en la posicion "username", retorne verdadero, que significa que el usuario ya existe.
    if($usuarios != null){
        foreach($usuarios as $usuario){
            if($usuario["username"] == $_POST["username"]){
                return true;
            }
        }
    }
    // Si $usuarios es igual a null como consecuencia de la funcion file_get_contents() que puede ser false, no entra al if y directamente me retorne false, que significa que el usuario no existe.
    return false;
}
// Paso 10: lo mismo que en el paso anterior
function email_registrado(){
    $usuarios = traer_usuarios();
    if($usuarios != null){
        foreach($usuarios as $usuario){
            if($usuario["email"] == $_POST["email"]){
                return true;
            }
        }
    }
    return false;
}
/*
// previo a esta funcion necesito dar de alta el usuario para poder hashear(o como se escriba) la contraseña.
//Paso 1267: lo mismo que en los 2 pasos anteriores,
// pero con la diferencia que aca retorna password_verify
function clave_correcta(){
    $usuarios = traer_usuarios();
    if($usuarios != null){
        foreach($usuarios as $usuario){
            if($usuario["username"] == $_POST["username"]){
                return password_verify($_POST["clave"], $usuario["clave"]);
            }
        }
    }
    return false;
}
*/
?>
