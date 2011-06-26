<?php /* Smarty version 2.6.18, created on 2011-06-15 15:17:43
         compiled from SelectEmail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'SelectEmail.tpl', 23, false),)), $this); ?>
<!-- BEGIN: main -->
<div id="roleLay" style="z-index:12;display:block;width:400px;" class="layerPopup">
	<table border=0 cellspacing=0 cellpadding=5 width=100% class=layerHeadingULine>
		<tr>
			<td width="90%" align="left" class="genHeaderSmall"><?php echo $this->_tpl_vars['MOD']['SELECT_EMAIL']; ?>

				<?php if ($this->_tpl_vars['ONE_RECORD'] != 'true'): ?>
				(<?php echo $this->_tpl_vars['MOD']['LBL_MULTIPLE']; ?>
 <?php echo $this->_tpl_vars['APP'][$this->_tpl_vars['FROM_MODULE']]; ?>
)
				<?php endif; ?>
				&nbsp;
			</td>
			<td width="10%" align="right">
				<a href="javascript:fninvsh('roleLay');"><img title="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE']; ?>
" alt="<?php echo $this->_tpl_vars['APP']['LBL_CLOSE']; ?>
" src="<?php echo vtiger_imageurl('close.gif', $this->_tpl_vars['THEME']); ?>
" border="0"  align="absmiddle" /></a>
			</td>
		</tr>
	</table>
	<table border=0 cellspacing=0 cellpadding=5 width=95% align=center> 
		<tr><td class="small">
			<table border=0 cellspacing=0 cellpadding=5 width=100% align=center bgcolor=white>
				<tr>
					<td align="left">
					<?php if ($this->_tpl_vars['ONE_RECORD'] == 'true'): ?>
						<b><?php echo $this->_tpl_vars['ENTITY_NAME']; ?>
</b> <?php echo $this->_tpl_vars['MOD']['LBL_MAILSELECT_INFO']; ?>
.<br><br>
					<?php else: ?>
						<?php echo $this->_tpl_vars['MOD']['LBL_MAILSELECT_INFO1']; ?>
 <?php echo $this->_tpl_vars['APP'][$this->_tpl_vars['FROM_MODULE']]; ?>
.<?php echo $this->_tpl_vars['MOD']['LBL_MAILSELECT_INFO2']; ?>
<br><br>
					<?php endif; ?>
						<div style="height:120px;overflow-y:auto;overflow-x:hidden;" align="center">
							<table border="0" cellpadding="5" cellspacing="0" width="90%">
								<?php $_from = $this->_tpl_vars['MAILINFO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['emailids'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['emailids']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['fieldid'] => $this->_tpl_vars['elements']):
        $this->_foreach['emailids']['iteration']++;
?>
								<tr>
									<?php if ($this->_foreach['emailids']['iteration'] == 1): ?>	
									<td align="center"><input type="checkbox" checked value="<?php echo $this->_tpl_vars['fieldid']; ?>
" name="semail" /></td>
									<?php else: ?>
									<td align="center"><input type="checkbox" value="<?php echo $this->_tpl_vars['fieldid']; ?>
" name="semail"  /></td>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['PERMIT'] == '0'): ?>
									<?php if ($this->_tpl_vars['ONE_RECORD'] == 'true'): ?>	
									<td align="left"><b><?php echo $this->_tpl_vars['elements']['0']; ?>
</b><br><?php echo $this->_tpl_vars['MAILDATA'][($this->_foreach['emailids']['iteration']-1)]; ?>
</td>
									<?php else: ?>
									<td align="left"><b><?php echo $this->_tpl_vars['elements']['0']; ?>
</b></td>
									<?php endif; ?>
									<?php else: ?>
                                                                        <td align="left"><b><?php echo $this->_tpl_vars['elements']['0']; ?>
</b><br><?php echo $this->_tpl_vars['MAILDATA'][($this->_foreach['emailids']['iteration']-1)]; ?>
</td>
                                                                        <?php endif; ?>
								</tr>
								<?php endforeach; endif; unset($_from); ?>
							</table>
						</div>
					</td>	
				</tr>
			</table>
		</td></tr>
	</table>
	<table border=0 cellspacing=0 cellpadding=5 width=100% class="layerPopupTransport">
		<tr><td align=center class="small">
			<input type="button" name="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
" value=" <?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
 " class="crmbutton small create" onClick="validate_sendmail('<?php echo $this->_tpl_vars['IDLIST']; ?>
','<?php echo $this->_tpl_vars['FROM_MODULE']; ?>
');"/>&nbsp;&nbsp;
			<input type="button" name="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" value=" <?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
 " class="crmbutton small cancel" onclick="fninvsh('roleLay');" />
		</td></tr>
	</table>
</div>