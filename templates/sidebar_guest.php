<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
// Table dependent on header component
require_once(COMPONENTS_DIR . "/header.php");
// Import sidebar components
require_once(COMPONENTS_DIR . "/sidebar.php");
?>
 <!-- SIDEBAR COMPONENT CONFIGURATION -->
 <script>
     // Sidebar icons
     $(document).ready(function() {
         // Pelajar(sidebar item)
         const linkDataLoginPelajar = {
             url: <?php echo ("'" . PELAJAR_URL . "/login3.php'"); ?>,
             name: 'Login Pelajar',
             icon_class: 'bxs-user',
         };
         const linkLoginPelajar = new NavLink(linkDataLoginPelajar);
         const linkLoginPelajarHTML = linkLoginPelajar.render();

         // Pentadbir(sidebar item)
         const linkDataLoginPentadbir = {
             url: <?php echo ("'" . ADMIN_URL . "/login3.php'"); ?>,
             name: 'Login Pentadbir',
             icon_class: 'bxs-user',
         };
         const linkLoginPentadbir = new NavLink(linkDataLoginPentadbir);
         const linkLoginPentadbirHTML = linkLoginPentadbir.render();

         // Guru(sidebar item)
         const linkDataLoginGuru = {
             url: <?php echo ("'" . GURU_URL . "/login3.php'"); ?>,
             name: 'Login Pensyarah/Warden',
             icon_class: 'bxs-user',
         };
         const linkLoginGuru = new NavLink(linkDataLoginGuru);
         const linkLoginGuruHTML = linkLoginGuru.render();

         // Render all sidebar items
         $(".nav_list").html(linkLoginPentadbirHTML + linkLoginGuruHTML + linkLoginPelajarHTML);
     });
 </script>
 <!-- END SIDEBAR COMPONENT CONFIGURATION -->
