<?php
	if (isset($_POST['key'])) {
        $dbh=config('db_host', 'localhost');
        $dbu=config('db_username', 'tptdb');
        $dbp=config('db_password', 'tptdb');
        $dbd=config('db_database', 'tptdb');
		$conn = new mysqli($dbh, $dbu, $dbp, $dbd);
		if ($_POST['key'] == 'getExistingData') {
			$start = $conn->real_escape_string($_POST['start']);
			$limit = $conn->real_escape_string($_POST['limit']);
			$sql = $conn->query("SELECT id, name FROM contacts LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) {
					$response .= '
						<tr>
							<td>'.$data["id"].'</td>
							<td>'.$data["name"].'</td>
						</tr>
					';
				}
				exit($response);
			} else
				exit('reachedMax');
		}
	}
?>