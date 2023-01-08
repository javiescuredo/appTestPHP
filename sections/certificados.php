<?php

    require('../libraries/fpdf185/fpdf.php');

    include_once '../configs/ddbb.php';
    $conexionBD=BD::crearInstanciaBD();

    function agregarTexto($pdf, $text, $x, $y
            ,$fuente='Arial', $size=10, $align='L',$color='#FF0000'){
        $r = hexdec(substr($color, 1, 2));
        $g = hexdec(substr($color, 3, 2));
        $b = hexdec(substr($color, 5, 2));

        $pdf->SetFont($fuente,'B',$size);
        $pdf->SetTextColor($r,$g,$b);    
        $pdf->SetXY($x, $y); 
        //$pdf->Cell(0, 10, $text, 0, 0, $align);
        $pdf->Cell(40, 10, $text);
    }
    function agregarImagen($pdf, $imagen, $x, $y){
        $pdf->Image($imagen, $x, $y, 0);    
    }

    $idcurso=isset($_GET['idcurso'])?$_GET['idcurso']:'';
    $idalumno=isset($_GET['idalumno'])?$_GET['idalumno']:'';

    $sql = "SELECT alumnos.nombre, alumnos.apellidos, cursos.nombre_curso 
            FROM alumnos, cursos WHERE alumnos.id=:idalumno AND cursos.id=:idcurso";
    $consulta=$conexionBD->prepare($sql);
    $consulta->bindParam(':idalumno', $idalumno);
    $consulta->bindParam(':idcurso', $idcurso);
    $consulta->execute();
    $alumnoCurso=$consulta->fetch(PDO::FETCH_ASSOC);

    // print_r($alumnoCurso);

    $pdf = new FPDF("L","mm", array(254,180));
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);

    agregarImagen($pdf, "../assets/docs/certificado.jpg", 2, 2);
    $alumnoNombreCompleto = "{$alumnoCurso['nombre']} {$alumnoCurso['apellidos']}";
    agregarTexto($pdf, $alumnoNombreCompleto, 60, 80, 'Helvetica',34, 'L', '#005f73');
    agregarTexto($pdf, $alumnoCurso['nombre_curso'], 60, 135, 'Helvetica',20, 'L', '#005f73');
    agregarTexto($pdf, date('d/m/Y'), 25, 148, 'Helvetica',10, 'L', '#005f73');

    $pdf->Output();    

?>