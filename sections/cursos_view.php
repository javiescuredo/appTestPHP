<?php include('../templates/header.php'); ?>
<?php include('../sections/cursos.php'); ?>

    <br/>
    <div class="row">
        
        <div class="col-5">
            <form action="" method="post">
                <div class="card">
                    <div class="card-header">
                        Cursos
                    </div>
                    <div class="card-body">
                        <div class="mb-3 d-none">
                            <label for="" class="form-label">ID</label>
                            <input type="text" class="form-control" 
                                name="id" id="id" value="<?php echo $id ?>"
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Identificador</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Curso</label>
                            <input type="text" class="form-control" 
                                name="nombre_curso" id="nombre_curso" value="<?php echo $nombre_curso ?>"
                                aria-describedby="helpName" placeholder="">
                            <small id="helpName" class="form-text text-muted">Nombre del curso</small>
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
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listaCursos as $curso){ ?>
                            <tr>
                                <td> <?php echo $curso['id']; ?> </td>
                                <td> <?php echo $curso['nombre_curso']; ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" id="id" 
                                            value="<?php echo $curso['id']; ?>">
                                        <input type="submit" value="Seleccionar"
                                            name="accion" class="btn btn-info">
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