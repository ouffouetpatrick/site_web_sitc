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
$query_aproposs1 = "SELECT article.idrub_art, article.id_art, article.libelle_art, article.contenu1_art, article.description_art, article.image1_art FROM article WHERE article.idrub_art=2 AND article.id_art=6 AND article.empty2_art=0 AND article.geler_art=0";
$aproposs1 = mysql_query($query_aproposs1, $sitc) or die(mysql_error());
$row_aproposs1 = mysql_fetch_assoc($aproposs1);
$totalRows_aproposs1 = mysql_num_rows($aproposs1);

mysql_select_db($database_sitc, $sitc);
$query_rs_apropos2 = "SELECT article.idrub_art, article.id_art, article.libelle_art, article.description_art FROM article WHERE article.idrub_art=2 AND article.id_art=36 AND article.empty2_art=0 AND article.geler_art=0";
$rs_apropos2 = mysql_query($query_rs_apropos2, $sitc) or die(mysql_error());
$row_rs_apropos2 = mysql_fetch_assoc($rs_apropos2);
$totalRows_rs_apropos2 = mysql_num_rows($rs_apropos2);
?>
    <!---------INDICATION PAGE---------->
    <div class="container-fluid">
        <div class="row">
            <div class="indication-page col-md-12">
                <div class="accueil"> <a href="index.php">accueil</a> </div>
                <span><i class="uil uil-angle-right"></i></span>
                <div class="page-actuel">a propos de nous</div>
            </div>
        </div>
    </div>
    <!------------------EQUIPE-------------->
    <div class="container">
        <section class="equipe-section">
            <div class="row">
                <div class="equipe-top col-md-12">
                    <h3><div class="nous-sommes"><?php echo $row_aproposs1['libelle_art']; ?></div></h3>
                    <div class="ligne-nous-sommes"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 presentation-sitc">
                            <h4 class="h4-apropos"><?php echo $row_aproposs1['contenu1_art']; ?></h4>
                            <p class="presentation-texte">
                               <?php echo $row_aproposs1['description_art']; ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="aprpos-img">
                                <img src="res/<?php echo $row_aproposs1['image1_art']; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row notreHistoire-parent">
                <div class="col-md-12">
                    <h4><div class="notreHistoire"><?php echo $row_rs_apropos2['libelle_art']; ?></div></h4>
                    <div class="ligne-notreHistoire"></div>
                    <p class="texte-histoire">
                        <?php echo $row_rs_apropos2['description_art']; ?>
                    </p>
                </div>
            </div>
        </section>
    </div>
    <?php
mysql_free_result($aproposs1);

mysql_free_result($rs_apropos2);
?>
    