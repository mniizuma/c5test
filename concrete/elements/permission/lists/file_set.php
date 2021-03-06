<?php	 defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php	 $cat = PermissionKeyCategory::getByHandle('file_set');?>

<table class="ccm-permission-grid">
<?php	
$permissions = PermissionKey::getList('file_set');

foreach($permissions as $pk) { 
	$pk->setPermissionObject($fs);
	?>
	<tr>
	<td class="ccm-permission-grid-name" id="ccm-permission-grid-name-<?php	echo $pk->getPermissionKeyID()?>"><strong><a dialog-title="<?php	echo tc('PermissionKeyName', $pk->getPermissionKeyName())?>" data-pkID="<?php	echo $pk->getPermissionKeyID()?>" data-paID="<?php	echo $pk->getPermissionAccessID()?>" onclick="ccm_permissionLaunchDialog(this)" href="javascript:void(0)"><?php	echo tc('PermissionKeyName', $pk->getPermissionKeyName())?></a></strong></td>
	<td id="ccm-permission-grid-cell-<?php	echo $pk->getPermissionKeyID()?>" class="ccm-permission-grid-cell"><?php	echo Loader::element('permission/labels', array('pk' => $pk))?></td>
</tr>
<?php	 } ?>
<tr>
	<td class="ccm-permission-grid-name" ></td>
	<td>
	<?php	echo Loader::element('permission/clipboard', array('pkCategory' => $cat))?>
	</td>
</tr>

</table>


	<script type="text/javascript">
	ccm_permissionLaunchDialog = function(link) {
		jQuery.fn.dialog.open({
			title: $(link).attr('dialog-title'),
			href: '<?php	echo REL_DIR_FILES_TOOLS_REQUIRED?>/permissions/dialogs/file_set?fsID=<?php	echo $fs->getFileSetID()?>&pkID=' + $(link).attr('data-pkID') + '&paID=' + $(link).attr('data-paID'),
			modal: false,
			width: 500,
			height: 380
		});		
	}
	</script>
