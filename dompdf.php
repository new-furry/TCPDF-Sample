<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

//option part
$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);


// PDF size option
$dompdf->setPaper('A4', '');

//you can add bootstrap and font awesome...
$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Simple pdf generator using dompdf</h1>
  <p>Perfect!! All things working... including fontawesome</p> 
</div>
  
<div class="jumbotron">
<div class="row">
        <div class="col-xs-3">
            <div class="card border-info mx-xs-1 p-3">
                <div class="text-info text-center mt-3"><h4>Cars</h4></div>
                <div class="text-info text-center mt-2"><h1>234</h1></div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="card border-success mx-xs-1 p-3">
                <div class="text-success text-center mt-3"><h4>Eyes</h4></div>
                <div class="text-success text-center mt-2"><h1>9332</h1></div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="card border-danger mx-xs-1 p-3">
                <div class="text-danger text-center mt-3"><h4>Hearts</h4></div>
                <div class="text-danger text-center mt-2"><h1>346</h1></div>
            </div>
        </div>
     </div>
</div>

  <div class="container">
    <i class="fa fa-car"></i>
    <i class="fa fa-car" style="font-size:48px;"></i>
    <i class="fa fa-car" style="font-size:60px;color:red;"></i>
  </div>
</div>

</body>
</html>';

$dompdf->set_option('isHtml5ParserEnabled', true);                              //allow html5

$download = 0;

pdfGenerate($dompdf, $html, $download);

function pdfGenerate($dompdf, $html, $download) {
	if ($download != 0) {
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("download.pdf");                                        //download pdf
	}
	else {
        $dompdf->loadHtml($html);
        $dompdf->render();
		$dompdf->stream("show.pdf", array("Attachment" => false));              //show you pdf not download
	}
}
?>