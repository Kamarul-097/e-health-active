<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");

// HANDLER FOR ADMIN LOGIN ATTEMPT START
// DECLARING LGOBAL VARIABLE BEGIN
require_once(COMPONENTS_DIR."/config.php");
$dbObj = new Database();
$conn = $dbObj->getConnection();
// DECLARING LGOBAL VARIABLE ENDS

if(isset($_POST['submit'])){

  $username= mysqli_real_escape_string($conn, $_POST['username']);
  $pass = md5(mysqli_real_escape_string($conn, $_POST['password']));

  $select = mysqli_query($conn, "SELECT * FROM `loginadmin` WHERE  username = '$username' AND password = '$pass'") or die('query failed');
  if(mysqli_num_rows($select) > 0){
     $row = mysqli_fetch_assoc($select);
     $_SESSION['id'] = $row['id'];
     $_SESSION['username'] = $username;
           header("Location: dashboard.php");
         }else{
           $message[] = 'Salah Kata laluan atau Nama Pengguna';
  }
}
// HANDLER FOR ADMIN LOGIN ATTEMPT END
?>

<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once(COMPONENTS_DIR . "/header.php");
require_once(TEMPLATES_DIR . "/sidebar_guest.php");
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Masuk</title>

    <!-- custom css file link <link rel="stylesheet" href="css/style.css">-->
    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <style>
        body {
            background-color: #ffff;
        }
    </style>

</head>
<body>

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div
                        class="card shadow-lg card-registration"
                        style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <img
                                src="img/admin.png"
                                class="rounded mx-auto d-block"
                                witdh="200"
                                height="150">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">LOG MASUK PENTADBIR</h3>

                            <form autocomplete="off" action="login3.php" method="post">

                                <?php
        
        if(isset($message)){
           foreach($message as $message){
              echo '<div class="message alert alert-dark" role="alert">'.$message.'</div>';
           }
          }
        
     ?>

                                <!-- No K/P input -->

                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <input
                                            type="text"
                                            autocomplete="off"
                                            name="username"
                                            class="form-control"
                                            placeholder="Nama Pengguna">
                                        <label for="floatingPassword">Nama Pengguna</label>
                                    </div>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <input
                                            type="password"
                                            id="password"
                                            name="password"
                                            class="form-control"
                                            placeholder="Kata Laluan">
                                        <label class="form-label" for="password">Kata Laluan</label>
                                        <label for="floatingPassword">Kata Laluan</label>
                                        <div class="mt-3">
                                            <input type="checkbox" onclick="myFunction()">&nbsp;Tunjuk Kata Laluan
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="form-outline mb-4">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Log Masuk</button>
                                </div>
                                Kembali&nbsp;<a href="../index.php">Halaman Utama</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/app.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>
</html>
<?php include(COMPONENTS_DIR."/footer.php"); ?>
<?php mysqli_close($conn); ?>