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
$query_rs_caroussel = "SELECT article.idrub_art, article.id_art, article.libelle_art, article.contenu1_art, article.contenu2_art, article.image1_art, article.empty2_art, article.geler_art FROM article WHERE article.idrub_art=1 AND article.id_art IN (1,2,3)  AND article.empty2_art=0 AND article.geler_art=0";
$rs_caroussel = mysql_query($query_rs_caroussel, $sitc) or die(mysql_error());
$row_rs_caroussel = mysql_fetch_assoc($rs_caroussel);
$totalRows_rs_caroussel = mysql_num_rows($rs_caroussel);

mysql_select_db($database_sitc, $sitc);
$query_rs_mission = "SELECT article.idrub_art, article.id_art, article.libelle_art, article.description_art, article.empty2_art, article.geler_art FROM article WHERE article.idrub_art=1 AND article.id_art=4 AND article.empty2_art=0 AND article.geler_art=0";
$rs_mission = mysql_query($query_rs_mission, $sitc) or die(mysql_error());
$row_rs_mission = mysql_fetch_assoc($rs_mission);
$totalRows_rs_mission = mysql_num_rows($rs_mission);

mysql_select_db($database_sitc, $sitc);
$query_rs_competence = "SELECT article.idrub_art, article.id_art, article.libelle_art, article.contenu1_art, article.contenu2_art, article.empty2_art, article.geler_art, article.image1_art, article.texte_art FROM article WHERE article.idrub_art=1 AND article.id_art IN (5,30,31) AND article.empty2_art=0 AND article.geler_art=0";
$rs_competence = mysql_query($query_rs_competence, $sitc) or die(mysql_error());
$row_rs_competence = mysql_fetch_assoc($rs_competence);
$totalRows_rs_competence = mysql_num_rows($rs_competence);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Southern It Consulting</title>
    <link rel="stylesheet" href="styles/css/accueil.css">
    <link rel="stylesheet" href="styles/css/navbar.css">
    <link rel="stylesheet" href="styles/css/footer.css">
</head>
<body>
    <?php include("header.php") ?>
    <!--------------------BANNIERE------------------->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    
                    <div class="carousel-inner">
                        <?php do { ?>
                          <div class="carousel-item carousel-banner active">
                            <img src="res/<?php echo $row_rs_caroussel['image1_art']; ?>" class="img-carousel" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <div class="banniere-content row">
                                <div class="col-md-10">
                                  <div class="banniere-right row">
                                    <div class="banniere-right-top col-md-12">
                                      <div class="banner-title"> <?php echo $row_rs_caroussel['libelle_art']; ?></div>
                                        <div class="title-ligne">
                                            <div class="ligne-banner"></div>
                                        </div>
                                        <div class="expertise"><?php echo $row_rs_caroussel['contenu1_art']; ?></div>
                                      </div>
                                      <div class="banniere-right-bottom col-md-12">
                                          <a href="master.php?page=apropos"><button type="button" class="btn btn-banniere"> <?php echo $row_rs_caroussel['contenu2_art']; ?></button></a>                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-2"></div>
                                </div>
                              </div>
                              </div>
                          <?php } while ($row_rs_caroussel = mysql_fetch_assoc($rs_caroussel)); ?>
                          </div>
                          
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--+++++++++++++++++++++ MAIN +++++++++++++++++++++-->
    <div class="container">
        <!-----------MISSION------------->  
        <section class="section-mission">  
            <div class="row">
                <div class="col md-12">
                    <h3><div class="mission-title"><?php echo $row_rs_mission['libelle_art']; ?></div></h3>
                    <div class="ligne-mission"></div>
                    <div class="mission-texte">
                        <?php echo $row_rs_mission['description_art']; ?>
                    </div>
                </div>
            </div>
        </section>
        <!----------------------COMPETENCES---------------------> 
        <section class="competences-section"> 
            <div class="competence-row row">
                <div class="col-md-12">
                    <div class="competence-title--parent">
                        <h3><div class="competence-title"><?php echo $row_rs_competence['libelle_art']; ?></div></h3>
                    </div>
                    <div class="ligne-competence--parent">
                        <div class="ligne-competence"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php do { ?>
                  <div class="col-md-4 card-competence">
                    <div class="icon-competence">
                    <i class="<?php echo $row_rs_competence['texte_art']; ?>"></i>
                    </div>
                      <div class="competence-name"> <?php echo $row_rs_competence['contenu1_art']; ?></div>
                      <div class="contact-competence">
                        <a href="master.php?page=services"><button type="button" class="btn btn-competence"><?php echo $row_rs_competence['contenu2_art']; ?></button></a>                      </div>
                      </div>
                  <?php } while ($row_rs_competence = mysql_fetch_assoc($rs_competence)); ?>
                  </div>
        </section>
    </div>
    <!--------------------- FOOTER ---------------->
     <?php include("footer.php") ?>
    <script src="styles/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
<?php
mysql_free_result($rs_caroussel);

mysql_free_result($rs_mission);

mysql_free_result($rs_competence);
?>