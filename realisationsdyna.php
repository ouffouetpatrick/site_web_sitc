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
$query_rs_realisations = "SELECT article.id_art, article.idrub_art, article.libelle_art, article.contenu1_art, article.contenu2_art, article.texte_lien_art, article.image1_art FROM article WHERE article.idrub_art=4 AND article.id_art IN (11,40,41,42,43,44) AND article.empty2_art=0 AND article.geler_art=0";
$rs_realisations = mysql_query($query_rs_realisations, $sitc) or die(mysql_error());
$row_rs_realisations = mysql_fetch_assoc($rs_realisations);
$totalRows_rs_realisations = mysql_num_rows($rs_realisations);
?>
    <!---------INDICATION PAGE---------->
    <div class="container-fluid">
        <div class="row">
            <div class="indication-page col-md-12">
                <div class="accueil"> <a href="index.php">accueil</a> </div>
                <span><i class="uil uil-angle-right"></i></span>
                <div class="page-actuel">Nos réalisations</div>
            </div>
        </div>
    </div>
    <div class="container realisations">
        <div class="row realisations-bloc-title">
            <div class="col-md-12 ">
                <h3><div class="realisation-title">Nos realisations</div></h3>
                <div class="ligne-realisation-content">
                    <div class="ligne-realisation"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="realisation-texte">
                    Nous accompagnons aux mieux nos clients dans l'élaboration de leurs projets digitaux. <br>
                    Voici une liste non exhaustive de nos réalisations.
                </div>
            </div>
        </div>
    </div>
    <!-------------Nos réalisations------------->
    <div class="container realisation-container">
        <div class="row">
            <div class="col-md-12">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php do { ?>
                      <div class="col">
                        <div class="card card-projet">
                          <img src="res/<?php echo $row_rs_realisations['image1_art']; ?>" class="card-img-top" alt="...">
                          <div class="card-body text-center">
                            <a href="master.php?page=<?php echo $row_rs_realisations['texte_lien_art']; ?>">
<button type="button" class="btn btn-card-projet">
                                <?php echo $row_rs_realisations['contenu2_art']; ?>                              </button>
                              </a>                          </div>
                        </div>
                          </div>
                      <?php } while ($row_rs_realisations = mysql_fetch_assoc($rs_realisations)); ?></div>
            </div>
        </div>
    </div>
    <!-------------Popup-------------->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data collector Energie</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Le Client</h5>
                                <div class="ligne-client"></div>
                                <p>Lorem ipsum dolor sit amet.</p>
                                <h5>Le Projet</h5>
                                <div class="ligne-client"></div>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                                    Eos eaque iure voluptas accusantium nemo animi iusto, harum 
                                    consequatur quidem dolores sit ipsam quisquam et velit vitae 
                                    soluta distinctio itaque consequuntur?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-ferme" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-details"><a href="https://budget.gouv.ci/accueil.html">Lien vers le projet</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------- FOOTER ---------------->
    <?php
mysql_free_result($rs_realisations);
?>
    