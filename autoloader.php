<?php
//foreach (glob("../CLASS/*.php") as $filename){
//    require_once($filename);
//} ten sposob nie dziala jesli importuje plik w folderze wyzej niz ten w ktorym jest index.php

require($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/resources/class/activeRecordInterface.php');
require($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/resources/class/activeRecord.php');
require($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/resources/class/User.php');
require($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/resources/class/Admin.php');
require($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/resources/class/Item.php');
require($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/resources/class/Image.php');
require($_SERVER['DOCUMENT_ROOT'].'/OnlineShop/resources/config.php');
