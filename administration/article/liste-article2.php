<?php require_once('../../Connections/sitc.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_sitc = new KT_connection($sitc, $database_sitc);

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

// Filter
$tfi_listrs_article6 = new TFI_TableFilter($conn_sitc, "tfi_listrs_article6");
$tfi_listrs_article6->addColumn("libelle_art", "STRING_TYPE", "libelle_art", "%");
$tfi_listrs_article6->addColumn("contenu1_art", "STRING_TYPE", "contenu1_art", "%");
$tfi_listrs_article6->addColumn("contenu2_art", "STRING_TYPE", "contenu2_art", "%");
$tfi_listrs_article6->addColumn("contenu3_art", "STRING_TYPE", "contenu3_art", "%");
$tfi_listrs_article6->addColumn("texte_art", "STRING_TYPE", "texte_art", "%");
$tfi_listrs_article6->addColumn("description_art", "STRING_TYPE", "description_art", "%");
$tfi_listrs_article6->addColumn("texte_lien_art", "STRING_TYPE", "texte_lien_art", "%");
$tfi_listrs_article6->addColumn("image1_art", "STRING_TYPE", "image1_art", "%");
$tfi_listrs_article6->addColumn("image2_art", "STRING_TYPE", "image2_art", "%");
$tfi_listrs_article6->addColumn("image3_art", "STRING_TYPE", "image3_art", "%");
$tfi_listrs_article6->addColumn("image4_art", "STRING_TYPE", "image4_art", "%");
$tfi_listrs_article6->addColumn("image5_art", "STRING_TYPE", "image5_art", "%");
$tfi_listrs_article6->addColumn("empty2_art", "CHECKBOX_1_0_TYPE", "empty2_art", "%");
$tfi_listrs_article6->Execute();

// Sorter
$tso_listrs_article6 = new TSO_TableSorter("rs_article", "tso_listrs_article6");
$tso_listrs_article6->addColumn("libelle_art");
$tso_listrs_article6->addColumn("contenu1_art");
$tso_listrs_article6->addColumn("contenu2_art");
$tso_listrs_article6->addColumn("contenu3_art");
$tso_listrs_article6->addColumn("texte_art");
$tso_listrs_article6->addColumn("description_art");
$tso_listrs_article6->addColumn("texte_lien_art");
$tso_listrs_article6->addColumn("image1_art");
$tso_listrs_article6->addColumn("image2_art");
$tso_listrs_article6->addColumn("image3_art");
$tso_listrs_article6->addColumn("image4_art");
$tso_listrs_article6->addColumn("image5_art");
$tso_listrs_article6->addColumn("empty2_art");
$tso_listrs_article6->setDefault("libelle_art DESC");
$tso_listrs_article6->Execute();

// Navigation
$nav_listrs_article6 = new NAV_Regular("nav_listrs_article6", "rs_article", "../../", $_SERVER['PHP_SELF'], 13);// Filter
$tfi_listrs_article6 = new TFI_TableFilter($conn_sitc, "tfi_listrs_article6");
$tfi_listrs_article6->addColumn("libelle_art", "STRING_TYPE", "libelle_art", "%");
$tfi_listrs_article6->addColumn("contenu1_art", "STRING_TYPE", "contenu1_art", "%");
$tfi_listrs_article6->addColumn("contenu2_art", "STRING_TYPE", "contenu2_art", "%");
$tfi_listrs_article6->addColumn("contenu3_art", "STRING_TYPE", "contenu3_art", "%");
$tfi_listrs_article6->addColumn("texte_art", "STRING_TYPE", "texte_art", "%");
$tfi_listrs_article6->addColumn("description_art", "STRING_TYPE", "description_art", "%");
$tfi_listrs_article6->addColumn("texte_lien_art", "STRING_TYPE", "texte_lien_art", "%");
$tfi_listrs_article6->addColumn("image1_art", "STRING_TYPE", "image1_art", "%");
$tfi_listrs_article6->addColumn("image2_art", "STRING_TYPE", "image2_art", "%");
$tfi_listrs_article6->addColumn("image3_art", "STRING_TYPE", "image3_art", "%");
$tfi_listrs_article6->addColumn("image4_art", "STRING_TYPE", "image4_art", "%");
$tfi_listrs_article6->addColumn("image5_art", "STRING_TYPE", "image5_art", "%");
$tfi_listrs_article6->addColumn("empty2_art", "CHECKBOX_1_0_TYPE", "empty2_art", "%");
$tfi_listrs_article6->Execute();

// Sorter
$tso_listrs_article6 = new TSO_TableSorter("rs_article", "tso_listrs_article6");
$tso_listrs_article6->addColumn("libelle_art");
$tso_listrs_article6->addColumn("contenu1_art");
$tso_listrs_article6->addColumn("contenu2_art");
$tso_listrs_article6->addColumn("contenu3_art");
$tso_listrs_article6->addColumn("texte_art");
$tso_listrs_article6->addColumn("description_art");
$tso_listrs_article6->addColumn("texte_lien_art");
$tso_listrs_article6->addColumn("image1_art");
$tso_listrs_article6->addColumn("image2_art");
$tso_listrs_article6->addColumn("image3_art");
$tso_listrs_article6->addColumn("image4_art");
$tso_listrs_article6->addColumn("image5_art");
$tso_listrs_article6->addColumn("empty2_art");
$tso_listrs_article6->setDefault("libelle_art DESC");
$tso_listrs_article6->Execute();

// Navigation
$nav_listrs_article6 = new NAV_Regular("nav_listrs_article6", "rs_article", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rs_article = $_SESSION['max_rows_nav_listrs_article6'];
$pageNum_rs_article = 0;
if (isset($_GET['pageNum_rs_article'])) {
  $pageNum_rs_article = $_GET['pageNum_rs_article'];
}
$startRow_rs_article = $pageNum_rs_article * $maxRows_rs_article;

$colname_rs_article = "-1";
if (isset($_GET['idrub_art'])) {
  $colname_rs_article = $_GET['idrub_art'];
}
// Defining List Recordset variable
$NXTFilter_rs_article = "1=1";
if (isset($_SESSION['filter_tfi_listrs_article6'])) {
  $NXTFilter_rs_article = $_SESSION['filter_tfi_listrs_article6'];
}
// Defining List Recordset variable
$NXTSort_rs_article = "libelle_art";
if (isset($_SESSION['sorter_tso_listrs_article6'])) {
  $NXTSort_rs_article = $_SESSION['sorter_tso_listrs_article6'];
}
mysql_select_db($database_sitc, $sitc);

$query_rs_article = sprintf("SELECT * FROM article WHERE idrub_art = %s AND  {$NXTFilter_rs_article} AND  {$NXTFilter_rs_article} AND  {$NXTFilter_rs_article}   AND  geler_art=0 ORDER BY {$NXTSort_rs_article} ", GetSQLValueString($colname_rs_article, "int"));
$query_limit_rs_article = sprintf("%s LIMIT %d, %d", $query_rs_article, $startRow_rs_article, $maxRows_rs_article);
$rs_article = mysql_query($query_limit_rs_article, $sitc) or die(mysql_error());
$row_rs_article = mysql_fetch_assoc($rs_article);

if (isset($_GET['totalRows_rs_article'])) {
  $totalRows_rs_article = $_GET['totalRows_rs_article'];
} else {
  $all_rs_article = mysql_query($query_rs_article);
  $totalRows_rs_article = mysql_num_rows($all_rs_article);
}
$totalPages_rs_article = ceil($totalRows_rs_article/$maxRows_rs_article)-1;
//End NeXTenesio3 Special List Recordset//NeXTenesio3 Special List Recordset
$maxRows_rs_article = $_SESSION['max_rows_nav_listrs_article6'];
$pageNum_rs_article = 0;
if (isset($_GET['pageNum_rs_article'])) {
  $pageNum_rs_article = $_GET['pageNum_rs_article'];
}
$startRow_rs_article = $pageNum_rs_article * $maxRows_rs_article;

$colname_rs_article = "-1";
if (isset($_GET['idrub_art'])) {
  $colname_rs_article = $_GET['idrub_art'];
}
// Defining List Recordset variable
$NXTFilter_rs_article = "1=1";
if (isset($_SESSION['filter_tfi_listrs_article6'])) {
  $NXTFilter_rs_article = $_SESSION['filter_tfi_listrs_article6'];
}
// Defining List Recordset variable
$NXTSort_rs_article = "libelle_art";
if (isset($_SESSION['sorter_tso_listrs_article6'])) {
  $NXTSort_rs_article = $_SESSION['sorter_tso_listrs_article6'];
}
mysql_select_db($database_sitc, $sitc);

$query_rs_article = sprintf("SELECT * FROM article WHERE idrub_art = %s AND  {$NXTFilter_rs_article} AND  {$NXTFilter_rs_article} AND  {$NXTFilter_rs_article}   AND  geler_art=0 ORDER BY {$NXTSort_rs_article} ", GetSQLValueString($colname_rs_article, "int"));
$query_limit_rs_article = sprintf("%s LIMIT %d, %d", $query_rs_article, $startRow_rs_article, $maxRows_rs_article);
$rs_article = mysql_query($query_limit_rs_article, $sitc) or die(mysql_error());
$row_rs_article = mysql_fetch_assoc($rs_article);

if (isset($_GET['totalRows_rs_article'])) {
  $totalRows_rs_article = $_GET['totalRows_rs_article'];
} else {
  $all_rs_article = mysql_query($query_rs_article);
  $totalRows_rs_article = mysql_num_rows($all_rs_article);
}
$totalPages_rs_article = ceil($totalRows_rs_article/$maxRows_rs_article)-1;
//End NeXTenesio3 Special List Recordset//NeXTenesio3 Special List Recordset
$maxRows_rs_article = $_SESSION['max_rows_nav_listrs_article6'];
$pageNum_rs_article = 0;
if (isset($_GET['pageNum_rs_article'])) {
  $pageNum_rs_article = $_GET['pageNum_rs_article'];
}
$startRow_rs_article = $pageNum_rs_article * $maxRows_rs_article;

$colname_rs_article = "-1";
if (isset($_GET['idrub_art'])) {
  $colname_rs_article = $_GET['idrub_art'];
}
mysql_select_db($database_sitc, $sitc);

$query_rs_article = sprintf("SELECT * FROM article WHERE idrub_art = %s AND  {$NXTFilter_rs_article} AND  {$NXTFilter_rs_article} AND  {$NXTFilter_rs_article}   AND  geler_art=0 ORDER BY {$NXTSort_rs_article} ", GetSQLValueString($colname_rs_article, "int"));
$query_limit_rs_article = sprintf("%s LIMIT %d, %d", $query_rs_article, $startRow_rs_article, $maxRows_rs_article);
$rs_article = mysql_query($query_limit_rs_article, $sitc) or die(mysql_error());
$row_rs_article = mysql_fetch_assoc($rs_article);

if (isset($_GET['totalRows_rs_article'])) {
  $totalRows_rs_article = $_GET['totalRows_rs_article'];
} else {
  $all_rs_article = mysql_query($query_rs_article);
  $totalRows_rs_article = mysql_num_rows($all_rs_article);
}
$totalPages_rs_article = ceil($totalRows_rs_article/$maxRows_rs_article)-1;
//End NeXTenesio3 Special List Recordset

$colname_rs_libelle_rubrique = "-1";
if (isset($_GET['idrub_art'])) {
  $colname_rs_libelle_rubrique = $_GET['idrub_art'];
}
mysql_select_db($database_sitc, $sitc);
$query_rs_libelle_rubrique = sprintf("SELECT * FROM rubrique WHERE id_rub = %s", GetSQLValueString($colname_rs_libelle_rubrique, "int"));
$rs_libelle_rubrique = mysql_query($query_rs_libelle_rubrique, $sitc) or die(mysql_error());
$row_rs_libelle_rubrique = mysql_fetch_assoc($rs_libelle_rubrique);
$totalRows_rs_libelle_rubrique = mysql_num_rows($rs_libelle_rubrique);

$nav_listrs_article6->checkBoundries();

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: false,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: false,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: false,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_libelle_art {width:140px; overflow:hidden;}
  .KT_col_contenu1_art {width:140px; overflow:hidden;}
  .KT_col_contenu2_art {width:140px; overflow:hidden;}
  .KT_col_contenu3_art {width:140px; overflow:hidden;}
  .KT_col_texte_art {width:140px; overflow:hidden;}
  .KT_col_description_art {width:140px; overflow:hidden;}
  .KT_col_texte_lien_art {width:140px; overflow:hidden;}
  .KT_col_image1_art {width:140px; overflow:hidden;}
  .KT_col_image2_art {width:140px; overflow:hidden;}
  .KT_col_image3_art {width:140px; overflow:hidden;}
  .KT_col_image4_art {width:140px; overflow:hidden;}
  .KT_col_image5_art {width:140px; overflow:hidden;}
  .KT_col_empty2_art {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div>
  <div class="KT_tng" id="listrs_article6">
    <h1> <?php echo $row_rs_libelle_rubrique['libelle_rub']; ?>
      <?php
  $nav_listrs_article6->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
    </h1>
    <div class="KT_tnglist">
      <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
        <div class="KT_options"> <a href="<?php echo $nav_listrs_article6->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
          <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listrs_article6'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listrs_article6']; ?>
            <?php 
  // else Conditional region1
  } else { ?>
            <?php echo NXT_getResource("all"); ?>
            <?php } 
  // endif Conditional region1
?>
              <?php echo NXT_getResource("records"); ?></a> &nbsp;
          &nbsp;
                <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listrs_article6'] == 1) {
?>
                  <a href="<?php echo $tfi_listrs_article6->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
<a href="<?php echo $tfi_listrs_article6->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?><a>
<?php } 
  // endif Conditional region2
