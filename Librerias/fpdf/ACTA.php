<?php

require('./fpdf.php');

require_once('../../controlador/secretario/actasControlador.php');
$resultado = actasControlador::verPDFC();
$datos = mysqli_fetch_array($resultado);

$numero = $datos['numero_acta'];
$asunto = $datos['asunto_acta'];
$fecha = $datos['fecha'];

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        global $numero;
        $this->SetFont('Times', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(0, 15, utf8_decode('Acta comunitaria N° ' . $numero), 0, 1, 'C'); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
        $this->Ln(10); // Salto de línea
    }

    // Contenido de página
    function Content()
    {
        global $asunto, $acuerdo, $fecha;
        $this->SetFont('Times', '', 12);

        // Posición y tamaño del rectángulo (margen de 10 en cada lado)
        $x = 10;
        $y = $this->GetY();
        $width = $this->GetPageWidth() - 20;
        $height = $this->GetPageHeight() - $this->GetY() - 20;

        // Agregar el marco alrededor del contenido del acta
        $this->Rect($x, $y, $width, $height);

        // Contenido del acta
        $this->MultiCell(0, 10, utf8_decode('El dia ' . $fecha . ' en la comunidad de Pallacocha, distrito de Turpo, provincia Andahuaylas, se realizó una reunión con el asunto de: '), 0, 'L'); // Asunto de la reunión
        $this->MultiCell(0, 10, utf8_decode($asunto), 0, 'L'); // Asunto de la reunión
        $this->Ln(8);
        $this->MultiCell(0, 10, utf8_decode('Acuerdo de la reunión: ' . $acuerdo), 0, 'L'); // Acuerdo de la reunión
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        global $acuerdo, $fecha;
        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Times', 'I', 10); //tipo fuente, cursiva, tamañoTexto
        $this->Cell(0, 10, utf8_decode('Pallaccocha,  ' . $fecha), 0, 1, 'R'); // Fecha de la reunión
    }
}

$pdf = new PDF();
$pdf->AliasNbPages(); // Muestra el número total de páginas
$pdf->AddPage(); // Agrega una nueva página
$pdf->Content(); // Agrega el contenido de la página
$pdf->Output('Acta_comunitaria_N' . $numero . '.pdf', 'I'); // Descarga el PDF con el nombre personalizado
?>