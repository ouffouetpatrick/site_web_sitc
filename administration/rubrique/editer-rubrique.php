<?php require_once('../../Connections/sitc.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_sitc = new KT_connection($sitc, $database_sitc);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("id_rub", true, "numeric", "", "", "", "");
$formValidation->addField("idrub_rub", true, "numeric", "", "", "", "");
$formValidation->addField("idusrcreation_rub", true, "numeric", "", "", "", "");
$formValidation->addField("libelle_rub", true, "text", "", "", "", "");
$formValidation->addField("description_rub", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../assets/image/");
  $deleteObj->setDbFieldName("image_rub");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("image_rub");
  $uploadObj->setDbFieldName("image_rub");
  $uploadObj->setFolder("../../assets/image/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_rubrique = new tNG_multipleInsert($conn_sitc);
$tNGs->addTransaction($ins_rubrique);
// Register triggers
$ins_rubrique->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_rubrique->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_rubrique->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_rubrique->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_rubrique->setTable("rubrique");
$ins_rubrique->addColumn("id_rub", "NUMERIC_TYPE", "POST", "id_rub", "");
$ins_rubrique->addColumn("idrub_rub", "NUMERIC_TYPE", "POST", "idrub_rub", "5");
$ins_rubrique->addColumn("idusrcreation_rub", "NUMERIC_TYPE", "POST", "idusrcreation_rub", "1");
$ins_rubrique->addColumn("libelle_rub", "STRING_TYPE", "POST", "libelle_rub");
$ins_rubrique->addColumn("description_rub", "STRING_TYPE", "POST", "description_rub");
$ins_rubrique->addColumn("image_rub", "FILE_TYPE", "FILES", "image_rub");
$ins_rubrique->addColumn("empty2_rub", "CHECKBOX_1_0_TYPE", "POST", "empty2_rub", "1");
$ins_rubrique->setPrimaryKey("id_rub", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_rubrique = new tNG_multipleUpdate($conn_sitc);
$tNGs->addTransaction($upd_rubrique);
// Register triggers
$upd_rubrique->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_rubrique->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_rubrique->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_rubrique->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_rubrique->setTable("rubrique");
$upd_rubrique->addColumn("id_rub", "NUMERIC_TYPE", "POST", "id_rub");
$upd_rubrique->addColumn("idrub_rub", "NUMERIC_TYPE", "POST", "idrub_rub");
$upd_rubrique->addColumn("idusrcreation_rub", "NUMERIC_TYPE", "POST", "idusrcreation_rub");
$upd_rubrique->addColumn("libelle_rub", "STRING_TYPE", "POST", "libelle_rub");
$upd_rubrique->addColumn("description_rub", "STRING_TYPE", "POST", "description_rub");
$upd_rubrique->addColumn("image_rub", "FILE_TYPE", "FILES", "image_rub");
$upd_rubrique->addColumn("empty2_rub", "CHECKBOX_1_0_TYPE", "POST", "empty2_rub");
$upd_rubrique->setPrimaryKey("id_rub", "NUMERIC_TYPE", "GET", "id_rub");

// Make an instance of the transaction object
$del_rubrique = new tNG_multipleDelete($conn_sitc);
$tNGs->addTransaction($del_rubrique);
// Register triggers
$del_rubrique->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_rubrique->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_rubrique->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_rubrique->setTable("rubrique");
$del_rubrique->setPrimaryKey("id_rub", "NUMERIC_TYPE", "GET", "id_rub");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsrubrique = $tNGs->getRecordset("rubrique");
$row_rsrubrique = mysql_fetch_assoc($rsrubrique);
$totalRows_rsrubrique = mysql_num_rows($rsrubrique);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>
<div>
  <?php
	echo $tNGs->getErrorMsg();
?>
  <div class="KT_tng">
    <h1>
      <?php 
// Show IF Conditional region1 
if (@$_GET['id_rub'] == "") {
?>
        <?php echo NXT_getResource("Insert_FH"); ?>
        <?php 
// else Conditional region1
} else { ?>
        <?php echo NXT_getResource("Update_FH"); ?>
        <?php } 
// endif Conditional region1
?>
      Rubrique </h1>
    <div class="KT_tngform">
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <?php 
// Show IF Conditional region1 
if (@$totalRows_rsrubrique > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td class="KT_th"><label for="libelle_rub_<?php echo $cnt1; ?>">Libelle:</label></td>
              <td><input type="text" name="libelle_rub_<?php echo $cnt1; ?>" id="libelle_rub_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsrubrique['libelle_rub']); ?>" size="32" maxlength="20" />
                  <?php echo $tNGs->displayFieldHint("libelle_rub");?> <?php echo $tNGs->displayFieldError("rubrique", "libelle_rub", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="KT_th"><label for="description_rub_<?php echo $cnt1; ?>">Description:</label></td>
              <td><input type="text" name="description_rub_<?php echo $cnt1; ?>" id="description_rub_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsrubrique['description_rub']); ?>" size="32" maxlength="20" />
                  <?php echo $tNGs->displayFieldHint("description_rub");?> <?php echo $tNGs->displayFieldError("rubrique", "description_rub", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="KT_th"><label for="image_rub_<?php echo $cnt1; ?>">Image:</label></td>
              <td><input type="file" name="image_rub_<?php echo $cnt1; ?>" id="image_rub_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("rubrique", "image_rub", $cnt1); ?> </td>
            </tr>
            <tr>
              <td class="KT_th"><label for="empty2_rub_<?php echo $cnt1; ?>">Depublier:</label></td>
              <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsrubrique['empty2_rub']),"1"))) {echo "checked";} ?> type="checkbox" name="empty2_rub_<?php echo $cnt1; ?>" id="empty2_rub_<?php echo $cnt1; ?>" value="1" />
                  <?php echo $tNGs->displayFieldError("rubrique", "empty2_rub", $cnt1); ?> </td>
            </tr>
          </table>
          <input type="hidden" name="kt_pk_rubrique_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsrubrique['kt_pk_rubrique']); ?>" />
          <input type="hidden" name="id_rub_<?php echo $cnt1; ?>" id="id_rub_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsrubrique['id_rub']); ?>" />
          <input type="hidden" name="idrub_rub_<?php echo $cnt1; ?>" id="idrub_rub_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsrubrique['idrub_rub']); ?>" />
          <input type="hidden" name="idusrcreation_rub_<?php echo $cnt1; ?>" id="idusrcreation_rub_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsrubrique['idusrcreation_rub']); ?>" />
          <?php } while ($row_rsrubrique = mysql_fetch_assoc($rsrubrique)); ?>
        <div class="KT_bottombuttons">
          <div>
            <?php 
      // Show IF Conditional region1
      if (@$_GET['id_rub'] == "") {
      ?>
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
              <div class="KT_operations">
                <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_rub')" />
              </div>
              <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
              <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
              <?php }
      // endif Conditional region1
      ?>
            <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../../includes/nxt/back.php')" />
          </div>
        </div>
      </form>
    </div>
    <br class="clearfixplain" />
  </div>
  <p>&nbsp;</p>
</div>
</body>
</html>