?>&nbsp;
<a href="../master.php?page=corbeille-article&amp;idrub_art=<?php echo $_GET['idrub_art']; ?>" style="color:red">Corbeille</a>
</div>
        

          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <thead>
              <tr class="KT_row_order">
                <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>                </th>
                <th id="libelle_art" class="KT_sorter KT_col_libelle_art <?php echo $tso_listrs_article6->getSortIcon('libelle_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('libelle_art'); ?>">Libelle</a> </th>

<th id="contenu1_art" class="KT_sorter KT_col_contenu1_art <?php echo $tso_listrs_article6->getSortIcon('contenu1_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('contenu1_art'); ?>">Contenu1</a> </th>


                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 1 || @$_GET['idrub_art'] == 3 || @$_GET['idrub_art'] == 4) {
?>
<th id="contenu2_art" class="KT_sorter KT_col_contenu2_art <?php echo $tso_listrs_article6->getSortIcon('contenu2_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('contenu2_art'); ?>">Contenu2</a> </th>
<?php } 
// endif Conditional region4
?>

                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 3) {
?>
<th id="contenu3_art" class="KT_sorter KT_col_contenu3_art <?php echo $tso_listrs_article6->getSortIcon('contenu3_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('contenu3_art'); ?>">Contenu3</a> </th>
<?php } 
// endif Conditional region4
?>

                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 1) {
?>
<th id="texte_art" class="KT_sorter KT_col_texte_art <?php echo $tso_listrs_article6->getSortIcon('texte_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('texte_art'); ?>">Texte</a> </th>
<?php } 
// endif Conditional region4
?>

                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] != 10) {
?>
<th id="description_art" class="KT_sorter KT_col_description_art <?php echo $tso_listrs_article6->getSortIcon('description_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('description_art'); ?>">Description</a> </th>
<?php } 
// endif Conditional region4
?>

                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] > 11) {
?>
<th id="texte_lien_art" class="KT_sorter KT_col_texte_lien_art <?php echo $tso_listrs_article6->getSortIcon('texte_lien_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('texte_lien_art'); ?>">Texte_lien</a> </th>
<?php } 
// endif Conditional region4
?>

                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] != 10) {
?>
<th id="image1_art" class="KT_sorter KT_col_image1_art <?php echo $tso_listrs_article6->getSortIcon('image1_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('image1_art'); ?>">Image1</a> </th>
<?php } 
// endif Conditional region4
?>

                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 3 || @$_GET['idrub_art'] == 4) {
?>
<th id="image2_art" class="KT_sorter KT_col_image2_art <?php echo $tso_listrs_article6->getSortIcon('image2_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('image2_art'); ?>">Image2</a> </th>
<?php } 
// endif Conditional region4
?>

                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 4) {
?>
<th id="image3_art" class="KT_sorter KT_col_image3_art <?php echo $tso_listrs_article6->getSortIcon('image3_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('image3_art'); ?>">Image3</a> </th>
<?php } 
// endif Conditional region4
?>

                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] != 4) {
?>
<th id="image4_art" class="KT_sorter KT_col_image4_art <?php echo $tso_listrs_article6->getSortIcon('image4_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('image4_art'); ?>">Image4</a> </th>
<?php } 
// endif Conditional region4
?>

                <th id="empty2_art" class="KT_sorter KT_col_empty2_art <?php echo $tso_listrs_article6->getSortIcon('empty2_art'); ?>"> <a href="<?php echo $tso_listrs_article6->getSortLink('empty2_art'); ?>">Statut</a> </th>
                <th>&nbsp;</th>
              </tr>
              <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listrs_article6'] == 1) {
