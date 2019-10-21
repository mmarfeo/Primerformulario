<?php
var_dump($_POST);

    //Incluir archivo para que realice lo necesario
    include_once "validar-registro.php";

/* Paso 2: creo la variable que va a recibir
  infomacion de lo enviado por $_POST */

$validacion=[
    "valor"=> [
      "nombre"=>"",
      "apellido"=>"",
      "username"=>"",
      "email"=>"",
      "fecha-nac"=>"",
      "genero"=>"",
      "contrasenia"=>"",
      "conf-contrasenia"=>"",
    ],
    "error"=> [
      "nombre"=>"",
      "apellido"=>"",
      "username"=>"",
      "email"=>"",
      "fecha-nac"=>"",
      "genero"=>"",
      "contrasenia"=>"",
      "conf-contrasenia"=>"",
    ]
];

/*Paso 4: Hay que llamar la funcion validar_registro
  que fue creado en el paso anterior pero no se esta ejecutando*/

  $validacion=validar_registro($validacion);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Este funcionalidad, hace que se acepten ñ y otros caracteres-->
    <meta charset="utf-8">

    <!--Este link hace que...-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- este link de bootstrap lo hace responsive-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- el link de css tiene que ir despues de el de bootstrap para que no te tape el css que por defecto trae bootstrap-->
    <link rel="stylesheet" href="juego.css">

    <title>AHHHHHH</title>
  </head>
  <body>
    <!-- creamos un contendor para no tocar el body y tambien es de bootstrap-->
    <div class="container-fluid"> <!--hace que se ocupe el 100% del ancho y no queden blancos en los costado-->

      <!--Contenido principal de la pagina-->
      <main class="row">

        <!-- creamos un div que va a contener todo el formulario-->
        <div class=" col-12">

          <!--creamos el formulario que se va a enviar por post, lo que esta en el atributo action indica que
           permanecera en la pagina una vez enviado el formulario y enctype multipart... indica que soporta adjuntar archivos -->
          <form class="row col-12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post">

<!--insertamos cada uno de los campos del formuario-->

            <!-- Nombre -->
            <!--Ponemos un div que contenga el dato del fomulario y donde se debe completar-->
            <div class="col-4 offset-4">
              <!-- se crea la etiqueta label para el texto que muestra el formulario-->
              <label for="nombre">Nombre</label>

              <!-- se crea la etiqueta input para completar el dato necesario  +++<?php //echo $validar["valor"]["nombre"];?>+++ -->
              <input type="text" name="nombre" value="">
            </div>
            <div class="">
                <span><?php echo $validacion["error"]["nombre"];?></span>
            </div>

            <!-- Apellido -->
            <div class="col-4 offset-4">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" value="">
            </div>
            <div class="">
              <span><?php echo $validacion ["error"]["nombre"];?></span>
            </div>

<!-- para hacer el var_dump tiene que estar entre etiquetas php <?php// var_dump($_POST)?> como figura aca -->

            <!-- Username -->
            <div class="col-5 offset-4">
              <label for="">Username</label>
              <input type="text" name="usuario" value="">
            </div>
            <div class="">
              <span><?echo $validacion["error"]["usuario"];?></span>
            </div>

            <!-- Email -->
            <div class="col-4 offset-4">
              <label for="email">Email</label>
              <input type="text" name="email" value="">
            </div>
            <div class="">
              <span><? echo $validacion ["error"]["email"];?></span>
            </div>

            <!-- Fecha de nacimiento -->
            <div class="col-6 offset-4">
              <label for="">Fecha de Nacimiento</label>
              <input type="date" name="fecha-nac" value="">
            </div>
            <div class="">
              <span><? echo $validacion["error"]["fecha-nac"];?></span>
            </div>

            <!-- Género -->
            <div class="col-1 offset-4">
              <label for="genero">Género</label>
            </div>
            <div class="col-7">
              <input type="radio" name="genero" value="hombre">Hombre
              <input type="radio" name="genero" value="mujer">Mujer
              <input type="radio" name="genero" value="Planta">Planta
            </div>
            <div class="">
              <span><? echo $validacion["error"]["genero"];?></span>
            </div>

            <!-- Contraseña -->
            <div class="col-6 offset-4">
              <label for="contrasenia">Contraseña</label>
              <input type="password" name="contrasenia" value="">
            </div>
            <div class="">
              <span><? echo $validacion ["error"]["contrasenia"];?></span>
            </div>

            <!-- Confirmar contraseña -->
            <div class="col-6 offset-4">
              <label for="conf-contrasenia">Confirmar Contraseña</label>
              <input type="password" name="conf-contrasenia" value="">
            </div>
            <div class="">
              <span><? echo $validacion["error"]["conf-contrasenia"];?></span>
            </div>

              <!-- Recordar usuario -->
              <div class="col-4 offset-6">
                <input type="checkbox" name="recordarme" value="">
                <label for="recordarme">Recordarme</label>
              </div>

              <!-- Enviar formulario -->
              <div class="col-4 offset-6">
                <input type="submit" value="Crear cuenta" class="boton">
              </div>

            </div>
            </div>
          </form>
        </div>
      </main>
    </div>
  </body>
</html>
