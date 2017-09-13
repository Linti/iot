Ejemplo completo
================

Ahora vamos a ver un ejemplo completo en el cual mostraremos varios puntos:

- Configurar un ruter de borde que permita sacar la información por fuera de la
  red.
- Cargar y ejecutar en las **motas z1** una API **COAP** para poder obtener
  información de las mismas.

- Recolectar información de la mota por medio de la API **COAP**.
- Almacenar la información en una base de datos de series de tiempo.
- Mostrar la información recolectada en tiempo real por medio de gráficos.

Compilar mota con API
---------------------

Para realizar esto tenemos que abrir el simulador **Cooja**, comenzar una
simulación, y agregar una **mota z1** a la simulación compilando el código que
se encuentra en:

:code:`contiki/examples/er-rest-example/er-example-server.c`

.. raw:: html

    <iframe width="100%" height="400" frameborder="0"
      src="https://www.youtube.com/embed/aYCGtUHdzgY" allowfullscreen>
    </iframe>

Configurar mota como Router de borde
------------------------------------

Para poder sacar el tráfico fuera de la red es necesario contar con una mota
compilada con un código específica para esta tarea.

Es por eso que se debe compilar dentro del una mota el código necesario para
que la misma funciona como router de borde.

El código lo encontramos en:

:code:`contiki/examples/ipv6/rpl-border-router/border-router.c`

.. raw:: html

    <iframe width="100%" height="400" frameborder="0"
      src="https://www.youtube.com/embed/LlqQrsWiekk" allowfullscreen>
    </iframe>

Recoleccion, almacenamiento y visualización de datos de las motas
------------------------------------------------------------------

Para obtener la información de las motas vamos a utilizar una librería php
que hace de cliente **COAP** para consultar las APIs que exponen las motas.

La librería que usaremos es: github_de_la_librería

Ademas de un cliente para obtener los datos, es necesario contar con un cliente
para **InfluxDB** que es nuestra base de datos. Con el mismo podremos enviar la 
información a la base luego de haberla recolectado.

Una vez recolectada la información es necesario que podamos visualizarla. Para
esto es que vamos a utilizar la herramienta llamada **Grafana**. La misma nos
permite realizar fácilmente consultas sobre **InfluxDB** y realizar gráficos
para visualizar los datos que las motas emiten en tiempo real.

Para la instalacion de tanto de **Grafana** como de **InfluxDB** vamos a
utilizar un **Docker Compose** provisto por la cátedra que realiza la ejecución
de las dos herramientas.

Para esto tenemos que dirigirnos al directorio :code:`~/iot` y ejecutar el script
:code:`run.sh` como root.

:code:`cd ~/iot && sudo ./run.sh`

.. raw:: html

    <iframe width="100%" height="400" frameborder="0"
      src="https://www.youtube.com/embed/TD4SuksjpYA" allowfullscreen>
    </iframe>