?>
              <tr class="KT_row_filter">
                <td>&nbsp;</td>
                  <td><input type="text" name="tfi_listrs_article6_libelle_art" id="tfi_listrs_article6_libelle_art" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listrs_article6_libelle_art']); ?>" size="20" maxlength="50" /></td>

<td><input type="text" name="tfi_listrs_article6_contenu1_art" id="tfi_listrs_article6_contenu1_art" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listrs_article6_contenu1_art']); ?>" size="20" maxlength="255" /></td>


                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 1 || @$_GET['idrub_art'] == 3 || @$_GET['idrub_art'] == 4) {
?>
<td><input type="text" name="tfi_listrs_article6_contenu2_art" id="tfi_listrs_article6_contenu2_art" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listrs_article6_contenu2_art']); ?>" size="20" maxlength="255" /></td>
<?php } 
// endif Conditional region4
?>

                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 3 || @$_GET['idrub_art'] == 4) {
?>
<td><input type="text" name="tfi_listrs_article6_contenu3_art" id="tfi_listrs_article6_contenu3_art" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listrs_article6_contenu3_art']); ?>" size="20" maxlength="255" /></td>
<?php } 
// endif Conditional region4
?>

                  <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 1) {
?>
<td><input type="text" name="tfi_listrs_article6_texte_art" id="tfi_listrs_article6_texte_art" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listrs_article6_texte_art']); ?>" size="20" maxlength="100" /></td>
<?php } 
// endif Conditional region4
?>

                  <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] != 10) {
?>
<td><input type="text" name="tfi_listrs_article6_description_art" id="tfi_listrs_article6_description_art" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listrs_article6_description_art']); ?>" size="20" maxlength="100" /></td>
<?php } 
// endif Conditional region4
?>

                <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] > 11) {
?>
<td><input type="text" name="tfi_listrs_article6_texte_lien_art" id="tfi_listrs_article6_texte_lien_art" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listrs_article6_texte_lien_art']); ?>" size="20" maxlength="255" /></td>
<?php } 
// endif Conditional region4
?>

                 <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] != 10) {
?>
<td>&nbsp;</td>
<?php } 
// endif Conditional region4
?>

                 <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 3 || @$_GET['idrub_art'] == 4) {
?>
 <td>&nbsp;</td>
<?php } 
// endif Conditional region4
?>

                 <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 4) {
?>
 <td>&nbsp;</td>
<?php } 
// endif Conditional region4
?>

                  <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] != 4) {
?>
<td>&nbsp;</td>
<?php } 
// endif Conditional region4
?>

                  <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listrs_article6_empty2_art']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listrs_article6_empty2_art" id="tfi_listrs_article6_empty2_art" value="1" /></td>
                  <td><input type="submit" name="tfi_listrs_article6" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
              </tr>
                <?php } 
  // endif Conditional region3
