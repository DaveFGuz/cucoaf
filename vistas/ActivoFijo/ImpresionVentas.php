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

        $con = mysqli_connect('localhost', 'root', '', 'finanzas');
        $cont1 = 0;
        $extraer = "SELECT * FROM venta";

        $base = mysqli_select_db($con, 'finanzas');
        $ejecutar = mysqli_query($con, $extraer);


        $this->SetFont('Arial', '', 7);
        $this->Ln(7);


        while ($ejecuta = mysqli_fetch_array($ejecutar)) {
            if (($ejecuta['idVenta']) != 0) {
                $cont1 = $cont1 + 1;

                $aux3 = $ejecuta['idActi'];
                $sentencia3 = "SELECT * FROM activo WHERE idAc='$aux3'";
                $ejecutar3 = mysqli_query($con, $sentencia3);
                $fila3 = mysqli_fetch_assoc($ejecutar3);


                $y = $this->GetY();

                //-----------------------No FACTURA--------------
                $this->SetX(20);
                $this->Cell(22, 10.5, "", 1, 0, 'C');

                $this->SetX(20);
                $this->MultiCell(22, 3.5, $ejecuta['factNum'], 0, 'L', 0);


                //-----------------------codigo-------------- 
                $this->SetY($y);
                $this->SetX(42);
                $this->Cell(25, 10.5, "", 1, 0, 'C');

                $this->SetX(42);
                $this->MultiCell(25, 3.5, $fila3['codAct'], 0, 'L', 0);


                //-----------------------descripcion-------------- 


                $this->SetY($y);
                $this->SetX(67);
                $this->Cell(45, 10.5, "", 1, 0, 'C');

                $this->SetX(67);
                $this->MultiCell(45, 3.5, $fila3['descrip'], 0, 'L', 0);

                //-----------------------MOVIMIENTO-------------- 

                $aux3 = $ejecuta['idMovi'];
                $sentencia4 = "SELECT * FROM movimiento WHERE idMov='$aux3'";
                $ejecutar4 = mysqli_query($con, $sentencia4);
                $fila4 = mysqli_fetch_assoc($ejecutar4);

                $this->SetY($y);
                $this->SetX(112);
                $this->Cell(30, 10.5, "", 1, 0, 'C');

                $this->SetX(112);
                $this->MultiCell(30, 3.5, $fila4['nombre'], 0, 'L', 0);


                //-----------------------VALOR VEMTA-------------- 


                $this->SetY($y);
                $this->SetX(142);
                $this->Cell(25, 10.5, "", 1, 0, 'C');

                $this->SetX(142);
                $this->MultiCell(25, 3.5, $ejecuta['precVenta'], 0, 'L', 0);


                //-----------------------FECHA VENTA-------------- 
                $this->SetY($y);
                $this->SetX(167);
                $this->Cell(25, 10.5, "", 1, 0, 'C');

                $this->SetX(167);
                $this->MultiCell(25, 3.5, $ejecuta['fecha'], 0, 'L', 0);



                $this->SetY($y + 10.5);
            }
        }
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Logo
$pdf->Image('../minerva.png', 10, 10, 25);
$pdf->Ln(27);
// Arial bold 15
$pdf->SetFont('Times', 'B', 12);
// Move to the right
$pdf->Cell(80);
// Title
//$pdf->Cell(35, 20, utf8_decode('CONSULTORIO MÉDICO DRA. ANA LUISA VELÁZQUEZ'), 0, 0, 'C');
//$pdf->Cell(-35, 35, utf8_decode('MEDICINA GENERAL'), 0, 0, 'C');
$pdf->Cell(35, 5, utf8_decode('REPORTE DE VENTAS'), 0, 0, 'C');
// Line break

$pdf->Ln(13);





$pdf->SetFont('Times', 'B', 7);

$pdf->SetX(20);
$pdf->Cell(22, 7, "No. DE FACTURA", 1, 0, 'C');
$pdf->Cell(25, 7, "CODIGO", 1, 0, 'C');
$pdf->Cell(45, 7, "DESCRIPCION", 1, 0, 'C');
$pdf->Cell(30, 7, "MOVIMIENTO", 1, 0, 'C');
$pdf->Cell(25, 7, "VALOR DE VENTA", 1, 0, 'C');
$pdf->Cell(25, 7, "FECHA DE VENTA", 1, 0, 'C');





$pdf->viewTable();








$pdf->Output();
