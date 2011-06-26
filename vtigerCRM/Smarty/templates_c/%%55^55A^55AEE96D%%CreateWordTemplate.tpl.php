<?php /* Smarty version 2.6.18, created on 2011-06-16 08:10:10
         compiled from CreateWordTemplate.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'CreateWordTemplate.tpl', 16, false),array('modifier', 'vtlib_purify', 'CreateWordTemplate.tpl', 64, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tbody><tr>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopLeft.gif', $this->_tpl_vars['THEME']); ?>
"></td>
        <td class="showPanelBg" style="padding: 10px;" valign="top" width="100%">
<br>
	<div align=center>
	
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'SetMenu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

				<!-- DISPLAY -->
				<table border=0 cellspacing=0 cellpadding=5 width=100% class="settingsSelUITopLine">
				<form action="index.php?module=Settings&action=savewordtemplate" method="post" enctype="multipart/form-data" onsubmit="VtigerJS_DialogBox.block();">
				<input type="hidden" name="return_module" value="Settings">
				<input type="hidden" name="parenttab" value="<?php echo $this->_tpl_vars['PARENTTAB']; ?>
">
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->_tpl_vars['MAX_FILE_SIZE']; ?>
">
				<input type="hidden" name="action">
				<tr>
					<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('mailmarge.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_MODULE_NAME']; ?>
" width="48" height="48" border=0 title="<?php echo $this->_tpl_vars['MOD']['LBL_MODULE_NAME']; ?>
"></td>
					<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <a href="index.php?module=Settings&action=listwordtemplates&parenttab=Settings"><?php echo $this->_tpl_vars['UMOD']['LBL_WORD_TEMPLATES']; ?>
</a> > <?php echo $this->_tpl_vars['UMOD']['LBL_NEW_TEMPLATE']; ?>
 </b></td>
				</tr>
				<tr>
					<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_MAIL_MERGE_DESC']; ?>
</td>
				</tr>
				</table>
				
				<br>
				<table border=0 cellspacing=0 cellpadding=10 width=100% >
				<tr>
				<td>
				
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
					<tr>
						<td class="big"><strong><?php echo $this->_tpl_vars['UMOD']['LBL_NEW_TEMPLATE']; ?>
</strong><br><?php echo $this->_tpl_vars['ERRORFLAG']; ?>
</br></td>
						<td class="small" align=right>
							<input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" type="submit" tabindex="4" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" onclick="this.form.action.value='savewordtemplate'; this.form.parenttab.value='Settings'" class="crmButton small save" />&nbsp;
							&nbsp;<input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" tabindex="5"  onclick="window.history.back();"  type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" class="crmButton small cancel" />
						</td>
					</tr>
					</table>
					
					<table border=0 cellspacing=0 cellpadding=5 width=100% >
					<tr valign="top">
					  <td nowrap class="cellLabel small"><font color="red">*</font><strong><?php echo $this->_tpl_vars['UMOD']['LBL_NEW']; ?>
 <?php echo $this->_tpl_vars['UMOD']['LBL_TEMPLATE_FILE']; ?>
</strong></td>
					  <td class="cellText small"><strong>
					    <input type="file" name="binFile" class="small" onchange="validateFilename(this);" />
					    <input type="hidden" name="binFile_hidden" value="" />
					  </strong></td>
					  </tr>
					<tr>
						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['UMOD']['LBL_DESCRIPTION']; ?>
</strong></td>
						<td class="cellText small" valign=top><textarea name="txtDescription" class=small style="width:90%;height:50px"><?php echo vtlib_purify($_REQUEST['description']); ?>
</textarea></td>
					  </tr>
					<tr>
						<td valign=top class="small cellLabel"><strong><?php echo $this->_tpl_vars['UMOD']['LBL_MODULENAMES']; ?>
</strong></td>
						<td class="cellText small" valign=top>
						<select name="target_module" size=1 class="small" tabindex="3">
						<option value="Leads" <?php echo $this->_tpl_vars['LEADS_SELECTED']; ?>
><?php echo $this->_tpl_vars['APP']['COMBO_LEADS']; ?>
</option>
						<option value="Accounts" <?php echo $this->_tpl_vars['ACCOUNTS_SELECTED']; ?>
><?php echo $this->_tpl_vars['APP']['COMBO_ACCOUNTS']; ?>
</option>
						<option value="Contacts" <?php echo $this->_tpl_vars['CONTACTS_SELECTED']; ?>
><?php echo $this->_tpl_vars['APP']['COMBO_CONTACTS']; ?>
</option>
						<option value="HelpDesk" <?php echo $this->_tpl_vars['HELPDESK_SELECTED']; ?>
><?php echo $this->_tpl_vars['APP']['COMBO_HELPDESK']; ?>
</option>
			                      </select>
						</td>
					  </tr>
					</table>
					<table border=0 cellspacing=0 cellpadding=5 width=100% >
					<tr>
					  <td class="small" nowrap align=right><a href="#top"><?php echo $this->_tpl_vars['APP']['LBL_SCROLL']; ?>
</a></td>
					</tr>
					</table>
				</td>
				</tr>
				</table>
			
			
			
			</td>
			</tr>
			</table>
		</td>
	</tr>
	</form>
	</table>
</div>		
	</td>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
   </tr>
</tbody>
</table>