?>
                        </thead>
            <tbody>
              <?php if ($totalRows_rs_article == 0) { // Show if recordset empty ?>
                <tr>
                  <td colspan="14"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                </tr>
                <?php } // Show if recordset empty ?>
              <?php if ($totalRows_rs_article > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                  <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                    <td><input type="checkbox" name="kt_pk_article" class="id_checkbox" value="<?php echo $row_rs_article['id_art']; ?>" />
                        <input type="hidden" name="id_art" class="id_field" value="<?php echo $row_rs_article['id_art']; ?>" />                    </td>
                    <td><div class="KT_col_libelle_art"><?php echo KT_FormatForList($row_rs_article['libelle_art'], 20); ?></div></td>

<td><div class="KT_col_contenu1_art"><?php echo KT_FormatForList($row_rs_article['contenu1_art'], 20); ?></div></td>


                    <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 1 || @$_GET['idrub_art'] == 3 || @$_GET['idrub_art'] == 4) {
?>
<td><div class="KT_col_contenu2_art"><?php echo KT_FormatForList($row_rs_article['contenu2_art'], 20); ?></div></td>
<?php } 
// endif Conditional region4
?>

                    <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 3 || @$_GET['idrub_art'] == 4) {
?>
<td><div class="KT_col_contenu3_art"><?php echo KT_FormatForList($row_rs_article['contenu3_art'], 20); ?></div></td>
<?php } 
// endif Conditional region4
?>

                    <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 1) {
?>
<td><div class="KT_col_texte_art"><?php echo $row_rs_article['texte_art']; ?></div></td>
<?php } 
// endif Conditional region4
?>

                    <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] != 10) {
?>
<td><div class="KT_col_description_art"><?php echo KT_FormatForList($row_rs_article['description_art'], 20); ?></div></td>
<?php } 
// endif Conditional region4
?>

                    <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] > 11) {
?>
<td><div class="KT_col_texte_lien_art"><?php echo KT_FormatForList($row_rs_article['texte_lien_art'], 20); ?></div></td>
<?php } 
// endif Conditional region4
?>

                    <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] != 10) {
?>
 <td><div class="KT_col_image1_art">
   <?php 
// Show If File Exists (region35)
if (tNG_fileExists("../../assets/image/", "{rs_article.image1_art}")) {
?>
     <img src="<?php echo tNG_showDynamicImage("../../", "../../assets/image/", "{rs_article.image1_art}");?>" width="100" height="70"/>
     <?php 
// else File Exists (region35)
} else { ?>
     Aucune image
  <?php } 
// EndIf File Exists (region35)
?></div></td>
<?php } 
// endif Conditional region4
?>

                    <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 3 || @$_GET['idrub_art'] == 4) {
?>
<td><div class="KT_col_image2_art"><?php echo KT_FormatForList($row_rs_article['image2_art'], 20); ?></div></td>
<?php } 
// endif Conditional region4
?>

                    <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] == 4) {
?>
 <td><div class="KT_col_image3_art"><?php echo KT_FormatForList($row_rs_article['image3_art'], 20); ?></div></td>
<?php } 
// endif Conditional region4
?>

                    <?php 
