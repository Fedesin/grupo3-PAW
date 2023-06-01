<!DOCTYPE html>
<html lang="es">

  <head>
    <?php
      require 'parts/head.view.php';
    ?>
    <script>
    var data = <?php echo json_encode($data); ?>;
  </script>
  <script src="assets/js/components/filtro.js"></script>
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
    <main class="grilla"><h2>Especialidades y profesionales</h2>
     
      <form method="GET">
        <label for="listaEspecialidades">Escoja una especialidad</label>
        <input name="especialidad" list="listaEspecialidades">
        <datalist id="listaEspecialidades">
          <option value="" selected hidden disabled>Seleccione</option>
          <option value="Psiquiatria">Psiquiatría</option>
          <option value="Ortopedia">Ortopedía</option>
          <option value="Neurologia">Neurología</option>
          <option value="Cardiologia">Cardiología</option>
        </datalist>

        <label for="listaProfesionales">Escoja un/a profesional</label>
        <input name="profesional" list="listaProfesionales">
        <datalist id="listaProfesionales">
          <option value="" selected hidden disabled>Seleccione</option>
          <?php foreach ($profesionales as $profesional): ?>
              <option value="<?php echo $profesional->field["nombre"]; ?>"><?php echo $profesional->field["nombre"]; ?></option>
          <?php endforeach; ?>
        </datalist>

        <input type="submit" value="Continuar" />
      </form>
      
      <hr />
      <div class="paginar">
          <label> Personas por pagina</label>
          <input id="cantPaginas" type="number" value="6" />
          <button id="pagAnt" > < </button>
          <label> Pag.</label>
          <input id="paginaIndice" type="number" value="1" min="0"/>
          <button id="pagSig"  > > </button>
      </div>
      <ul id="listaPersonas">
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