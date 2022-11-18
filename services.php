<?php require_once('Connections/sitc.php'); ?>
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
$query_rs_service1 = "SELECT article.id_art, article.idrub_art, article.libelle_art, article.contenu1_art FROM article WHERE article.idrub_art=3 AND article.id_art=37 AND article.empty2_art=0 AND article.geler_art=0";
$rs_service1 = mysql_query($query_rs_service1, $sitc) or die(mysql_error());
$row_rs_service1 = mysql_fetch_assoc($rs_service1);
$totalRows_rs_service1 = mysql_num_rows($rs_service1);

mysql_select_db($database_sitc, $sitc);
$query_rs_service2 = "SELECT article.id_art, article.idrub_art, article.libelle_art, article.contenu1_art, article.contenu2_art, article.image1_art FROM article WHERE article.idrub_art=3 AND article.id_art IN (38,39,66) AND article.empty2_art=0 AND article.geler_art=0";
$rs_service2 = mysql_query($query_rs_service2, $sitc) or die(mysql_error());
$row_rs_service2 = mysql_fetch_assoc($rs_service2);
$totalRows_rs_service2 = mysql_num_rows($rs_service2);

mysql_select_db($database_sitc, $sitc);
$query_rs_partenaire = "SELECT article.id_art, article.idrub_art, article.libelle_art, article.image1_art FROM article WHERE article.idrub_art=3 AND article.id_art IN (7,8,9,10) AND article.empty2_art=0 AND article.geler_art=0";
$rs_partenaire = mysql_query($query_rs_partenaire, $sitc) or die(mysql_error());
$row_rs_partenaire = mysql_fetch_assoc($rs_partenaire);
$totalRows_rs_partenaire = mysql_num_rows($rs_partenaire);
?>
    <!---------INDICATION PAGE---------->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 indication-page">
                <div class="accueil"> <a href="index.php">accueil</a> </div>
                <span><i class="uil uil-angle-right"></i></span>
                <div class="page-actuel">nos services</div>
            </div>
        </div>
    </div>
    <!-----------------------SERVICES---------------->
    <div class="container nosServices">
        <div class="row">
            <div class="col-md-12 service-parent">
                <h3><div class="service-title"><?php echo $row_rs_service1['libelle_art']; ?></div></h3>
                <div class="ligne-service-parent">
                    <div class="ligne-service"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="services-texte">
                    <?php echo $row_rs_service1['contenu1_art']; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-group">
                    <?php do { ?>
                      <div class="card">
                        <img src="res/<?php echo $row_rs_service2['image1_art']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h4 class="card-title"><?php echo $row_rs_service2['libelle_art']; ?></h4>
                            <p class="card-text">
                              <?php echo $row_rs_service2['contenu1_art']; ?>                            </p>
                          </div>
                          <div class="card-footer">
     <a href="master.php?page=serviceapp&amp;id_art=<?php echo $row_rs_service2['id_art']; ?>">
     <small class="text-muted"><?php echo $row_rs_service2['contenu2_art']; ?></small>
      </a>                          
                          </div>
                      </div>
                      <?php } while ($row_rs_service2 = mysql_fetch_assoc($rs_service2)); ?></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <section class="temoignage">
                <div class="row">
                    <div class="temoignage-title--bloc col-md-12">
                        <div class="temoignage-title"><?php echo $row_rs_partenaire['libelle_art']; ?></div>
                        <div class="ligne-temoignage-parent">
                            <div class="ligne-temoignage"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="partenaire-parent row">
                    <?php do { ?>
                      <div class="card-partenaire col-md-3"> <img src="res/<?php echo $row_rs_partenaire['image1_art']; ?>" alt=""> </div>
                      <?php } while ($row_rs_partenaire = mysql_fetch_assoc($rs_partenaire)); ?></div>
            </div>
        </div>
    </div>
    <!---------------- FOOTER --------------->
    <?php
mysql_free_result($rs_service1);

mysql_free_result($rs_service2);

mysql_free_result($rs_partenaire);
?>
    