<?php if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = array(
	"type" => Config::get('database.type'),  // Database type: "Mysql", "Postgres", "Sqlite" or "Sqlserver"
	"user" => "root",       // Database user name
	"pass" => "root",       // Database password
	"host" => "localhost",       // Database host
	"port" => "3306",       // Database connection port (can be left empty for default)
	"db"   => "datatable",       // Database name
	"dsn"  => "charset=utf8"        // PHP DSN extra information. Set as `charset=utf8` if you are using MySQL
);


