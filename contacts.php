<?php require_once('Connections/sitc.php');?>

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO contacts_cnt (nomprenoms, email, message) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['nomprenoms'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['message'], "text"));

  mysql_select_db($database_sitc, $sitc);
  $Result1 = mysql_query($insertSQL, $sitc) or die(mysql_error());

  $insertGoTo = "master.php?page=contacts";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_sitc, $sitc);
$query_rs_contact = "SELECT article.idrub_art, article.id_art, article.libelle_art, article.contenu1_art FROM article WHERE article.idrub_art=10 AND article.id_art=23 AND article.empty2_art=0 AND article.geler_art=0";
$rs_contact = mysql_query($query_rs_contact, $sitc) or die(mysql_error());
$row_rs_contact = mysql_fetch_assoc($rs_contact);
$totalRows_rs_contact = mysql_num_rows($rs_contact);
?>
    <!---------INDICATION PAGE---------->
    <div class="container-fluid">
        <div class="row">
            <div class="indication-page col-md-12">
                <div class="accueil"> <a href="index.php">accueil</a></div>
                <span><i class="uil uil-angle-right"></i></span>
                <div class="page-actuel">nous contacter</div>
            </div>
        </div>
    </div>
    <!---------------FORMULAIRE------------->
    <div class="container-fluid">
        <section class="formualaire-contacts">
            <div class="row">
                <div class="contacts-title col-md-12">
                    <?php echo $row_rs_contact['libelle_art']; ?>
                </div>
                <div class="ligne-contacts-parent">
                    <div class="ligne-contacts"></div>
                </div>
                <div class="contact-text">
                    <p><?php echo $row_rs_contact['contenu1_art']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="form-bloc-parent col-md-12">
                    <div class="formulaire-bloc row">
                        <div class="col-md-6">
                            <form name="form" action="<?php echo $editFormAction; ?>" method="POST">
                                <div class="mb-3">
                                  <label for="exampleInputText1" class="form-label">Nom et Prénoms *</label>
                                  <input type="text" name="nomprenoms" class="form-control" id="exampleInputText1" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address *</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="name@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Message *</label>
                                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                </div>
                                <div class="form-button">
                                    <button type="submit" class="btn btn-form">Envoyer</button>
                                </div>
                                <input type="hidden" name="MM_insert" value="form" />
                          </form>  
                      </div>
                        <div class="icon-form--parent col-md-6">
                            <div class="icon-form-bloc">
                                <div class="icon-form--content">
                                    <span class="icon-form"><i class="uil uil-calling"></i></span>
                                    <div class="coordonnees-form">+225 0707776707</div>
                                    <span class="icon-form"><i class="uil uil-at"></i></span>
                                    <div class="coordonnees-form">southern.ci@gmail.com</div>
                                    <span class="icon-form"><i class="uil uil-map-marker"></i></span>
                                    <div class="coordonnees-form">Abidjan, Côte d'Ivoire Riviera 2 Rue 18</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 map-form">
                <div id="map-container" class="z-depth-1-half map-container" style="height: 500px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.3824157996114!2d-3.9782204852349783!3d5.358479796113144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1edcfe158cfa5%3A0xc6fd505fe19244c0!2sSOUTHERN%20IT%20CONSULTING!5e0!3m2!1sfr!2sci!4v1664278975037!5m2!1sfr!2sci" 
                        frameborder="0"
                        style="border:0" allowfullscreen>
                    </iframe>
                  </div>
            </div>
        </div>
    </div>
    <!---------------- FOOTER --------------->
    <?php
mysql_free_result($rs_contact);
?>
    