<?php require_once('../Connections/sitc.php'); ?>
<?php

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


mysql_select_db($database_sitc, $sitc);
$query_rs_rubrique = "SELECT COUNT( * ) AS nombre_rubbrique FROM `rubrique` WHERE `geler_rub` =0";
$rs_rubrique = mysql_query($query_rs_rubrique, $sitc) or die(mysql_error());
$row_rs_rubrique = mysql_fetch_assoc($rs_rubrique);
$totalRows_rs_rubrique = mysql_num_rows($rs_rubrique);

mysql_select_db($database_sitc, $sitc);
$query_rs_article = "SELECT COUNT( * ) AS nombre_article FROM `article` WHERE `geler_art` =0";
$rs_article = mysql_query($query_rs_article, $sitc) or die(mysql_error());
$row_rs_article = mysql_fetch_assoc($rs_article);
$totalRows_rs_article = mysql_num_rows($rs_article);

mysql_select_db($database_sitc, $sitc);
$query_rs_user = "SELECT COUNT( * ) AS nombre_utisateur FROM `utilisateur_usr`";
$rs_user = mysql_query($query_rs_user, $sitc) or die(mysql_error());
$row_rs_user = mysql_fetch_assoc($rs_user);
$totalRows_rs_user = mysql_num_rows($rs_user);

mysql_select_db($database_sitc, $sitc);
$query_rs_article_publies = "SELECT COUNT( * ) AS nombre_article_publies FROM `article` WHERE `geler_art` =0 AND `empty2_art` =0";
$rs_article_publies = mysql_query($query_rs_article_publies, $sitc) or die(mysql_error());
$row_rs_article_publies = mysql_fetch_assoc($rs_article_publies);
$totalRows_rs_article_publies = mysql_num_rows($rs_article_publies);

mysql_select_db($database_sitc, $sitc);
$query_rs_articles_depublies = "SELECT COUNT( * ) AS nombre_article_depublies FROM `article` WHERE `geler_art` =0 AND `empty2_art` =1";
$rs_articles_depublies = mysql_query($query_rs_articles_depublies, $sitc) or die(mysql_error());
$row_rs_articles_depublies = mysql_fetch_assoc($rs_articles_depublies);
$totalRows_rs_articles_depublies = mysql_num_rows($rs_articles_depublies);

function taux($a,$b){
	return round(($a*100)/$b);
}
?>

<section class="section">
            <div class="row">
                <div class="col-lg-12 card">
                     <div class="jumbotron">
                       <div class="pagetitle">
      <h1 class="mb-5">Tableau de bord</h1>
      <?php /*?><nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
          <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>
      </nav><?php */?>
    </div><!-- End Page Title -->
  <!--<h1 class="display-4">BIENVENUE SUR DATACOLLECTOR !</h1>-->
  <section class="section dashboard">
      <div class="row">
  <div class="col-lg-12">
          <div class="row">
   <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <?php /*?><div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div><?php */?>

                <div class="card-body">
                  <h5 class="card-title">Rubriques <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-list"  style="color:blue;"></i>
                    </div>
                    <div class="ps-3">
                      <h6  style="color:blue;">  <?php echo $row_rs_rubrique['nombre_rubbrique']; ?>  </h6>
                     <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Sales Card -->
                        <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <?php /*?><div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div><?php */?>

                <div class="card-body">
                  <h5 class="card-title">Articles <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-list"  style="color:green;"></i>
                    </div>
                    <div class="ps-3">
                      <h6  style="color:green;"><?php echo $row_rs_article['nombre_article']; ?></h6>
      <!--                <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <?php /*?><div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div><?php */?>

                <div class="card-body">
                  <h5 class="card-title">Utilisateurs <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person" style="color:#041a42"></i>
                    </div>
                    <div class="ps-3">
                      <h6 style="color:purple"><?php echo $row_rs_user['nombre_utisateur']; ?></h6>
      <!--                <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div>

             </div>
                </div>
                
                
                <div class="col-lg-12">
          <div class="row">
   <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <?php /*?><div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div><?php */?>

                <div class="card-body">
                  <h5 class="card-title">Articles publiés <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       <i class="bx bxs-arrow-from-bottom" style="color:#041a42;font-size:40px"></i>
                    </div>
                    <div class="ps-3">
                      <h6 style="color:#041a42">  <?php echo $row_rs_article_publies['nombre_article_publies']; ?> </h6>
                     <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Sales Card -->
                        <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <?php /*?><div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div><?php */?>

                <div class="card-body">
                  <h5 class="card-title">Articles non publiés <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       <i class="bx bxs-arrow-from-top" style="color:orange;font-size:40px"></i>
                    </div>
                    <div class="ps-3">
                      <h6  style="color:orange;"><?php echo $row_rs_articles_depublies['nombre_article_depublies']; ?></h6>
      <!--                <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <?php /*?><div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div><?php */?>

                <div class="card-body">
                  <h5 class="card-title">Taux de publication <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       <i class="bi bi-percent" style="color:green;font-size:40px"></i>
                    </div>
                    <div class="ps-3">
                      <h6  style="color:orange;">
                      <?php echo taux($row_rs_article_publies['nombre_article_publies'],$row_rs_article['nombre_article']) ;?>
                      </h6>
      <!--                <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div>
<!-- End Revenue Card -->
             </div>
                </div>
                
                 </div>
                </section>

   
  <hr class="my-4">

</div>

                </div>


            </div>
</section>
<?php
mysql_free_result($rs_rubrique);

mysql_free_result($rs_article);

mysql_free_result($rs_user);

mysql_free_result($rs_article_publies);

mysql_free_result($rs_articles_depublies);
?>
