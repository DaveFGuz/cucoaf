<?php

    

require('../ActivoFijo/fpdf.php');



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

        

        
        $this->SetFont('Arial','',7);
        $this->Ln(7);

        require 'conexion.php';
        $con=mysqli_connect('localhost','root','','finanzas');
        $result=$mysqli->query("SELECT cl.idCliente,cl.nombre,cl.apellido,cl.dui,pt.estado,pt.plazo,pt.monto,pt.cuota,pt.saldo,pt.fechafinan,cd.garantia,cd.interes,cd.tipo
        FROM cliente as cl
        INNER JOIN prestamo as pt ON pt.idCli = cl.idCliente
        INNER JOIN creditos as cd ON cd.idCre = pt.idCre");
        while ($file = $result->fetch_object()) {
            

                $y=$this->GetY();

                //-----------------------CODIGO--------------
                $this->SetX(18);
                $this->Cell(12,10.5,"",1,0,'C');

                $this->SetX(18);
                $this->MultiCell(12,3.5,$file->idCliente,0,'L',0);
                
        
               //-----------------------NOMBRE-------------- 
               $this->SetY($y);
               $this->SetX(30);
               $this->Cell(30,10.5,"",1,0,'C');

               $this->SetX(30);
               $this->MultiCell(30,3.5,$file->nombre.' '.$file->apellido,0,'L',0);


                //-----------------------DUI-----------------

               $this->SetY($y);
               $this->SetX(60);
               $this->Cell(20,10.5,"",1,0,'C');

               $this->SetX(60);
               $this->MultiCell(20,3.5,$file->dui,0,'L',0);

                //-----------------------ESTADO-------------- 

               $this->SetY($y);
               $this->SetX(80);
               $this->Cell(20,10.5,"",1,0,'C');

               $this->SetX(80);
               $this->MultiCell(20,3.5,$file->estado,0,'L',0);

       
                //-----------------------PLAZO-------------- 
               $this->SetY($y);
               $this->SetX(100);
               $this->Cell(15,10.5,"",1,0,'C');

               $this->SetX(100);
               $this->MultiCell(15,3.5,$file->plazo.' meses',0,'L',0);


               //-----------------------MONTO-------------- 
               $this->SetY($y);
               $this->SetX(115);
               $this->Cell(15,10.5,"",1,0,'C');

               $this->SetX(115);
               $this->MultiCell(15,3.5,'$ '.$file->monto,0,'L',0);

               
               //-----------------------CUOTA-------------- 
               $this->SetY($y);
               $this->SetX(130);
               $this->Cell(15,10.5,"",1,0,'C');

               $this->SetX(130);
               $this->MultiCell(15,3.5,'$ '.$file->cuota,0,'L',0);

               
               //-----------------------FECHA VENCIMIENTO------------- 
               $this->SetY($y);
               $this->SetX(145);
               $this->Cell(22,10.5,"",1,0,'C');

               $this->SetX(145);
               $this->MultiCell(22,3.5,$file->fechafinan,0,'L',0);
               
              
               //-----------------------INTERES-------------- 
               $this->SetY($y);
               $this->SetX(167);
               $this->Cell(15,10.5,"",1,0,'C');

               $this->SetX(167);
               $this->MultiCell(15,3.5,$file->interes.' %',0,'L',0);
               
               //-----------------------TIPO-------------- 
               $this->SetY($y);
               $this->SetX(182);
               $this->Cell(15,10.5,"",1,0,'C');

               $this->SetX(182);
               $this->MultiCell(15,3.5,$file->tipo,0,'L',0);
               $this->SetY($y+10.5);
            
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
$pdf->Cell(35,5, utf8_decode('REPORTE DE TODAS LAS CARTERAS'), 0, 0, 'C');
// Line break

$pdf->Ln(13);





$pdf->SetFont('Times', 'B', 7);

$pdf->SetX(18);
$pdf->Cell(12,7,"CODIGO",1,0,'C');
$pdf->Cell(30,7,"NOMBRE",1,0,'C');
$pdf->Cell(20,7,"DUI",1,0,'C');
$pdf->Cell(20,7,"ESTADO",1,0,'C');
$pdf->Cell(15,7,"PLAZO",1,0,'C');

$pdf->Cell(15,7,"MONTO",1,0,'C');
$pdf->Cell(15,7,"CUOTA",1,0,'C');
$pdf->SetFont('Times', 'B', 6);
$pdf->MultiCell(22,3.5,"FECHA FINANCIAMIENTO",1,'C',0);
$pdf->SetFont('Times', 'B', 7);
$pdf->SetY($pdf->GetY()-7);
$pdf->SetX(167);
$pdf->Cell(15,7,"INTERES",1,0,'C');
$pdf->Cell(15,7,"TIPO",1,0,'C');








$pdf->viewTable();








$pdf->Output();