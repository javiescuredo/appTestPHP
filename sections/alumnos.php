<?php
//INSERT INTO `alumnos` (`id`, `nombre`, `apellidos`) VALUES ('1', 'Javi', 'Escuredo');
include_once '../configs/ddbb.php';

$conexionBD=BD::crearInstanciaBD();

// print_r($_POST);

// Curso seleccionado
$id=isset($_POST['id'])?$_POST['id']:'';
$nombre=isset($_POST['nombre'])?$_POST['nombre']:'';
$apellidos=isset($_POST['apellidos'])?$_POST['apellidos']:'';
$cursos=isset($_POST['cursos'])?$_POST['cursos']:'';

$accion=isset($_POST['accion'])?$_POST['accion']:'';

if ($accion!=''){
    switch($accion){
        case 'agregar':
            $sql = "INSERT INTO alumnos (id, nombre, apellidos) VALUES (NULL, :nombre, :apellidos)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->execute();
            $id=$conexionBD->lastInsertId();


            foreach($cursos as $curso){
                $sql = "INSERT INTO alumnos_cursos (id, fkalumno, fkcurso) VALUES (NULL, :fkalumno, :fkcurso)";
                $consulta=$conexionBD->prepare($sql);
                $consulta->bindParam(':fkalumno', $id);
                $consulta->bindParam(':fkcurso', $curso);
                $consulta->execute();
            }
            break;
        case 'editar':
            $sql="UPDATE alumnos SET nombre=:nombre, apellidos=:apellidos  WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->execute();
            break;
        case 'borrar':
            $sql = "DELETE FROM alumnos WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $id = '';
            $nombre='';
            $apellidos='';
            break;
        case 'Seleccionar':
            // $sql = "SELECT * FROM alumnos WHERE id=$id";
            $sql = "SELECT * FROM alumnos WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $alumno=$consulta->fetch(PDO::FETCH_ASSOC);

            $nombre=$alumno['nombre'];
            $apellidos=$alumno['apellidos'];

            $sql = "SELECT cursos.id FROM alumnos_cursos 
                        INNER JOIN cursos ON cursos.id = alumnos_cursos.fkcurso 
                    WHERE alumnos_cursos.fkalumno=:fkalumno";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':fkalumno', $id);
            $consulta->execute();
            $cursosAlumno=$consulta->fetchAll(PDO::FETCH_ASSOC);

            foreach($cursosAlumno as $curso){
                $arregloCursos[]=$curso['id'];
            }
            break;
    }
}

// Listado de alumnos
$sql = "SELECT * FROM alumnos";
$listaAlumnos=$conexionBD->query($sql);
$alumnos=$listaAlumnos->fetchAll();

foreach($alumnos as $clave => $alumno){
    $sql = "SELECT * FROM cursos WHERE id IN (SELECT fkcurso FROM alumnos_cursos WHERE fkalumno=:fkalumno)";
    $consulta=$conexionBD->prepare($sql);
    $consulta->bindParam(':fkalumno', $alumno['id']);
    $consulta->execute();
    $cursosAlumno=$consulta->fetchAll();
    $alumnos[$clave]['cursos']=$cursosAlumno;
}


$sql = "SELECT * FROM cursos";
$listaCursos=$conexionBD->query($sql);
$cursos=$listaCursos->fetchAll();

?>