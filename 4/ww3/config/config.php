<?php
define("MYSQL_SERVER","localhost");
define("MYSQL_USER","4_ww3_user");
define("MYSQL_PASSWORD","455001");
define("MYSQL_DB","shop111");

define("DIR_BIG","uploads/");
define("DIR_SMALL","uploads/mini/");
@mkdir(DIR_BIG, 0777);
@mkdir(DIR_SMALL, 0777);
$cols = 3;
$k = 1;
$message = '';
