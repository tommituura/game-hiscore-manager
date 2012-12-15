<?
function open_db($dbtype="pgsql") {
	$db = parse_ini_file('db.ini');

	try {
		$dbh = new PDO($dbtype . ":host=" .  $db['hostname'], $db['username'], $db['password']);
	} catch (PDOException $e) {
		die("Database connection attempt failed: " . $e->getMessage());
	}

	return $dbh;
}

?>
