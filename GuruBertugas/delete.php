<?php 
//connect to database
require_once(COMPONENTS_DIR."/config.php");

//delete record from database

if (isset($_GET['id_janjitemu'])) {
	$query="DELETE FROM janjitemu WHERE id_janjitemu='".$_GET['id_janjitemu']."'";

	$sql=mysqli_query($conn,$query);

}

if ($sql) {

	echo "<script type='text/javascript'>alert('Data sedang diprose, Sila tunggu');location='dashboard.php';</script>";

}

else {

	echo "<script type=\"text/javascript\">alert('Error memadam rekod :'+'mysqli_error($conn)') </script>";
}

//Close MySQL connection
mysqli_close($conn);
?>