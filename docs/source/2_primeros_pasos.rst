Primeros pasos
==============

Correr el emulador
------------------

El emulador es un herramienta desarrollada en :code:`Java` y se hará uso de
:code:`Apache Ant` pare realizar la construcción de :code:`Cooja` y ejecutarlo.

Para ello debemos ir al directorio :code:`cd ~/contiki/tools/cooja` y ejecutar
el comando :code:`ant run`.

.. raw:: html

    <iframe width="100%" height="400" src="http://www.youtube.com/embed/H8IQm17dIBw?rel=0" frameborder="0" allowfullscreen></iframe>

Crear simulación
----------------

Para crear una nueva simulación debemos ir al menú :code:`File > New simulation...`

.. raw:: html

    <iframe width="100%" height="400" src="http://www.youtube.com/embed/_yy_O9wjaB0?rel=0" frameborder="0" allowfullscreen></iframe>

Agregar motas
-------------

Una vez creada la simulación podemos agregar motas a la misma. Para esto vamos
a al menú :code:`Motes > Add motes > Create new mote type` y elegimos el tipo
de mota **Z1**.

Lo siguiente que debemos hacer es seleccionar cual es el código que queremos
que se ejecute dentro de las nuevas motas. Para el ejemplo vamos a elegir el
código que se encuentra en el archivos
:code:`/home/iot/contiki/examples/hello-world/hello-world.c`. El mismo es un
script muy simple que lo único que hace imprimir en pantalla **Hello, world**.

Luego de seleccionarlo lo compilamos y creamos las motas. Además el simulador
nos va a pedir que ingresemos la cantidad de motas que queremos agregar de este
tipo.

.. raw:: html

    <iframe width="100%" height="400" src="http://www.youtube.com/embed/Hnk3AE0Xh4A?rel=0" frameborder="0" allowfullscreen></iframe>

Correr simulación
-----------------

Con las motas creadas ya podemos iniciar una simulación. Presionando el botón
**Start** que se encuentra en la ventana llamada **Simulation control**
empiezan a ejecutarse las motas.

.. raw:: html

    <iframe width="100%" height="400" src="http://www.youtube.com/embed/Lvy0jVotlcM?rel=0" frameborder="0" allowfullscreen></iframe>

En el video se puede ver la salida que muestran las motas en la ventana llamada
**Mote output**. En este lugar se puede ver como cada mota en ejecución realiza
la impresión de la palabra **Hello, world**.

Además se puede observar como las motas se comunican entre ellas armando una
red dependiendo de la proximidad. Se puede ver como en un principio la mota 2
estaba aislada del resto hasta que se la acerca a la red y comienza a
comunicarse.

Examinando el código
--------------------

A las motas que mostramos en el ejemplo le compilamos el siguiente código
escrito en el **Lenguaje de programació C**:

.. code-block:: c
  :emphasize-lines: 7-9

  /*-------------------------------------------------*/
  PROCESS(hello_world_process, "Hello world process");
  AUTOSTART_PROCESSES(&hello_world_process);
  /*-------------------------------------------------*/
  PROCESS_THREAD(hello_world_process, ev, data)
  {
    PROCESS_BEGIN();
    printf("Hello, world\n");
    PROCESS_END();
  }

Este es el código del proceso que se ejecuta en cada mota y en las líneas
resaltadas podemos ver el cuerpo del mismo. Se comienza con el proceso luego
se ejecuta la instrucción :code:`printf("Hello, world\n");` y se termina el
mismo.

Si queremos ejecutar otra cosa en su lugar, debemos reemplazar el
:code:`printf("Hello, world\n");` con lo el código que necesitemos, compilar
nuevamente las motas y volver a iniciar la simulación.
