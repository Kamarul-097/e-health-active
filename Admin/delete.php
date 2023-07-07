<?php 
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
//connect to database
require_once(COMPONENTS_DIR."/config.php");

// DECLARING GLOBAL VARIABLE START
$dbObj = new Database();
$conn = $dbObj->getConnection();
// DECLARING GLOBAL VARIABLE END

//delete record from database

if (isset($_GET['id_janjitemu'])) {
	$query="DELETE FROM janjitemu WHERE id_janjitemu='".$_GET['id_janjitemu']."'";

	$sql=mysqli_query($conn,$query);

    echo "<script type='text/javascript'>alert('Data sedang diproses, Sila tunggu');location='dashboard.php';</script>";
}
else {
    echo "<script type='text/javascript'>alert('Data gagal diproses, Sila tunggu');location='dashboard.php';</script>";
}



//Close MySQL connection
mysqli_close($conn);
?>