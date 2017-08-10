<?php include "header.php";?>
<div class="container">
	<h5 id="masala" style="text-align: center;"><?php 
		include "dbconnect.php";
		function compress($n) {
			$s = "";
			$ref = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			while ($n!=0) {
				$s = $s.$ref[$n%62];
				$n = (int)$n / 62;
			}
			// jugad
			$fin = "";
			for ($i = 0;$i<strlen($s)-1;$i++)
				$fin = $fin.$s[$i];
			// nojugad use $s
			return $fin;
		}
		$url = $_POST['url'];
		$exp = date('Y-m-d H:i:s');
		$query = "INSERT INTO links(url,expiry) VALUES('$url','$exp')";
		
		if (mysqli_query($conn, $query)) {
			$last_id = mysqli_insert_id($conn);
			$shrt = "http://cram.space/".compress($last_id);
			echo "<a href='".$shrt."'>".$shrt."</a>";
 		 } else {
 		     echo "Error: " . $query . "<br>" . mysqli_error($conn);
 		 }
 		 mysqli_close($conn);
		?>
	</h3>
</div>
<?php include "footer.php";?>
