<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/OnlineShop/autoloader.php");

$path = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE-Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--responsive web design, adapting to different devices -->
        <title> <?php print(TITLE); ?> </title>
   
        <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.2/normalize.css" rel="stylesheet"> <!-- adding file normalize.css to reset styles -->
        <link href="<?php $path?>/OnlineShop/structure/css/bootstrap.css" rel="stylesheet"> <!-- include bootstrap styles -->
        <link href="<?php $path?>/OnlineShop/structure/css/style.css" rel="stylesheet">  <!-- overwriting bootstrap with own styles -->
    </head>
    <body>

       

            <?php include($_SERVER['DOCUMENT_ROOT']."/OnlineShop/structure/nav.php"); ?>



            <div class="container">
