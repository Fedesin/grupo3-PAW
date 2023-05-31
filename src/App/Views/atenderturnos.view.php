<!DOCTYPE html>
<html lang="es">

  <head>
    <?php
      require 'parts/head.view.php';
    ?>

    <script type="text/javascript">
      function actualizarTurnos() {
        fetch("/atender-turnos?type=json")
          .then((response) => {
            response.json().then(data => {
              let contenedor = document.querySelector("main > ul");
              contenedor.replaceChildren();
              
              for (let key in data.lista_turnos) {
                let turno = data.lista_turnos[key];
                let fila = PAW.nuevoElemento("li", "");
                let ul = PAW.nuevoElemento("ul", "");

                ul.appendChild(PAW.nuevoElemento("li", turno.horario));
                ul.appendChild(PAW.nuevoElemento("li", turno.nombre + " " + turno.apellido));

                fila.appendChild(ul);

                contenedor.appendChild(fila);
              }

              let primera_fila = document.querySelector("main > ul > li:first-child > ul");

              if(primera_fila != null) {
                let li = PAW.nuevoElemento("li", "");
                let button = PAW.nuevoElemento("button", "Finalizar Turno", {"class":"finalizar"});

                button.addEventListener("click", (e) => {
                  fetch("/finalizar-turno?id=" + data.lista_turnos[0].id)
                    .then((response) => {
                      console.log(response);
                      actualizarTurnos();
                    })
                    .catch((err) => {
                      console.log(err);
                    });
                });

                li.appendChild(button)
                primera_fila.appendChild(li);
              }
            });
          })
          .catch((err) => {
            console.log(err);
          });
      }

      document.addEventListener("DOMContentLoaded", () => {
        actualizarTurnos();
      });
    </script>
  </head>

  <body>
    <!--header-->
    <?php
      require 'parts/header.view.php';
    ?>
    <!--header-->
    <!--navbar-->
    <?php
      require 'parts/nav.view.php';
    ?>
    <!--navbar-->
    <!--body-->
    <main class="atender-turnos">
      <h2>Atender Turnos</h2>
      
      <ul>
        <li>
          <ul>
            <li>08:00</li><li>Juan Perez</li><li><button class="finalizar">Finalizar Turno</button></li>
          </ul>
        </li>
        <li>
          <ul>
            <li>09:00</li><li>Juan Pistola</li>
          </ul>
        </li>
        <li>
          <ul>
            <li>09:30</li><li>Esteban quito</li>
          </ul>
        </li>
        <li>
          <ul>
            <li>09:30</li><li>Esteban quito</li>
          </ul>
        </li>
        <li>
          <ul>
            <li>09:30</li><li>Esteban quito</li>
          </ul>
        </li>
        <li>
          <ul>
            <li>09:30</li><li>Esteban quito</li>
          </ul>
        </li>
        <li>
          <ul>
            <li>09:30</li><li>Esteban quito</li>
          </ul>
        </li>
        <li>
          <ul>
            <li>09:30</li><li>Esteban quito</li>
          </ul>
        </li>
        <li>
          <ul>
            <li>09:30</li><li>Esteban quito</li>
          </ul>
        </li>

      </ul>
    </main>
    <!--body-->
    <!--footer-->
    <?php
      require 'parts/footer.view.php';
    ?>
    <!--footer-->
  </body>
</html>