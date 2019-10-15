<?php
/* asi como esta el formulario, la informacion se
  envia, chequearlo con el var_dump*/
var_dump($_POST);
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
        <div class="row offset-4 ">

          <!--creamos el formulario que se va a enviar por post, lo que esta en el atributo action indica que
           permanecera en la pagina una vez enviado el formulario y enctype multipart... indica que soporta adjuntar archivos -->
          <form class="row col-3 " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">

<!--insertamos cada uno de los campos del formuario-->

            <!-- Nombre -->
            <!--Ponemos un div que contenga el dato del fomulario y donde se debe completar-->
            <div class="">
              <!-- se crea la etiqueta label para el texto que muestra el formulario-->
              <label for="nombre">Nombre</label>

              <!-- se crea la etiqueta input para completar el dato necesario-->
              <input type="text" name="nombre" value="">
            </div>

            <!-- Apellido -->
            <div class="">
              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" value="">
            </div>

<!-- para hacer el var_dump tiene que estar entre etiquetas php <?php// var_dump($_POST)?> como figura aca -->
            <!-- Username -->
            <div class="">
              <label for="">Nombre de Usuario</label>
              <input type="text" name="usuario" value="">
            </div>

            <!-- Email -->
            <div class="">
              <label for="email">Email</label>
              <input type="text" name="email" value="">
            </div>

            <!-- Fecha de nacimiento -->
            <div class="">
              <label for="">Fecha de Nacimiento</label>
              <input type="date" name="fecha-nac" value="">
            </div>

            <!-- Género -->
            <div class="">
              <label for="genero">Género</label>
            </div>
            <div class="">
              <input type="radio" name="genero" value="hombre">Hombre
              <input type="radio" name="genero" value="mujer">Mujer
              <input type="radio" name="genero" value="Planta">Planta
            </div>

            <!-- Contraseña -->
            <div class="">
              <label for="contrasenia">Contraseña</label>
              <input type="password" name="contrasenia" value="">

            <!-- Confirmar contraseña -->
            <div class="">
              <label for="conf-contrasenia">Confirmar Contraseña</label>
              <input type="password" name="conf-contrasenia" value="">

              <!-- Recordar usuario -->
              <div class="">
                <input type="checkbox" name="recordarme" value="">
                <label for="recordarme">Recordarme</label>
              </div>

              <!-- Enviar formulario -->
              <div class="">
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
