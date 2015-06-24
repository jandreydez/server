<?php
    define('AMBIENTE', 'producao', true);

    // AMBIENTE DESENVOLVIMENTO
    if( AMBIENTE == 'desenvolvimento' ){
        define('DB_SERVER', 'mysql13.plusonline.com.br', true);
        define('DB_USER', 'plusonline13', true);
        define('DB_PASS', 'TA82ma73RA64', true);
        define('DB_DATABASE', 'plusonline13', true);
    }

    // AMBIENTE PRODUÇÃO
    if( AMBIENTE == 'producao' ){
        define('DB_SERVER', '186.202.152.75', true);
        define('DB_USER', 'sebraepreviden', true);
        define('DB_PASS', 'Hzfd368gb@', true);
        define('DB_DATABASE', 'sebraepreviden', true);
    }