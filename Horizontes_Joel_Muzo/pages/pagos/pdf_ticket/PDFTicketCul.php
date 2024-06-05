<?php
// Incluye la librería TCPDF
require_once('../../TCPDF-main/tcpdf.php');

// Ruta a la imagen
$logoPath = '../../../img/Horizontes.png';

// Clase personalizada que extiende TCPDF
class CustomPDF extends TCPDF {
    // Ruta al logo
    protected $logoPath;

    public function __construct($logoPath) {
        parent::__construct();
        $this->logoPath = $logoPath;
    }

    // Sobrescribe el método Header
    public function Header() {
        // Posición del logo
        $this->Image($this->logoPath, 10, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        // Establece la fuente para el título de la cabecera
        $this->SetFont('helvetica', 'B', 14);
        
        // Título de la cabecera
        $this->Cell(0, 25, 'Ticket del viaje', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
        
        // Añade espacio después del título
        $this->Ln(5);
    }
}

if(isset($_GET['id'])) {
    $id_reserva = $_GET['id'];
    
    // Crea una instancia de CustomPDF
    $pdf = new CustomPDF($logoPath);

    // Configura la información del documento y otros ajustes
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Joel Muzo');
    $pdf->SetTitle('Pago por Transferencia Bancaria');
    $pdf->SetSubject('Pago por Transferencia Bancaria');
    $pdf->SetKeywords('TCPDF, PDF, pago, transferencia bancaria');
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Llama a la función detallesPagoOfer para obtener los detalles de la reserva
    require_once("../../../Proyecto.php");
    $proyecto = new Proyecto();
    $detalles_pdf = $proyecto->detallesPDFCul($id_reserva);

    // Si se obtuvieron los detalles de la reserva correctamente
    if($detalles_pdf) {
        $pdf->AddPage();

        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Estimado Cliente,', 0, 1, 'L');
        $pdf->Ln(5);
        $pdf->MultiCell(0, 10, 'Gracias por confiar en nuestros servicios para tu próximo viaje. A continuación, encontrarás los detalles de tu reserva:', 0, 'L');
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Detalles del Viaje', 0, 1, 'L');
        $pdf->Ln(2);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Nombre del Viaje: ' . $detalles_pdf['nombre'], 0, 1, 'L');
        $pdf->Cell(0, 10, 'Fecha de Salida: ' . $detalles_pdf['fecha'], 0, 1, 'L');
        $pdf->Cell(0, 10, 'Número de Personas: ' . $detalles_pdf['numero_viajeros'], 0, 1, 'L');
        $pdf->Cell(0, 10, 'Precio Total: ' . $detalles_pdf['precio_total'] . '€', 0, 1, 'L');
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Detalles del Cliente', 0, 1, 'L');
        $pdf->Ln(2);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Correo Electrónico: ' . $detalles_pdf['correo'], 0, 1, 'L');
        $pdf->Cell(0, 10, 'Teléfono de Contacto: ' . $detalles_pdf["telefono"], 0, 1, 'L');
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Instrucciones Adicionales', 0, 1, 'L');
        $pdf->Ln(2);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->MultiCell(0, 10, 'Por favor, asegúrese de llevar consigo los documentos de viaje necesarios, como pasaportes, visas, etc.', 0, 'L');
        $pdf->Ln(3);
        $pdf->SetFont('helvetica', '', 11);
        $pdf->MultiCell(0, 10, 'Si tiene alguna pregunta o necesita asistencia adicional, no dude en comunicarse con nosotros, en el siguiente correo: horizontes@gmail.com', 0, 'L');
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', 'I', 10);
        $pdf->Cell(0, 10, '¡Esperamos que disfrutes tu viaje con nosotros!', 0, 1, 'L');
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Atentamente', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Directora General', 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Itziar Olmeda', 0, 1, 'L');

        // Cierra y genera el PDF
        $pdf->Output('formulario_pago.pdf', 'D');
    } else {
        echo "Error: No se pudieron obtener los detalles de la reserva.";
    }
} else {
    // Si no se proporciona el parámetro id_reserva en la URL, muestra un mensaje de error
    echo "Error: No se proporcionó el ID de reserva.";
}
?>
