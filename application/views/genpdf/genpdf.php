

<?php 
    header("Content-type:application/pdf");
    header("Content-Disposition:attachment");
  
    //echo $data;
    $this->load->helper('url');
    use setasign\Fpdi\Fpdi;
    use setasign\Fpdi\PdfReader;
    use setasign\Fpdi\PdfParser;
    use setasign\Fpdi\PdfParser\StreamReader;
    require_once('FPDF/fpdf.php');
    require_once('FPDI/src/FpdiTrait.php');
    require_once('FPDI/src/autoload.php');
    require_once('warpper.php');
    if($pdf_file != ''){
        $pdf = new FPDI();
       $varInAnyScope = file_get_contents($pdf_file);
      //  $varInAnyScope = file_get_contents(base_url().'/img/templatepdf/test.pdf');
        $pageCount = $pdf->setSourceFile(VarStream::createReference($varInAnyScope));
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->AddPage();
            $pdf ->useTemplate($tplIdx, null, 12,null, null,true);
            $pdf->SetAutoPageBreak(true, 500);
            $pdf->Image(base_url().'/img/templatepdf/headerpage.png',0,0,210);
            $pdf->SetFont('Helvetica');
            $pdf->SetTextColor(200, 0, 0);
        }
        $pdf->Output();
        //echo $pdf;
    }
?>