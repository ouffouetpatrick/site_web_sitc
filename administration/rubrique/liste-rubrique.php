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

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

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
$tfi_listrs_rubrique6 = new TFI_TableFilter($conn_sitc, "tfi_listrs_rubrique6");
$tfi_listrs_rubrique6->addColumn("libelle_rub", "STRING_TYPE", "libelle_rub", "%");
$tfi_listrs_rubrique6->addColumn("description_rub", "STRING_TYPE", "description_rub", "%");
$tfi_listrs_rubrique6->addColumn("image_rub", "STRING_TYPE", "image_rub", "%");
$tfi_listrs_rubrique6->addColumn("empty2_rub", "CHECKBOX_1_0_TYPE", "empty2_rub", "%");
$tfi_listrs_rubrique6->Execute();

// Sorter
$tso_listrs_rubrique6 = new TSO_TableSorter("rs_rubrique", "tso_listrs_rubrique6");
$tso_listrs_rubrique6->addColumn("libelle_rub");
$tso_listrs_rubrique6->addColumn("description_rub");
$tso_listrs_rubrique6->addColumn("image_rub");
$tso_listrs_rubrique6->addColumn("empty2_rub");
$tso_listrs_rubrique6->setDefault("libelle_rub");
$tso_listrs_rubrique6->Execute();

// Navigation
$nav_listrs_rubrique6 = new NAV_Regular("nav_listrs_rubrique6", "rs_rubrique", "../../", $_SERVER['PHP_SELF'], 10);

$colname_rs_libelle = "-1";
if (isset($_GET['idrub_rub'])) {
  $colname_rs_libelle = $_GET['idrub_rub'];
}
mysql_select_db($database_sitc, $sitc);
$query_rs_libelle = sprintf("SELECT * FROM rubrique WHERE id_rub = %s", GetSQLValueString($colname_rs_libelle, "int"));
$rs_libelle = mysql_query($query_rs_libelle, $sitc) or die(mysql_error());
$row_rs_libelle = mysql_fetch_assoc($rs_libelle);
$totalRows_rs_libelle = mysql_num_rows($rs_libelle);

$colname_rs_libelle_rubrique = "-1";
if (isset($_GET['idrub_rub'])) {
  $colname_rs_libelle_rubrique = $_GET['idrub_rub'];
}
mysql_select_db($database_sitc, $sitc);
$query_rs_libelle_rubrique = sprintf("SELECT * FROM rubrique WHERE id_rub = %s", GetSQLValueString($colname_rs_libelle_rubrique, "int"));
$rs_libelle_rubrique = mysql_query($query_rs_libelle_rubrique, $sitc) or die(mysql_error());
$row_rs_libelle_rubrique = mysql_fetch_assoc($rs_libelle_rubrique);
$totalRows_rs_libelle_rubrique = mysql_num_rows($rs_libelle_rubrique);

//NeXTenesio3 Special List Recordset
$maxRows_rs_rubrique = $_SESSION['max_rows_nav_listrs_rubrique6'];
$pageNum_rs_rubrique = 0;
if (isset($_GET['pageNum_rs_rubrique'])) {
  $pageNum_rs_rubrique = $_GET['pageNum_rs_rubrique'];
}
$startRow_rs_rubrique = $pageNum_rs_rubrique * $maxRows_rs_rubrique;

$colname_rs_rubrique = "-1";
if (isset($_GET['idrub_rub'])) {
  $colname_rs_rubrique = $_GET['idrub_rub'];
}
// Defining List Recordset variable
$NXTFilter_rs_rubrique = "1=1";
if (isset($_SESSION['filter_tfi_listrs_rubrique6'])) {
  $NXTFilter_rs_rubrique = $_SESSION['filter_tfi_listrs_rubrique6'];
}
// Defining List Recordset variable
$NXTSort_rs_rubrique = "libelle_rub";
if (isset($_SESSION['sorter_tso_listrs_rubrique6'])) {
  $NXTSort_rs_rubrique = $_SESSION['sorter_tso_listrs_rubrique6'];
}
mysql_select_db($database_sitc, $sitc);

$query_rs_rubrique = sprintf("SELECT * FROM rubrique WHERE idrub_rub = %s AND  {$NXTFilter_rs_rubrique} AND rubrique.geler_rub=0 ORDER BY {$NXTSort_rs_rubrique} ", GetSQLValueString($colname_rs_rubrique, "int"));
$query_limit_rs_rubrique = sprintf("%s LIMIT %d, %d", $query_rs_rubrique, $startRow_rs_rubrique, $maxRows_rs_rubrique);
$rs_rubrique = mysql_query($query_limit_rs_rubrique, $sitc) or die(mysql_error());
$row_rs_rubrique = mysql_fetch_assoc($rs_rubrique);

if (isset($_GET['totalRows_rs_rubrique'])) {
  $totalRows_rs_rubrique = $_GET['totalRows_rs_rubrique'];
} else {
  $all_rs_rubrique = mysql_query($query_rs_rubrique);
  $totalRows_rs_rubrique = mysql_num_rows($all_rs_rubrique);
}
$totalPages_rs_rubrique = ceil($totalRows_rs_rubrique/$maxRows_rs_rubrique)-1;
//End NeXTenesio3 Special List Recordset

