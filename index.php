<?php
// Site configuration
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
require_once(COMPONENTS_DIR . "/header.php");
require_once(COMPONENTS_DIR . "/config.php");

// Instansiating DB connection
$dbObj = new Database();
$conn = $dbObj->getConnection();

// Fetch student appointment data from the database
$sql = "SELECT nama, nomatrik, program, tahun, waktu, tarikh, sebab, status FROM janjitemu";
$result = $conn->query($sql);
require_once(TEMPLATES_DIR . "/sidebar_guest.php"); // Guest sidebar
?>
<style>
    /* JANJITEMU TABLE STYLING BEGIN */
    table {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
    /* JANJITEMU TABLE STYLING ENDS */
</style>
<style>
    /* JADUAL STYLING BEGIN */
    /* Change the color of the navigation arrows */
    .slick-next:before,
    .slick-prev:before {
        color: #e15531 !important;
    }

    /* Change the color of the navigation dots */
    .slick-dots li button:before {
        color: #ffff !important;
    }
    /* JADUAL STYLING ENDS */
</style>
<style>
    /* INFO SEMESA STYLING BEGIN */
    .alert{
      color: white;
    }

    .alert.alert-general {
        background: #d9d9d9;
    }

    .alert.alert-help {
        background: #172065;
    }

    .alert.alert-error {
        background: #f6bcc3;
    }

    .alert .close,
    .info-box .close {
        filter: alpha(opacity=100);
        -ms-filter:  "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)""
        -moz-opacity: 1;
        -khtml-opacity: 1;
        opacity: 1;
        font-weight: normal;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
        text-shadow: none;
        float: none;
        position: absolute;
        top: 8px;
        right: 8px;
    }

    .close:before {
        content: "\f00d";
        font-family: FontAwesome;
    }

    .fa {
        color: #fff;
    }
    /* INFO SEMESA STYLING ENDS */
</style>
<section class="vh-100">
    <div class="container py-5 h-100">
        <!--CAROUSEL JADUAL BEGIN-->
        <div class="row d-flex justify content align-items-center h-100">
            <div class="row p-8 m-8 shadow-lg rounded justify-content-center">
                <div class="row p-4 text-center">
                    <h2>Jadual Pensyarah/Warden/Pemandu</h2>
                </div>
                <div class="items col-10">
                    <div><img
                        class="mw-100"
                        data-lazy="<?php echo(IMG_URL."/Jadual/JadualPensyarah.png");?>"></div>
                    <div><img
                        class="mw-100"
                        data-lazy="<?php echo(IMG_URL."/Jadual/JadualPensyarah.png");?>"></div>
                </div>
            </div>
        </div>
        <!--CAROUSEL JADUAL ENDS-->
    </div>
</section>
<section class="vh-100">
    <div class="container py-5 h-100">
        <!--CAROUSEL JADUAL BEGIN-->
        <div class="row d-flex justify content align-items-center h-100">
            <div class="row p-8 m-8 shadow-lg rounded">
                <div class="row p-4 text-center">
                    <h2>Info Semasa</h2>
                </div>
                <div class="container col-10 itemsInfoSemasa">
                    <div class="alert alert-help m-4">
                        <i class="fa fa-info p-4"></i>
                        Selamat Datang Ke <b>e-health</b>
                    </div>
                    <div class="alert alert-help m-4">
                        <i class="fa fa-info p-4"></i>
                        Ini adalah kad notifikasi bagi pengguna
                    </div>
                    <div class="alert alert-help m-4">
                        <i class="fa fa-info p-4"></i>
                        Hmmmmmmmmmmmmmm.................. Updatessssssssssssssss
                    </div>
                </div>
            </div>
        </div>
        <!--CAROUSEL JADUAL ENDS-->
    </div>
</section>
<section class="vh-100 mt-5">
    <div class="container py-5 h-100">
        <div class="row d-flex justify content align-items-center h-100">
            <div class="row p-4 shadow-lg">
                <div class="mb-4 text-center">
                    <h2>Senarai Janji Temu Pelajar</h2>
                    <table id="janjitemuTable" class="p-4">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No Matrik</th>
                                <th>Program</th>
                                <th>Tahun</th>
                                <th>Waktu</th>
                                <th>Tarikh</th>
                                <th>Sebab</th>
                                <th>Keberadaan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["nama"] . "</td>";
                  echo "<td>" . $row["nomatrik"] . "</td>";
                  echo "<td>" . $row["program"] . "</td>";
                  echo "<td>" . $row["tahun"] . "</td>";
                  echo "<td>" . $row["waktu"] . "</td>";
                  echo "<td>" . $row["tarikh"] . "</td>";
                  echo "<td>" . $row["sebab"] . "</td>";
                  echo "<td>" . "Status Keberadaan Pelajar ". "</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='6'>No data available</td></tr>";
              }
              ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // JANJITEMU TABLE BEGIN Add datatble functionality to janjitemu table
    // $(document).ready(function(){
    $(document).ready(function () {
        $("#janjitemuTable").DataTable();
    })
    // JANJITEMU TABLE ENDS
</script>
<script>
    // SLICK CAROUSEL BEGIN Slick for gambar jadual
    $(document).ready(function () {

        $('.items').slick({
            infinite: true,
            lazyLoad: 'ondemand',
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            centerMode: true,
            centerPadding: '60px'
        });

    });
</script>
<script>
    // Slick for info semasa
    $(document).ready(function () {

        $('.itemsInfoSemasa').slick({
            infinite: true,
            lazyLoad: 'ondemand',
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            centerMode: true,
            centerPadding: '60px'
        });

    });
    // SLICK CAROUSEL ENDS
</script>
<?php
// Close the database connection
$conn->close();
?>
<?php require_once(COMPONENTS_DIR . "/footer.php"); ?>