<?php include('../templates/header.php'); ?>
<?php include('../sections/alumnos.php'); ?>

<br/>

<div class="row">

    <div class="col-5">
        <form action="" method="post">
            <div class="card">
                <div class="card-header">
                    Alumnnos
                </div>

                <div class="card-body">
                    <div class="mb-3 d-none">
                        <label for="" class="form-label">ID</label>
                        <input type="text" class="form-control" name="id" id="id" value="<?php echo $id ?>" aria-describedby="helpId" placeholder="" >
                        <small id="helpId" class="form-text text-muted">Identificador</small>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre ?>" aria-describedby="helpName" placeholder="">
                        <small id="helpName" class="form-text text-muted">Nombre del alumno</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>" aria-describedby="helpName" placeholder="">
                        <small id="helpName" class="form-text text-muted">Apellidos del alumno</small>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Cursos del alumno</label>

                        <?php foreach ($cursos as $curso) { ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                <?php echo $curso['id'] ?>- <?php echo $curso['nombre_curso'] ?>
                                </label>
                            </div>
                        <?php } ?>


                    </div>

                    <div class="btn-group" role="group" aria-label="Button group name">
                        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                        <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
                        <button type="submit" name="accion" value="borrar" class="btn btn-danger">Borrar</button>
                    </div>
                </div>

            </div>

        </form>

    </div>

    <div class="col-7">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cursos</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumnos as $alumno) { ?>
                        <tr>
                            <td> <?php echo $alumno['id']; ?> </td>
                            <td> <?php echo $alumno['nombre']; ?> <?php echo $alumno['apellidos']; ?></td>
                            <td>
                                <?php foreach ($alumno['cursos'] as $curso) { ?>
                                    - <a href="certificados.php?idcurso=<?php echo $curso['id']; ?>&idalumno=<?php echo $alumno['id']; ?>" target="_blank"> 
                                     <i class="bi bi-file-earmark-pdf text-danger "></i> <?php echo $curso['nombre_curso']; ?> 
                                    </a><br />
                                <?php } ?>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $alumno['id']; ?>">
                                    <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include('../templates/footer.php'); ?>