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
        $extraer = "SELECT * FROM proveedor";

        $base = mysqli_select_db($con, 'finanzas');
        $ejecutar = mysqli_query($con, $extraer);

        
        $this->SetFont('Arial','',6.2);
        $this->Ln(7);
        
        
        while ($ejecuta = mysqli_fetch_array($ejecutar)) {
            if (($ejecuta['estado']) == 0) {

                $y=$this->GetY();

                //-----------------------NOMBRE--------------
                $this->SetX(4);
                $this->Cell(38,10.5,"",1,0,'C');

                $this->SetX(4);
                $this->MultiCell(38,3.5,$ejecuta['nombre'],0,'L',0);
                
        
               //-----------------------DIRECCION-------------- 
               $this->SetY($y);
               $this->SetX(42);
               $this->Cell(40,10.5,"",1,0,'C');

               $this->SetX(42);
               $this->MultiCell(40,3.5,$ejecuta['direccion'],0,'L',0);


                //-----------------------NIT-------------- 
               

               $this->SetY($y);
               $this->SetX(82);
               $this->Cell(22,10.5,"",1,0,'C');

               $this->SetX(82);
               $this->MultiCell(22,3.5,$ejecuta['nit'],0,'L',0);

                //-----------------------NOMBRE DE CONTACTO-------------- 
            
               $this->SetY($y);
               $this->SetX(104);
               $this->Cell(39,10.5,"",1,0,'C');

               $this->SetX(104);
               $this->MultiCell(39,3.5,$ejecuta['contacto'],0,'L',0);

       
                //-----------------------TELEFONO-------------- 
            

               $this->SetY($y);
               $this->SetX(143);
               $this->Cell(15,10.5,"",1,0,'C');

               $this->SetX(143);
               $this->MultiCell(15,3.5,$ejecuta['telefono'],0,'L',0);


               //-----------------------CORREO-------------- 
               $this->SetY($y);
               $this->SetX(158);
               $this->Cell(20,10.5,"",1,0,'C');

               $this->SetX(158);
               $this->MultiCell(20,3.5,$ejecuta['correo'],0,'L',0);

               
               //-----------------------OBSERVACION-------------- 
               $this->SetY($y);
               $this->SetX(178);
               $this->Cell(30,10.5,"",1,0,'C');

               $this->SetX(178);
               $this->MultiCell(30,3.5,$ejecuta['observacion'],0,'L',0);

               
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
$pdf->Cell(35,5, utf8_decode('REPORTE DE PROVEEDORES INACTIVOS'), 0, 0, 'C');
// Line break

$pdf->Ln(13);





$pdf->SetFont('Times', 'B', 7);

$pdf->SetX(4);
$pdf->Cell(38,7,"NOMBRE",1,0,'C');
$pdf->Cell(40,7,"DIRECCION",1,0,'C');
$pdf->Cell(22,7,"NIT",1,0,'C');
$pdf->Cell(39,7,"NOMBRE DE CONTACTO",1,0,'C');
$pdf->Cell(15,7,"TELEFONO",1,0,'C');
$pdf->Cell(20,7,"CORREO",1,0,'C');
$pdf->Cell(30,7,"OBSERVACION",1,0,'C');





$pdf->viewTable();








$pdf->Output();