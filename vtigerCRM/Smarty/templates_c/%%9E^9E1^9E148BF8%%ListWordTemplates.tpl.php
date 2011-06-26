<?php /* Smarty version 2.6.18, created on 2011-06-14 11:33:52
         compiled from ListWordTemplates.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'ListWordTemplates.tpl', 70, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script>
function massDelete()
{
	if(typeof(document.massdelete.selected_id) == 'undefined')
		return false;
        x = document.massdelete.selected_id.length;
        idstring = "";

        if ( x == undefined)
        {

                if (document.massdelete.selected_id.checked)
               {
                        document.massdelete.idlist.value=document.massdelete.selected_id.value+';';
			xx=1;
                }
                else
                {
                        alert("<?php echo $this->_tpl_vars['APP']['SELECT_ATLEAST_ONE']; ?>
");
                        return false;
                }
        }
        else
        {
                xx = 0;
                for(i = 0; i < x ; i++)
                {
                        if(document.massdelete.selected_id[i].checked)
                        {
                                idstring = document.massdelete.selected_id[i].value +";"+idstring
                        xx++
                        }
                }
                if (xx != 0)
                {
                        document.massdelete.idlist.value=idstring;
                }
               else
                {
                        alert("<?php echo $this->_tpl_vars['APP']['SELECT_ATLEAST_ONE']; ?>
");
                        return false;
                }
       }
		if(confirm("<?php echo $this->_tpl_vars['APP']['DELETE_CONFIRMATION']; ?>
"+xx+"<?php echo $this->_tpl_vars['APP']['RECORDS']; ?>
"))
		{
	        	document.massdelete.action.value= "deletewordtemplate";
		}
		else
		{
			return false;
		}

}
</script>
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
	               		<form  name="massdelete" method="POST" onsubmit="VtigerJS_DialogBox.block();">
	    			<input name="idlist" type="hidden">
    				<input name="module" type="hidden" value="Settings">
    				<input name="parenttab" type="hidden" value="Settings">
    				<input name="action" type="hidden">
				<tr>
					<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('mailmarge.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['MOD']['LBL_MODULE_NAME']; ?>
" width="48" height="48" border=0 title="<?php echo $this->_tpl_vars['MOD']['LBL_MODULE_NAME']; ?>
"></td>
					<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <?php echo $this->_tpl_vars['UMOD']['LBL_WORD_TEMPLATES']; ?>
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
						<td class="big"><strong><?php echo $this->_tpl_vars['UMOD']['LBL_WORD_TEMPLATES']; ?>
</strong></td>
						<td class="small" align=right>&nbsp;
						</td>
					</tr>
					</table>
					
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="listTableTopButtons">
					<tr>
						<td class=small><input type="submit" value="<?php echo $this->_tpl_vars['UMOD']['LBL_DELETE']; ?>
" onclick="return massDelete();" class="crmButton delete small"></td>
						<td class=small align=right><input class="crmButton create small" type="submit" value="<?php echo $this->_tpl_vars['UMOD']['LBL_ADD_TEMPLATE']; ?>
" name="profile"  onclick="this.form.action.value='upload'; this.form.parenttab.value='Settings'">&nbsp;&nbsp;</td>
					</tr>
					</table>
						
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="listTable">
					<tr>
						<td width=2% class="colHeader small">#</td>
						<td width=3% class="colHeader small"><?php echo $this->_tpl_vars['UMOD']['LBL_LIST_SELECT']; ?>
</td>
						<td width=20% class="colHeader small"><?php echo $this->_tpl_vars['UMOD']['LBL_TEMPLATE_FILE']; ?>
</td>
						<td width=50% class="colHeader small"><?php echo $this->_tpl_vars['UMOD']['LBL_DESCRIPTION']; ?>
</td>
				        <td width=15% class="colHeader small"><?php echo $this->_tpl_vars['UMOD']['LBL_MODULENAMES']; ?>
</td>
				        <td width=15% class="colHeader small"><?php echo $this->_tpl_vars['UMOD']['LBL_LIST_TOOLS']; ?>
</td>
			          </tr>
					<?php $_from = $this->_tpl_vars['WORDTEMPLATES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mailmerge'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mailmerge']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['template']):
        $this->_foreach['mailmerge']['iteration']++;
?>
					<tr>
						<td class="listTableRow small" valign=top><?php echo $this->_foreach['mailmerge']['iteration']; ?>
</td>
						<td class="listTableRow small" valign=top><input type="checkbox" class=small name="selected_id" value="<?php echo $this->_tpl_vars['template']['templateid']; ?>
"></td>
						<td class="listTableRow small" valign=top><b><?php echo $this->_tpl_vars['template']['filename']; ?>
</b></a></td>
						<td class="listTableRow small" valign=top><?php echo $this->_tpl_vars['template']['description']; ?>
&nbsp;</td>
				        <td class="listTableRow small" valign=top><?php echo $this->_tpl_vars['template']['module']; ?>
</td>
				        <td class="listTableRow small" valign=top><a href="index.php?module=Settings&action=mailmergedownloadfile&record=<?php echo $this->_tpl_vars['template']['templateid']; ?>
"><?php echo $this->_tpl_vars['UMOD']['LBL_DOWNLOAD']; ?>
</a></td>
			          </tr>
					<?php endforeach; endif; unset($_from); ?>
					</table>
					<table border=0 cellspacing=0 cellpadding=5 width=100% >
					<tr>
					  <td class="small" nowrap align=right><a href="#top"><?php echo $this->_tpl_vars['MOD']['LBL_SCROLL']; ?>
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