<?php
require 'conexion.php';
    

require('fpdf.php');

class PDF extends FPDF
{

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Times', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->SetX(-45);
        $this->SetFont("Arial", "", 8);
        date_default_timezone_set('America/El_Salvador');
        $date = date('d/m/Y', time());
        $hora = date('h:i:s a', time());
        $this->Cell(0, 10, "fecha impresion: " . $date, 0, 0, "C");
        $this->Ln(5);
        $this->SetX(-45);
        $this->Cell(0, 10, "hora impresion: " . $hora, 0, 0, "C");
    }


    function viewTable()
    {

        $con=mysqli_connect('localhost','root','','finanzas');
        $extraer = "SELECT * FROM activo";

        $base = mysqli_select_db($con, 'finanzas');
        $ejecutar = mysqli_query($con, $extraer);

        
        $this->SetFont('Arial','',6.2);
        $this->Ln(7);
        
        
        while ($ejecuta = mysqli_fetch_array($ejecutar)) {
            if (($ejecuta['estado']) == 0) {

                $y=$this->GetY();

                //-----------------------CODIGO--------------
                $this->SetX(4);
                $this->Cell(20,10.5,"",1,0,'C');

                $this->SetX(4);
                $this->MultiCell(20,3.5,$ejecuta['codAct'],0,'L',0);
                
        
               //-----------------------DESCRIPCION-------------- 
               $this->SetY($y);
               $this->SetX(24);
               $this->Cell(40,10.5,"",1,0,'C');

               $this->SetX(24);
               $this->MultiCell(40,3.5,$ejecuta['descrip'],0,'L',0);


                //-----------------------SERIE-------------- 
               $aux3 = $ejecuta['idAc'];
                $sentencia3 = "SELECT * FROM detalle_activo WHERE activofijo_id='$aux3'";
                $ejecutar3 = mysqli_query($con, $sentencia3);
                $fila3 = mysqli_fetch_assoc($ejecutar3);

               $this->SetY($y);
               $this->SetX(64);
               $this->Cell(20,10.5,"",1,0,'C');

               $this->SetX(64);
               $this->MultiCell(20,3.5,$fila3['serie'],0,'L',0);

                //-----------------------MARCA-------------- 
               $aux4 = $fila3['marca_id'];
               $sentencia5 = "SELECT * FROM marca WHERE idMarca='$aux4'";
               $ejecutar5 = mysqli_query($con, $sentencia5);
               $fila5 = mysqli_fetch_assoc($ejecutar5);

               $this->SetY($y);
               $this->SetX(84);
               $this->Cell(20,10.5,"",1,0,'C');

               $this->SetX(84);
               $this->MultiCell(20,3.5,$fila5['nombre'],0,'L',0);

       
                //-----------------------UBICACION-------------- 
                $aux4 = $fila3['ubi_id'];
                $sentencia4 = "SELECT * FROM ubicacion WHERE idUb='$aux4'";
                $ejecutar4 = mysqli_query($con, $sentencia4);
                $fila4 = mysqli_fetch_assoc($ejecutar4);

               $this->SetY($y);
               $this->SetX(104);
               $this->Cell(28,10.5,"",1,0,'C');

               $this->SetX(104);
               $this->MultiCell(28,3.5,$fila4['nombre'],0,'L',0);


               //-----------------------FECHA ADQUISICION-------------- 
               $this->SetY($y);
               $this->SetX(132);
               $this->Cell(20,10.5,"",1,0,'C');

               $this->SetX(132);
               $this->MultiCell(20,3.5,$fila3['fecha_adqui'],0,'L',0);

               
               //-----------------------PRECIO-------------- 
               $this->SetY($y);
               $this->SetX(152);
               $this->Cell(15,10.5,"",1,0,'C');

               $this->SetX(152);
               $this->MultiCell(15,3.5,$fila3['valor_historico'],0,'L',0);

               
               //-----------------------DONACION-------------- 
               $this->SetY($y);
               $this->SetX(167);
               $this->Cell(15,10.5,"",1,0,'C');

               $this->SetX(167);
               $this->MultiCell(15,3.5,$fila3['donado'],0,'L',0);
               
               //-----------------------VIDA UTIL-------------- 
               $this->SetY($y);
               $this->SetX(182);
               $this->Cell(20,10.5,"",1,0,'C');

               $this->SetX(182);
               $this->MultiCell(20,3.5,$fila3['vidautil_restante'],0,'L',0);
               $this->SetY($y+10.5);
            }
        }
        
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Logo
//$pdf->Image('../vistas/logotipo.png', 10, 15, 25);
// Arial bold 15
$pdf->SetFont('Times', 'B', 12);
// Move to the right
$pdf->Cell(80);
// Title
//$pdf->Cell(35, 20, utf8_decode('CONSULTORIO MÉDICO DRA. ANA LUISA VELÁZQUEZ'), 0, 0, 'C');
//$pdf->Cell(-35, 35, utf8_decode('MEDICINA GENERAL'), 0, 0, 'C');
$pdf->Cell(35,5, utf8_decode('REPORTE DE ACTIVOS INACTIVOS'), 0, 0, 'C');
// Line break

$pdf->Ln(13);





$pdf->SetFont('Times', 'B', 7);

$pdf->SetX(4);
$pdf->Cell(20,7,"CODIGO",1,0,'C');
$pdf->Cell(40,7,"DESCRIPCION",1,0,'C');
$pdf->Cell(20,7,"SERIE",1,0,'C');
$pdf->Cell(20,7,"MARCA",1,0,'C');
$pdf->Cell(28,7,"UBICACION",1,0,'C');
$pdf->MultiCell(20,3.5,"FECHA DE ADQUISICION",1,'C',0);
$pdf->SetY($pdf->GetY()-7);
$pdf->SetX(152);


$pdf->Cell(15,7,"PRECIO",1,0,'C');
$pdf->Cell(15,7,"DONACION",1,0,'C');
$pdf->Cell(20,7,"VIDA UTIL",1,0,'C');




$pdf->viewTable();








$pdf->Output();
