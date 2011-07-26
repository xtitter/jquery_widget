<?php
/**
 *
 **/

$config = array(
	'dsn' => array(
		'host' => 'localhost',
		'user' => 'isetimeline',
		'pass' => 'ise@timeline4us!',      
		'port' => 3306,
		'driver' => 'mysql'
	),
	
	'database_settings' => array(
	  'include_databases_matching_regex' => '/isetimeline/',
     'exclude_databases_matching_regex' => '/.*mediawiki/',
//		'include_databases_matching_regex' => '/.*/',
//		'exclude_databases_matching_regex' => '/(_bak$)|(^bak_)|(^temp_)/',
	),
	
	
	'field_settings' => array(
      // In case of non FK detection, you can have the Database Schema Generator check for ID columns matching this regex.
      // This is useful, for example, when no FK relationships set up)
      'id_to_table_regex' => array(
         '/^(.*)_id$/',
         '/^contributor_(.*)_id$/',
         '/^creator_(.*)_id$/',
         '/^pi_(.*)_id$/',
	
	     )
   ),

);

?>
