<?php

	define('APP_NAME', 'Administration');
	define('APP_TITLE', APP_NAME);
	
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'ccb6b0c9');
	define('DB_DATABASE', 'wdy_hippo');
	
	$db = @mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
    mysql_select_db(DB_DATABASE, $db);
	
	define('TBL_TRANSLATIONS', 'translations');
	define('TBL_ADMIN', 'admin');
	define('TBL_PHOTOGALLERY', 'photogallery');
	define('TBL_PHOTOS', 'photos');
	define('TBL_PAGE', 'page');
	define('TBL_RIGHTCOLUMN', 'right_column');
	define('TBL_SETTINGS', 'settings');
        
    define('BASE_URL', '');