// Show IF Conditional region4 
if (@$_GET['idrub_art'] != 4) {
?>
<td><div class="KT_col_image4_art"><?php echo KT_FormatForList($row_rs_article['image4_art'], 20); ?></div></td>
<?php } 
// endif Conditional region4
?>

                    <td><div class="KT_col_empty2_art">
					<?php 
// Show IF Conditional region34 
if (@$row_rs_article['empty2_art'] == 0) {
?>
					 Publié
					  <?php 
// else Conditional region34
} else { ?>
					  Depublié
  <?php } 
// endif Conditional region34
?>
                    </div></td>
<td>
<a class="" href="../master.php?page=editer-article&amp;id_art=<?php echo $row_rs_article['id_art']; ?>&amp; idrub_art=<?php echo $_GET['idrub_art']; ?>; KT_back=1"><?php echo NXT_getResource("Editer"); ?></a>&nbsp;
<?php
//Show If User Is Logged In (region33)
$isLoggedIn = new tNG_UserLoggedIn($conn_sitc);
//Grand Levels: Level
$isLoggedIn->addLevel("1");
if ($isLoggedIn->Execute()) {
?>
  <a class="" href="../master.php?page=supprimer-article&amp;id_art=<?php echo $row_rs_article['id_art']; ?>&amp;idrub_art=<?php echo $_GET['idrub_art']; ?>; "><?php echo NXT_getResource("Supprimer"); ?></a>
  <?php
}
//End Show If User Is Logged In (region33)
?>&nbsp;
<a class="" href="../master.php?page=detail-article&amp;id_art=<?php echo $row_rs_article['id_art']; ?>"><?php echo NXT_getResource("Détail"); ?></a>&nbsp;</td>
                </tr>
                  <?php } while ($row_rs_article = mysql_fetch_assoc($rs_article)); ?>
                <?php } // Show if recordset not empty ?>
                        </tbody>
                      </table>
<div class="KT_bottomnav">
          <div>
            <?php
            $nav_listrs_article6->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
          </div>
        </div>
<div class="KT_bottombuttons">
<div class="KT_operations"> 
<a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a>
<a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a>
</div>
<span>&nbsp;</span>
  <select name="no_new" id="no_new">
    <option value="1">1</option>
    <option value="3">3</option>
    <option value="6">6</option>
  </select>
<a class="KT_additem_op_link" href="../master.php?page=editer-article&amp;idrub_art=<?php echo $_GET['idrub_art']; ?>&amp;KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> 
</div>
</form>
    </div>
    <br class="clearfixplain" />
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>
<?php
mysql_free_result($rs_article);

mysql_free_result($rs_libelle_rubrique);
?>