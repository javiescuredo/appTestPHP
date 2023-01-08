<?php include('../templates/header.php'); ?>
<script src="../js/ajax_service.js"></script>

<br />
<div class="p-5 mb-4 bg-light rounded-3">
  <div class="container-fluid py-5">
    <h1 class="display-5 fw-bold">Bienvenid@ a la aplicación de Certificados</h1>
    <p class="col-md-8 fs-4">Aquí dispone de todas las funcionalidades para crear cursos, dar de alta alumnos y generar los documentos de certificación de que se completaron las horas lectivas.</p>

    <a name="" id="" class="btn btn-primary" href="alumnos_view.php" role="button">Iniciar la aplicación</a>
  </div>

  <h4 class="display-6 fw-bold">Cursos actuales</h4>
  <div class="container text-center row" id="listCursos">

    <div class="d-flex justify-content-center" style="height: 400px;">
      <div class="spinner-border text-secondary m-5" style="width: 5rem; height: 5rem;" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <?php
    echo "<script>";
    echo "getListCursosFotos();";
    echo "</script>";
    ?>
  </div>

</div>


<?php include('../templates/footer.php'); ?>