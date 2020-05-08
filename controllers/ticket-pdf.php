<?php
require('connection.php'); 
require('../fpdf/fpdf.php');

if($_SERVER["REQUEST_METHOD"] == "GET"){
$idTicket = $_GET["id"];
$consulta = "SELECT * from ((ticket_genericos inner join areas on ticket_genericos.ID_AREA = areas.ID_AREA)inner join status_ticket on ticket_genericos.ID_STATUS = status_ticket.ID_STATUS) where ticket_genericos.ID_TICKET = '$idTicket'";
/* $consulta = "SELECT * FROM ticket_genericos WHERE ID_TICKET = '$idTicket'"; */
$execute = mysqli_query($conn, $consulta);
$row = mysqli_fetch_assoc($execute);

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->SetDrawColor(35, 72, 169);
    $this->SetFillColor(35, 72, 169);
    $this->SetTextColor(255,255,255);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->Image('../fpdf/logo-ipn.png',20,5,25);
    // Movernos a la derecha
    $this->Cell(55);
    // Título
    $this->Cell(80, 10, "Ticket", 1, 0, "C", true);
    $this->Image('../fpdf/INSTITUTO-GAUSS-JORDAN.png',160,5,40);
    // Salto de línea
    $this->Ln(25);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetDrawColor(35, 72, 169);
$pdf->SetFillColor(35, 72, 169);
$pdf->Cell(80, 10, "Nombre", 1,0,'C', 0);
$pdf->Cell(50, 10, "Condigo Ticket", 1,0,'C', 0);
$pdf->Cell(50, 10, "Asunto", 1,0,'C', 0);
$pdf->Ln(10);

    $pdf->Cell(80, 10,utf8_decode($row['NAME_OWNER']), 1,0,'C', 0);
    $pdf->Cell(50, 10, $row['CODIGO_TICKET'], 1,0,'C', 0);
    $pdf->Cell(50, 10, utf8_decode($row['ASUNTO']), 1,0,'C', 0);
    $pdf->Ln(15);

    $pdf->Cell(80, 10, "Descripcion", 1,0,'C', 0);
    $pdf->Cell(50, 10, "Estatus", 1,0,'C', 0);
    $pdf->Cell(50, 10, "Area", 1,0,'C', 0);
    $pdf->Ln(10);
    $pdf->Cell(80, 10,utf8_decode($row['DESCRIPCION']), 1,0,'C', 0);
    $pdf->Cell(50, 10, $row['STATUS'], 1,0,'C', 0);
    $pdf->Cell(50, 10, utf8_decode($row['AREA']), 1,0,'C', 0);

$pdf->Output();
}else{
    header("Location:#");
}
?>
