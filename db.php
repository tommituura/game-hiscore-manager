<?php
/**************************
 * Database opener
 **************************/
function open_db($dbtype="pgsql") {
	$db = parse_ini_file('db.ini');

	try {
		$dbh = new PDO($dbtype . ":host=" .  $db['hostname'], $db['username'], $db['password']);
	} catch (PDOException $e) {
		die("Database connection attempt failed: " . $e->getMessage());
	}

	return $dbh;
}

/***************************
 * Database handlers
 ***************************/

function add_game($gamename) {
    $dbh = open_db();
    $stmt = $dbh->prepare("INSERT INTO gamemanager.game (name) VALUES (?) RETURNING id");
    $stmt->bindParam(1, $gamename, PDO::PARAM_STR);
    $stmt->execute();
    #$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    #$stmt = $dbh->prepare("SELECT * FROM gamemanager.game WHERE id = ?");
    #$stmt->bindParam(1, $row['id'], PDO::PARAM_INT);
    #$stmt->execute();
    #return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    return list_games();
}

function list_games() {
    $dbh = open_db();
    $stmt = $dbh->prepare("SELECT * FROM gamemanager.game");
    $stmt->execute();
    return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

# print_r(add_game('hurlumhei'));

?>


