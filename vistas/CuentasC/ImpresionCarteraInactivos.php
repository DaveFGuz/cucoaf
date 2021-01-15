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
        $result=$mysqli->query("SELECT cl.idCliente,cl.nombre,cl.apellido,cl.dui,cl.nit,cl.ocupacion,cl.depa,cl.direc,cl.tel,cl.tipo
        FROM cliente as cl
        WHERE estado = 1");
        while ($file = $result->fetch_object()) {
            

                $y=$this->GetY();

                //-----------------------CODIGO--------------
                $this->SetX(16);
                $this->Cell(12,14,"",1,0,'C');

                $this->SetX(16);
                $this->MultiCell(12,3.5,$file->idCliente,0,'L',0);
                
        
               //-----------------------NOMBRE-------------- 
               $this->SetY($y);
               $this->SetX(28);
               $this->Cell(30,14,"",1,0,'C');

               $this->SetX(28);
               $this->MultiCell(30,3.5,$file->nombre.' '.$file->apellido,0,'L',0);


                //-----------------------DUI-----------------

               $this->SetY($y);
               $this->SetX(58);
               $this->Cell(20,14,"",1,0,'C');

               $this->SetX(58);
               $this->MultiCell(20,3.5,$file->dui,0,'L',0);

                //-----------------------NIT-------------- 

               $this->SetY($y);
               $this->SetX(78);
               $this->Cell(20,14,"",1,0,'C');

               $this->SetX(78);
               $this->MultiCell(20,3.5,$file->nit,0,'L',0);

       
                //-----------------------OCUPACION-------------- 
               $this->SetY($y);
               $this->SetX(98);
               $this->Cell(20,14,"",1,0,'C');

               $this->SetX(98);
               $this->MultiCell(20,3.5,$file->ocupacion,0,'L',0);


               //-----------------------DEPA-------------- 
               $this->SetY($y);
               $this->SetX(118);
               $this->Cell(22,14,"",1,0,'C');

               $this->SetX(118);
               $this->MultiCell(22,3.5,utf8_decode($file->depa),0,'L',0);

               
               //-----------------------Direccion-------------- 
               $this->SetY($y);
               $this->SetX(140);
               $this->Cell(27,14,"",1,0,'C');

               $this->SetX(140);
               $this->MultiCell(27,3.5,$file->direc,0,'L',0);

               
               //-----------------------TELEFONO------------- 
               $this->SetY($y);
               $this->SetX(167);
               $this->Cell(15,14,"",1,0,'C');

               $this->SetX(167);
               $this->MultiCell(15,3.5,$file->tel,0,'L',0);
               
              
               //-----------------------TIPO------------- 
               $tipocliente="";
               if($file->tipo==1){ 
                $tipocliente = 'Normal';
              
                  
                }else if($file->tipo==2){
                $tipocliente = 'Morosa';
                
              
                } else if($file->tipo==3){
                $tipocliente = 'Incobrable';
    
              
                }

               $this->SetY($y);
               $this->SetX(182);
               $this->Cell(15,14,"",1,0,'C');
               

               $this->SetX(182);
               $this->MultiCell(15,3.5,$tipocliente,0,'L',0);

               $this->SetY($y+14);
               
              
            
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
$pdf->Cell(35,5, utf8_decode('REPORTE DE CLIENTES INACTIVOS'), 0, 0, 'C');
// Line break

$pdf->Ln(13);





$pdf->SetFont('Times', 'B', 7);

$pdf->SetX(16);
$pdf->Cell(12,7,"CODIGO",1,0,'C');
$pdf->Cell(30,7,"NOMBRE",1,0,'C');
$pdf->Cell(20,7,"DUI",1,0,'C');
$pdf->Cell(20,7,"NIT",1,0,'C');
$pdf->Cell(20,7,"OCUPACION",1,0,'C');

$pdf->Cell(22,7,"DEPARTAMENTO",1,0,'C');
$pdf->Cell(27,7,"DIRECCION",1,0,'C');
$pdf->Cell(15,7,"TELEFONO",1,0,'C');
$pdf->Cell(15,7,"TIPO",1,0,'C');








$pdf->viewTable();








$pdf->Output();