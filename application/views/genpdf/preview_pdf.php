<?php
header("Content-type:application/pdf");


// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename='". $pdf_file."'");

?>