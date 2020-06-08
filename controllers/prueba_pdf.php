<?php

require('../fpdf/fpdf.php');
include('connection.php');

class myPDF extends FPDF{
    function header(){
        $this->Image('../images/logoGauss.jpeg',30,10,25);
        $this->Image('../images/logoIPN.png',230,10,40);
        $this->Ln(10);
        $this->SetDrawColor(35, 72, 169);
        $this->SetFillColor(35, 72, 169);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(85);
        $this->Cell(106,20,'Reportes Tickets', 0,0,'C', false);
        $this->Ln(22);
        $this->SetDrawColor(200, 15, 12);
        $this->SetFillColor(200, 15, 12);
        $this->Cell(280,1,'', 0,0,'C', true);
        $this->Ln(3);
        $this->SetDrawColor(35, 72, 169);
        $this->SetFillColor(35, 72, 169);
        $this->Cell(280,1,'', 0,0,'C', true);
        $this->Ln(7);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetDrawColor(240, 247, 29);
        $this->SetFillColor(240, 247, 29);
        $this->Cell(280,1,'', 0,0,'C', true);
        $this->Ln();
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0,10,'Page'. $this->PageNo().'/{nb}', 0,0,'C');
    }

    function headerTable(){
        $this->SetFont('Times', 'B', 12);
        $this->Cell(30,10,'ID', 1,0,'C');
        $this->Cell(40,10,'PROPIETARIO', 1,0,'C');
        $this->Cell(40,10,'AREA', 1,0,'C');
        $this->Cell(30,10,'PROCESO', 1,0,'C');
        $this->Cell(95,10,utf8_decode('DESCRIPCIÓN'), 1,0,'C');
        $this->Cell(40,10,'FECHA', 1,0,'C');
        $this->Ln();
    }

    function viewTable($db){
        $this->SetFont('Times', '', 12);
        $query = "SELECT * from ((ticket_genericos inner join areas on ticket_genericos.ID_AREA = areas.ID_AREA)
        inner join status_ticket on ticket_genericos.ID_STATUS = status_ticket.ID_STATUS)";
        $executeQuery = mysqli_query($db, $query);
        while($data = mysqli_fetch_assoc($executeQuery)){
            $this->Cell(30,10, $data['CODIGO_TICKET'], 1,0,'C');
            $this->Cell(40,10, $data['NAME_OWNER'], 1,0,'C');
            $this->Cell(40,10, utf8_decode($data['AREA']), 1,0,'C');
            $this->Cell(30,10,  $data['STATUS'], 1,0,'C');
            $this->Cell(95,10,utf8_decode($data['DESCRIPCION']), 1,0,'L');
            $this->Cell(40,10,$data['FECHA'], 1,0,'L');
            $this->Ln();
        }
    }
/*     function footer(){
        $this->SetDrawColor(215, 197, 18);
        $this->SetFillColor(215, 197, 18);
        $this->Cell(280,1,'', 0,0,'C', true);
    } */
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable($conn);
$pdf->Output();
?>