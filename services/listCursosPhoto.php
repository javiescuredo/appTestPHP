<?php
    include_once '../configs/ddbb.php';

    $conexionBD=BD::crearInstanciaBD();
    //print_r($_GET['accion']);

    // $accion=isset($_POST['accion'])?$_POST['accion']:'';
    $accion=isset($_GET['accion'])?$_GET['accion']:'';
    if ($accion!=''){
        switch($accion){
            case 'listado':
                // Listado de alumnos
                $sql = "SELECT * FROM cursos";
                $listaCursos=$conexionBD->query($sql);
                $cursos=$listaCursos->fetchAll();

                foreach($cursos as $curso){

                    echo  '<div class="card col-4 p-1">
                                <img src="data:image/jpeg;base64,'.base64_encode($curso['foto']).'" class="card-img-top" alt="...">
                                <div class="card-body">
                                <p class="card-text">'. $curso['nombre_curso']. '</p>
                                </div>
                            </div>';

                    // echo '<img src="data:image/jpeg;base64,'.base64_encode( $curso['foto'] ).'" width="300" height="200" />';
                }
                break;
            }
        }
?>
