<?php include "header.php";?>
	<?php
		function decompress($s) {
			$id = 0;
			for ( $i = strlen($s)-1; $i >= 0;$i--) {
				if (ctype_lower($s[$i]))
					$id = $id*62 + ord($s[$i]) - 97;
				else if (ctype_upper($s[$i]))
					$id = $id*62 + ord($s[$i]) - 65 + 26;
				else
					$id = $id*62 + ord($s[$i]) - 48 + 52;
			}
			return $id;
		}
		$req = $_SERVER['REQUEST_URI'];
		if (strlen($req)>1) {
			$uri = explode("/", $req)[1];
			$id = decompress($uri);
			include "dbconnect.php";
			$query = "SELECT url FROM links WHERE id=".$id;
			$res = mysqli_query($conn, $query);
			$url =  mysqli_fetch_assoc($res)['url'];
			if ($url) {
				header("Location: ".$url);
				die();
			}
		}
	?>
		<div class="container">
			<h1 id="masala" style="text-align:center;">404</h1>
		</div>
<?php include "footer.php";?>		
		