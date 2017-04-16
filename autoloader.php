<?php
//foreach (glob("../CLASS/*.php") as $filename){
//    require_once($filename);
//} ten sposob nie dziala jesli importuje plik w folderze wyzej niz ten w ktorym jest index.php

require('./resources/class/activeRecordInterface.php');
require('./resources/class/activeRecord.php');
require('./resources/class/User.php');
require('./resources/config.php');


