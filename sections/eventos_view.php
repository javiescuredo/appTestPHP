<?php include('../templates/header.php'); ?>
<script src="../js/ajax_service.js" ></script>

<br/>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-2">
      <h1 class="display-5 fw-bold">Eventos de los alumnos</h1>
      <p class="col-md-8 fs-4">Galería gráfica de las actividades fuera del temario de los alumnos.</p>

    </div>

    <div class="container text-center row" id="listEventos">

        <div class="d-flex justify-content-center" style="height: 400px;">
            <div class="spinner-border text-secondary m-5" style="width: 5rem; height: 5rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
     
        <?php
          echo "<script>";
          echo "getListEventosFotos();";
          echo "</script>";
          ?>
    </div>

  </div>


<?php include('../templates/footer.php'); ?>