$nav_listrs_rubrique6->checkBoundries();
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
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_libelle_rub {width:140px; overflow:hidden;}
  .KT_col_description_rub {width:140px; overflow:hidden;}
  .KT_col_image_rub {width:140px; overflow:hidden;}
  .KT_col_empty2_rub {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listrs_rubrique6">
  <h1> <?php echo $row_rs_libelle_rubrique['libelle_rub']; ?>
    <?php
  $nav_listrs_rubrique6->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listrs_rubrique6->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listrs_rubrique6'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listrs_rubrique6']; ?>
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
  if (@$_SESSION['has_filter_tfi_listrs_rubrique6'] == 1) {
?>
                  <a href="<?php echo $tfi_listrs_rubrique6->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listrs_rubrique6->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>&nbsp;
<a href="../master.php?page=corbeille-rubrique&amp;idrub_rub=5" style="color:red">Corbeille</a>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>            </th>
            <th id="libelle_rub" class="KT_sorter KT_col_libelle_rub <?php echo $tso_listrs_rubrique6->getSortIcon('libelle_rub'); ?>"> <a href="<?php echo $tso_listrs_rubrique6->getSortLink('libelle_rub'); ?>">Libelle</a> </th>
            <th id="description_rub" class="KT_sorter KT_col_description_rub <?php echo $tso_listrs_rubrique6->getSortIcon('description_rub'); ?>"> <a href="<?php echo $tso_listrs_rubrique6->getSortLink('description_rub'); ?>">Description</a> </th>
            <th id="image_rub" class="KT_sorter KT_col_image_rub <?php echo $tso_listrs_rubrique6->getSortIcon('image_rub'); ?>"> <a href="<?php echo $tso_listrs_rubrique6->getSortLink('image_rub'); ?>">Image</a> </th>
            <th id="empty2_rub" class="KT_sorter KT_col_empty2_rub <?php echo $tso_listrs_rubrique6->getSortIcon('empty2_rub'); ?>"> <a href="<?php echo $tso_listrs_rubrique6->getSortLink('empty2_rub'); ?>">Statut</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listrs_rubrique6'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listrs_rubrique6_libelle_rub" id="tfi_listrs_rubrique6_libelle_rub" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listrs_rubrique6_libelle_rub']); ?>" size="20" maxlength="20" /></td>
              <td><input type="text" name="tfi_listrs_rubrique6_description_rub" id="tfi_listrs_rubrique6_description_rub" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listrs_rubrique6_description_rub']); ?>" size="20" maxlength="20" /></td>
              <td>&nbsp;</td>
              <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listrs_rubrique6_empty2_rub']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listrs_rubrique6_empty2_rub" id="tfi_listrs_rubrique6_empty2_rub" value="1" /></td>
              <td><input type="submit" name="tfi_listrs_rubrique6" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rs_rubrique == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rs_rubrique > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_rubrique" class="id_checkbox" value="<?php echo $row_rs_rubrique['id_rub']; ?>" />
                    <input type="hidden" name="id_rub" class="id_field" value="<?php echo $row_rs_rubrique['id_rub']; ?>" />                </td>
                <td><div class="KT_col_libelle_rub"><?php echo KT_FormatForList($row_rs_rubrique['libelle_rub'], 20); ?></div></td>
                <td><div class="KT_col_description_rub"><?php echo KT_FormatForList($row_rs_rubrique['description_rub'], 20); ?></div></td>
                <td><div class="KT_col_image_rub">
                  <?php 
// Show If File Exists (region4)
if (tNG_fileExists("../../assets/image/", "{rs_rubrique.image_rub}")) {
?>
                      <img src="<?php echo tNG_showDynamicImage("../../", "../../assets/image/", "{rs_rubrique.image_rub}");?>" width="100" height="70" />
                      <?php 
// else File Exists (region4)
} else { ?>
                   Aucune image
  <?php } 
// EndIf File Exists (region4)
?></div></td>
                <td><?php 
// Show IF Conditional region5 
if (@$row_rs_rubrique['empty2_rub'] == 0) {
?>
                   Publié
                    <?php 
// else Conditional region5
} else { ?>
                   Depublié
  <?php } 
// endif Conditional region5
?></td>
                <td>
<a class="" href="../master.php?page=editer-rubrique&amp;id_rub=<?php echo $row_rs_rubrique['id_rub']; ?>&amp;idrub_rub=<?php echo $row_rs_rubrique['idrub_rub']; ?>"><?php echo NXT_getResource("Editer"); ?></a>&nbsp;
<a class="" href="../master.php?page=supprimer-rubrique&amp;id_rub=<?php echo $row_rs_rubrique['id_rub']; ?>"><?php echo NXT_getResource("Supprimer"); ?></a>&nbsp;
<a class="" href="../master.php?page=liste-article&amp;idrub_art=<?php echo $row_rs_rubrique['id_rub']; ?>"><?php echo NXT_getResource("Article"); ?></a>&nbsp;
                <a class="" href="../master.php?page=detail-rubrique&amp;id_rub=<?php echo $row_rs_rubrique['id_rub']; ?>"><?php echo NXT_getResource("Détail"); ?></a>&nbsp;              
                </td>
              </tr>
              <?php } while ($row_rs_rubrique = mysql_fetch_assoc($rs_rubrique)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listrs_rubrique6->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
<span>&nbsp;</span>
        <select name="no_new" id="no_new">
          <option value="1">1</option>
          <option value="3">3</option>
          <option value="6">6</option>
        </select>
        <a class="KT_additem_op_link" href="../master.php?page=editer-rubrique&amp;idrub_rub=5" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rs_libelle);

mysql_free_result($rs_libelle_rubrique);

mysql_free_result($rs_rubrique);
?>
