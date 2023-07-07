<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
require_once(COMPONENTS_DIR . "/header.php");
require_once(COMPONENTS_DIR . "/auth_guru.php");
require_once(COMPONENTS_DIR . "/config.php");
?>
<!-- GLOBAL VARIABLES START -->
<?php
$dbObj = new Database();
$conn = $dbObj->getConnection();
?>
<!-- GLOBAL VARIABLES END -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-HEALTH</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
  <link rel="stylesheet" href="https://kit.fontawesome.com/c7ad192f5f.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <link rel="stylesheet" href="css/sidebar.css" />

<body id="body-pd" style="background-color:#ffff;">
  <header class="header" id="header" style="background-color:#ffff;">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

  </header>
  <div class="l-navbar" style="background-color: #172065;" id="nav-bar">
    <nav class="nav">
      <div> <a href="dashboard.php" class="nav_link"> <i class="fa-solid fa-house"></i><span class="nav_logo-name">E - HEALTH</span> </a>
        <div class="nav_list"> <a href="dashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
          <a href="urus2.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Pengesahan Pelajar</span> </a>
          <a href="senarai.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Cetak pelajar</span> </a>
        </div>
      </div><a href="logout.php"  class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Log Keluar</span> </a>
    </nav>
  </div>
  <!--Container Main start-->
  <div class="height-800" style="background-color:#ffff;">
    <div class="container" style="background-color:#ffff;">
      <div class="mt-3">
        <div class="row">
          <div class="col-sm-3 mb-3 mb-sm-0">
            <div class="card" style="background-color:#172065; color: white;">
              <div class="card-body">
                <h5 class="card-title">
                  <?php
                  $dash_category_query = "SELECT * FROM janjitemu";
                  $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                  if ($category_total = mysqli_num_rows($dash_category_query_run)) {
                    echo "$category_total";
                  } else {
                    echo "Tiada Permohonan";
                  }

                  ?></h5>
                <p class="card-text">Pelajar Berdaftar</p>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card" style="background-color:#44c97e; color: white;">
              <div class="card-body">
                <h5 class="card-title"> <?php
                                        $dash_category_query = "SELECT * FROM janjitemu WHERE status='Sah'";
                                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);

                                        if ($category_total = mysqli_num_rows($dash_category_query_run)) {
                                          echo "$category_total";
                                        } else {
                                          echo "Tiada Permohonan";
                                        }


                                        ?></h5>
                <p class="card-text">Permohonan berjaya</p>

              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card" style="background-color:#e15531; color: white;">
              <div class="card-body">
                <h5 class="card-title"> <?php
                                        $dash_category_query = "SELECT * FROM janjitemu WHERE status='dalam proses'";
                                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);

                                        if ($category_total = mysqli_num_rows($dash_category_query_run)) {
                                          echo "$category_total";
                                        } else {
                                          echo "Tiada Permohonan";
                                        }


                                        ?> </h5>
                <p class="card-text">Permohonan dalam proses</p>

              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card" style="background-color:#ba000d; color: white;">
              <div class="card-body">
                <h5 class="card-title"> <?php
                                        $dash_category_query = "SELECT * FROM janjitemu WHERE status='Tidak Sah'";
                                        $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                                        if ($category_total = mysqli_num_rows($dash_category_query_run)) {
                                          echo "$category_total";
                                        } else {
                                          echo "Tiada Permohonan";
                                        }

                                        ?> </h5>
                <p class="card-text">Permohonan tidak berjaya</p>

              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="mt-3">
        <strong>
          <p class="display-4">Senarai pelajar</p>
        </strong>
        <table id="example" class="table table-striped " width="100%">
          <thead>
            <th>No</th>
            <th>Nama</th>
            <th>No. Matrik</th>
            <th>Program</th>
            <th>Tahun</th>
            <th>Waktu Janji Temu</th>
            <th>Tarikh Janji Temu</th>
            <th>No Telefon Penjaga</th>
            <th>Status</th>
            <th>Buang </th>

          </thead>

          <tbody>
            <?php
            global $row;
            $query = mysqli_query($conn, "SELECT * FROM janjitemu ");

            $numrow = mysqli_num_rows($query);

            if ($query) {

              if ($numrow != 0) {
                $cnt = 1;

                while ($row = mysqli_fetch_assoc($query)) {
                  echo "
		<tr>
			<td>$cnt</td>
			<td>{$row['nama']}</td>
			<td>{$row['nomatrik']}</td>
			<td>{$row['program']}</td>
			<td>{$row['tahun']}</td>
			<td>{$row['waktu']}</td>
			<td>{$row['tarikh']}</td>
			<td>{$row['notelpen']}</td>
			<td>{$row['status']}</td>
			<td><a href=\"delete.php?id_janjitemu={$row['id_janjitemu']}\"><button class=' btn btn-sm btn-outline-danger' ><i class='fa-solid fa-trash'></i></button></a></td>
      

		</tr>";
                  $cnt++;
                }
              }
            }



            ?>

          </tbody>
        </table>



      </div>


      <!-- Bootstrap JS Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
      <script src="./js/app.js"></script>
      <script>
        $(document).ready(function() {
          $('#example').DataTable();
        });
      </script>




    </div>
    <!--Container Main end-->
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/sidebar.js"></script>

</html>
<?php include(COMPONENTS_DIR . "/footer.php"); ?>