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
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete1(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../assets/image/");
  $deleteObj->setDbFieldName("image2_art");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete1 trigger

//start Trigger_ImageUpload1 trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload1(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("image2_art");
  $uploadObj->setDbFieldName("image2_art");
  $uploadObj->setFolder("../../assets/image/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload1 trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../assets/image/");
  $deleteObj->setDbFieldName("image1_art");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("image1_art");
  $uploadObj->setDbFieldName("image1_art");
  $uploadObj->setFolder("../../assets/image/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png, webp");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_article = new tNG_multipleInsert($conn_sitc);
$tNGs->addTransaction($ins_article);
// Register triggers
$ins_article->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_article->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_article->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_article->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_article->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$ins_article->setTable("article");
$ins_article->addColumn("idrub_art", "NUMERIC_TYPE", "POST", "idrub_art", "{GET.idrub_art}{GET.id_rub}");
$ins_article->addColumn("libelle_art", "STRING_TYPE", "POST", "libelle_art");
$ins_article->addColumn("contenu1_art", "STRING_TYPE", "POST", "contenu1_art");
$ins_article->addColumn("contenu2_art", "STRING_TYPE", "POST", "contenu2_art");
$ins_article->addColumn("contenu3_art", "STRING_TYPE", "POST", "contenu3_art");
$ins_article->addColumn("texte_art", "STRING_TYPE", "POST", "texte_art");
$ins_article->addColumn("description_art", "STRING_TYPE", "POST", "description_art");
$ins_article->addColumn("texte_lien_art", "STRING_TYPE", "POST", "texte_lien_art");
$ins_article->addColumn("image1_art", "FILE_TYPE", "FILES", "image1_art");
$ins_article->addColumn("image2_art", "FILE_TYPE", "FILES", "image2_art");
$ins_article->addColumn("image3_art", "FILE_TYPE", "FILES", "image3_art");
$ins_article->addColumn("image4_art", "FILE_TYPE", "FILES", "image4_art");
$ins_article->addColumn("image5_art", "FILE_TYPE", "FILES", "image5_art");
$ins_article->addColumn("empty2_art", "CHECKBOX_1_0_TYPE", "POST", "empty2_art", "1");
$ins_article->setPrimaryKey("id_art", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_article = new tNG_multipleUpdate($conn_sitc);
$tNGs->addTransaction($upd_article);
// Register triggers
$upd_article->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_article->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_article->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_article->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_article->registerTrigger("AFTER", "Trigger_ImageUpload1", 97);
// Add columns
$upd_article->setTable("article");
$upd_article->addColumn("idrub_art", "NUMERIC_TYPE", "POST", "idrub_art");
$upd_article->addColumn("libelle_art", "STRING_TYPE", "POST", "libelle_art");
$upd_article->addColumn("contenu1_art", "STRING_TYPE", "POST", "contenu1_art");
$upd_article->addColumn("contenu2_art", "STRING_TYPE", "POST", "contenu2_art");
$upd_article->addColumn("contenu3_art", "STRING_TYPE", "POST", "contenu3_art");
$upd_article->addColumn("texte_art", "STRING_TYPE", "POST", "texte_art");
$upd_article->addColumn("description_art", "STRING_TYPE", "POST", "description_art");
$upd_article->addColumn("texte_lien_art", "STRING_TYPE", "POST", "texte_lien_art");
$upd_article->addColumn("image1_art", "FILE_TYPE", "FILES", "image1_art");
$upd_article->addColumn("image2_art", "FILE_TYPE", "FILES", "image2_art");
$upd_article->addColumn("image3_art", "FILE_TYPE", "FILES", "image3_art");
$upd_article->addColumn("image4_art", "FILE_TYPE", "FILES", "image4_art");
$upd_article->addColumn("image5_art", "FILE_TYPE", "FILES", "image5_art");
$upd_article->addColumn("empty2_art", "CHECKBOX_1_0_TYPE", "POST", "empty2_art");
$upd_article->setPrimaryKey("id_art", "NUMERIC_TYPE", "GET", "id_art");

// Make an instance of the transaction object
$del_article = new tNG_multipleDelete($conn_sitc);
$tNGs->addTransaction($del_article);
// Register triggers
$del_article->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_article->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_article->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_article->registerTrigger("AFTER", "Trigger_FileDelete1", 98);
// Add columns
$del_article->setTable("article");
$del_article->setPrimaryKey("id_art", "NUMERIC_TYPE", "GET", "id_art");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsarticle = $tNGs->getRecordset("article");
$row_rsarticle = mysql_fetch_assoc($rsarticle);
$totalRows_rsarticle = mysql_num_rows($rsarticle);
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
  duplicate_buttons: true,
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
if (@$_GET['id_art'] == "") {
?>
        <?php echo NXT_getResource("Insert_FH"); ?>
        <?php 
// else Conditional region1
} else { ?>
        <?php echo NXT_getResource("Update_FH"); ?>
        <?php } 
// endif Conditional region1
?>
      Article </h1>
    <div class="KT_tngform">
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
        <?php $cnt1 = 0; ?>
        <?php do { ?>
          <?php $cnt1++; ?>
          <?php 
// Show IF Conditional region1 
if (@$totalRows_rsarticle > 1) {
?>
            <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
            <?php } 
// endif Conditional region1
?>
          <table cellpadding="2" cellspacing="0" class="KT_tngtable">
            <tr>
              <td class="KT_th"><label for="libelle_art_<?php echo $cnt1; ?>">Libelle:</label></td>
              <td><input type="text" name="libelle_art_<?php echo $cnt1; ?>" id="libelle_art_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsarticle['libelle_art']); ?>" size="32" maxlength="50" />
                  <?php echo $tNGs->displayFieldHint("libelle_art");?> <?php echo $tNGs->displayFieldError("article", "libelle_art", $cnt1); ?> </td>
            </tr>
 
  
                <?php 
// Show IF Conditional region16 
if (@$_GET['idrub_art'] != 4) {
?>
                  <tr>
                    <td class="KT_th"><label for="contenu1_art_<?php echo $cnt1; ?>">Contenu1:</label></td>
                    <td>
<textarea name="contenu1_art_<?php echo $cnt1; ?>" id="contenu1_art_<?php echo $cnt1; ?>" size="32" maxlength="255" />
<?php echo KT_escapeAttribute($row_rsarticle['contenu1_art']); ?>
    </textarea>
                        <?php echo $tNGs->displayFieldHint("contenu1_art");?> <?php echo $tNGs->displayFieldError("article", "contenu1_art", $cnt1); ?> </td>
                  </tr>
                  <?php } 
// endif Conditional region16
?>


          <?php 
// Show IF Conditional region5 
if (@$_GET['idrub_art'] == 1 || @$_GET['idrub_art']== 3 || @$_GET['idrub_art']== 4) {
?>
                <?php 
// Show IF Conditional region14 
if (@$_GET['idrub_art'] == 1 || @$_GET['idrub_art'] == 3 || @$_GET['idrub_art'] == 4) {
?>
                  <tr>
                    <td class="KT_th"><label for="contenu2_art_<?php echo $cnt1; ?>">Contenu2:</label></td>
                    <td>
                    <textarea name="contenu2_art_<?php echo $cnt1; ?>" id="summernote1" value="" size="32" maxlength="255" />
                    	<?php echo KT_escapeAttribute($row_rsarticle['contenu2_art']); ?>
                    </textarea>
                        <?php echo $tNGs->displayFieldHint("contenu2_art");?> <?php echo $tNGs->displayFieldError("article", "contenu2_art", $cnt1); ?> </td>
                  </tr>
                  <?php } 
// endif Conditional region14
?>
              <?php } 
// endif Conditional region5
?>
<?php 
// Show IF Conditional region6 
if (@$_GET['idrub_art'] == 3) {
?>
                <tr>
                  <td class="KT_th"><label for="contenu3_art_<?php echo $cnt1; ?>">Contenu3:</label></td>
                  <td><textarea name="contenu3_art_<?php echo $cnt1; ?>" id="summernote3" size="32" maxlength="255" />
                  	<?php echo KT_escapeAttribute($row_rsarticle['contenu3_art']); ?>
                  </textarea>
                    <?php echo $tNGs->displayFieldHint("contenu3_art");?> <?php echo $tNGs->displayFieldError("article", "contenu3_art", $cnt1); ?> </td>
              </tr>
                <?php } 
// endif Conditional region6
?>
<?php 
// Show IF Conditional region9 
if (@$_GET['idrub_art'] == 1) {
?>
                  <tr>
                    <td class="KT_th"><label for="texte_art_<?php echo $cnt1; ?>">Texte:</label></td>
                    <td><input type="text" name="texte_art_<?php echo $cnt1; ?>" id="texte_art_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsarticle['texte_art']); ?>" size="32" />
                        <?php echo $tNGs->displayFieldHint("texte_art");?> <?php echo $tNGs->displayFieldError("article", "texte_art", $cnt1); ?> </td>
                  </tr>
                  <?php } 
// endif Conditional region9
?>
     
            <?php 
// Show IF Conditional region7 
if (@$row_rsarticle['idrub_art'] != 10) {
?>
 
                <tr>
                  <td class="KT_th"><label for="description_art_<?php echo $cnt1; ?>">Description:</label></td>
                    <td>
                    <textarea  name="description_art_<?php echo $cnt1; ?>" id="summernote2" value="" size="32" />
						<?php echo KT_escapeAttribute($row_rsarticle['description_art']); ?>
                    </textarea>
                        <?php echo $tNGs->displayFieldHint("description_art");?> <?php echo $tNGs->displayFieldError("article", "description_art", $cnt1); ?> </td>
                  </tr>

<?php } 
// endif Conditional region7
?>
   
                <?php 
// Show IF Conditional region11 
if (@$_GET['idrub_art'] > 11) {
?>
                  <tr>
                    <td class="KT_th"><label for="texte_lien_art_<?php echo $cnt1; ?>">Texte_lien:</label></td>
                    <td><input type="text" name="texte_lien_art_<?php echo $cnt1; ?>" id="texte_lien_art_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsarticle['texte_lien_art']); ?>" size="32" maxlength="255" />
                        <?php echo $tNGs->displayFieldHint("texte_lien_art");?> <?php echo $tNGs->displayFieldError("article", "texte_lien_art", $cnt1); ?> </td>
                  </tr>
                  <?php } 
// endif Conditional region11
?>
            <?php 
// Show IF Conditional region8 
if (@$_GET['idrub_art'] != 10) {
?>
              <tr>
                <td class="KT_th"><label for="image1_art_<?php echo $cnt1; ?>">Image1:</label></td>
                <td><input type="file" name="image1_art_<?php echo $cnt1; ?>" id="image1_art_<?php echo $cnt1; ?>" size="32" />
                    <?php echo $tNGs->displayFieldError("article", "image1_art", $cnt1); ?> </td>
              </tr>
              <?php } 
// endif Conditional region8
?> <?php
if (@$_GET['idrub_art'] == 3 || @$_GET['idrub_art'] == 4) {
?>
            <tr>
              <td class="KT_th"><label for="image2_art_<?php echo $cnt1; ?>">Image2:</label></td>
              <td><input type="file" name="image2_art_<?php echo $cnt1; ?>" id="image2_art_<?php echo $cnt1; ?>" size="32" />
                  <?php echo $tNGs->displayFieldError("article", "image2_art", $cnt1); ?> </td>
            </tr>
                     <?php } 
// endif Conditional region10
?>

                     <?php 
// Show IF Conditional region15 
if (@$_GET['idrub_art'] == 4) {
?>
                       <tr>
                         <td class="KT_th"><label for="image3_art_<?php echo $cnt1; ?>">Image3:</label></td>
                         <td><input type="file" name="image3_art_<?php echo $cnt1; ?>" id="image3_art_<?php echo $cnt1; ?>" size="32" />
                             <?php echo $tNGs->displayFieldError("article", "image3_art", $cnt1); ?> </td>
                       </tr>
                       <?php } 
// endif Conditional region15
?>

            <?php 
// Show IF Conditional region10 
if (@$_GET['idrub_art'] == 4) {
?>
              <tr>
                <td class="KT_th"><label for="image4_art_<?php echo $cnt1; ?>">Image4:</label></td>
                <td><input type="file" name="image4_art_<?php echo $cnt1; ?>" id="image4_art_<?php echo $cnt1; ?>" size="32" />
                    <?php echo $tNGs->displayFieldError("article", "image4_art", $cnt1); ?> </td>
              </tr>
              <?php } 
// endif Conditional region10
?>

              <?php 
// Show IF Conditional region16 
if (@$_GET['idrub_art'] == 4) {
?>
              <tr>
                <td class="KT_th"><label for="image5_art_<?php echo $cnt1; ?>">Image5:</label></td>
                  <td><input type="file" name="image5_art_<?php echo $cnt1; ?>" id="image5_art_<?php echo $cnt1; ?>" size="32" />
                      <?php echo $tNGs->displayFieldError("article", "image5_art", $cnt1); ?> </td>
                </tr>
                <?php } 
// endif Conditional region16
?>

            <tr>
              <td class="KT_th"><label for="empty2_art_<?php echo $cnt1; ?>">Depublier:</label></td>
              <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsarticle['empty2_art']),"1"))) {echo "checked";} ?> type="checkbox" name="empty2_art_<?php echo $cnt1; ?>" id="empty2_art_<?php echo $cnt1; ?>" value="1" />
                  <?php echo $tNGs->displayFieldError("article", "empty2_art", $cnt1); ?> </td>
            </tr>
          </table>
          <input type="hidden" name="kt_pk_article_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsarticle['kt_pk_article']); ?>" />
          <input type="hidden" name="idrub_art_<?php echo $cnt1; ?>" id="idrub_art_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsarticle['idrub_art']); ?>" />
          <?php } while ($row_rsarticle = mysql_fetch_assoc($rsarticle)); ?>
        <div class="KT_bottombuttons">
          <div>
            <?php 
      // Show IF Conditional region1
      if (@$_GET['id_art'] == "") {
      ?>
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
              <?php 
      // else Conditional region1
      } else { ?>
              <div class="KT_operations">
                <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id_art')" />
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
