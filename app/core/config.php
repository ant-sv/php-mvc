<?php

# dubug mode

ini_set('display_errors', 0);
# error_reporting( E_ALL & ~E_NOTICE & ~E_WARNING );

$CFG = array(
  
    'db_host' => 'localhost',
    'db_name' => '****',
    'db_user' => '****',
    'db_pass' => '****',
    'db_type' => 'mysql',
    'db_char' => 'utf8',

    'main_menu' => array (
        'ДОМА В УПРАВЛЕНИИ' => 'manage',
        'ИНФОРМАЦИЯ'        => 'info',
        'КОНТАКТЫ'          => 'contacts'
    )
);
