<?php
$qr_code[1] = 'UPNQR';//UPNQR /obvezno *
$qr_code[2] = '';// IBAN plačnika /prazno
$qr_code[3] = '';// Polog /prazno
$qr_code[4] = '';// Dvig /prazno
$qr_code[5] = '';// Referenca plačnika /prazno
$qr_code[6] = '';// Ime plačnika /obvezno *
$qr_code[7] = '';// Uliva in št. plačnika /obvezno *
$qr_code[8] = '';// Pošta in kraj plačnika /obvezno *
$qr_code[9] = '';// Znesek /obvezno *
$qr_code[10] = '';// Datum plačila /prazno
$qr_code[11] = '';// Nujno /prazno
$qr_code[12] = '';// Koda namena /obvezno *
$qr_code[13] = '';// Referenca /obvezno *
$qr_code[14] = '';// Rok plačila /poljubno
$qr_code[15] = '';// IBAN prejemnika /obvezno *
$qr_code[16] = '';// Referenca prejemnika /obvezno *
$qr_code[17] = '';// Ime prejemnika /obvezno *
$qr_code[18] = '';// Uliva in št. prejemnika /obvezno *
$qr_code[19] = '';// Pošta in kraj prejemnika /obvezno *

$qr_string = implode("\n",$qr_code);

$qr_string .= "\n";

$qr_string .= str_pad(mb_strlen($qr_string),3,'0',STR_PAD_LEFT) . "\n";
$qr_string = str_pad($qr_string,410,' ',STR_PAD_RIGHT);

require_once(__DIR__ . '\BaconQrCode\autoload_register.php');

$renderer = new \BaconQrCode\Renderer\Image\Png();
$renderer->setHeight(340);
$renderer->setWidth(340);
$writer = new \BaconQrCode\Writer($renderer);
$output = $writer->writeString($qr_string,'ISO-8859-2',\BaconQrCode\Common\ErrorCorrectionLevel::M);
$writer->writeFile($qr_string,'generated\qr.png','ISO-8859-2',\BaconQrCode\Common\ErrorCorrectionLevel::M);

header('Content-Type: image/png');

echo $output;
?>