<?php
set_include_path ( get_include_path () . PATH_SEPARATOR . './src' );

require 'ErrorHandler.php';
require 'SimpleLogger.php';

$data = "";
$width = 256;
$height = 256;
$quality = 50;


if (isset ( $result['data'] ))
{
  $data = urldecode($result['data']);
  $data = html_entity_decode( $data, ENT_QUOTES, 'UTF-8' );
}

if (isset($result['w']))
{
  $width = intval($result['w']);
  if($width < 32 || $width > 256)
    $width = 256;  
}

if (isset($result['h']))
{
  $height = intval($result['h']);
  if($height < 32 || $height > 256)
    $height = 256;  
}

if (isset($result['q']))
{
  $quality = intval($result['q']);
  if($quality < 10 || $quality > 100)
  {
    $quality = 50;
  }
}

if ($data)
{
  require_once 'src/QRErrorCorrectLevel.php';
  require_once 'src/QRCode.php';
  require_once 'src/QRCodeImage.php';
  
  try
  {
    $code = new QRCode ( - 1, QRErrorCorrectLevel::H );
    $code->addData ( $data );
    $code->make ();
    
    $img = new QRCodeImage ( $code, $width, $height, $quality );
    $img->draw ();
    $imgdata = $img->getImage ();
    $img->finish ();
    
    if ($imgdata)
    {
      header ( 'Content-Type: image/jpeg' );
      header ( 'Content-Length: ' . strlen ( $imgdata ) );
      echo $imgdata;
    }
  }
  catch ( Exception $ex )
  {
    SimpleLogger::logException($ex);
  }
}