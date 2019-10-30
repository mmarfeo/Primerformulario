Dudas al Fecha 23-10-2019.

1) ¿Podrias chequear un poco el archivo y decirme lo que cambiarias o en el mismo archivo que
    hagas el cambio pero identificarmelo con algo?

2) Dentro del archivo funciones-Paso6y7y8y10.php:
   En la linea 54 y 62, no entiento para que necesito que me retorne verdadero o falso respectivamente.

Respuesta:
   Esta funcion revisa si el usuario ta esta registrado y si es asi nos devuelve verdadero sino
   nos devuelve false, y ese return es asi de necesario porque....

3) En el archivo alta-usuarios-Paso11.php:
   No entiendo donde esta creada la variable $datos.

Respuesta:
   Es una variable, que la condcion obligatoria que va a tener la funcion una vez que es llamada es obligatorio darle valor a la funcion, en este caso por ejemplo seria
   en la fila 49 en el archivo registro.php alta_usuario($validacion["valor"]);

4) No me guarda la informacion en json.

Respuesta:
    no los guarda porque no esta creada la funcion de la duda 3 ($datos), esta variable es creada solo para
    ser usada en esa funcion y cuando la funcion es llamada tiene que coplementarse con esa variable y que tiene de
    nombre $datos pero que puede ser cualquier informacion, lo importante es que si o si la funcion tiene que tener ese paremetro completos para que la funcion realice su tarea.

Dudas al Fecha 30-10-2019.

5) como se lee la funcion  alta_usuario($datos){ que esta en el archivo alta-usuario-Paso11.php?

   
