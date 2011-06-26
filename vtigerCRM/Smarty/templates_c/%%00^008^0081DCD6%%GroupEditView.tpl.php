<?php /* Smarty version 2.6.18, created on 2011-06-18 12:53:57
         compiled from GroupEditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vtiger_imageurl', 'GroupEditView.tpl', 166, false),)), $this); ?>
<script language="JAVASCRIPT" type="text/javascript" src="include/js/smoothscroll.js"></script>
<script language="javascript">

function dup_validation()
{
	var mode = getObj('mode').value;
	var groupname = $('groupName').value;
	var groupid = getObj('groupId').value;
	if(mode == 'edit')
		var reminstr = '&mode='+mode+'&groupName='+groupname+'&groupid='+groupid;
	else
		var reminstr = '&groupName='+groupname;
	VtigerJS_DialogBox.block();
	//var status = CharValidation(groupname,'namespace');
	//if(status)
	//{
	new Ajax.Request(
		'index.php',
		{queue: {position: 'end', scope: 'command'},
			method: 'post',
			postBody: 'module=Users&action=UsersAjax&file=SaveGroup&ajax=true&dup_check=true'+reminstr,
			onComplete: function(response) {
				if(response.responseText.indexOf('SUCCESS') >-1)
					document.newGroupForm.submit();
				else {
					VtigerJS_DialogBox.unblock();
					alert(response.responseText);
				}
			}
		}
		);
	//}
	//else
	//	alert(alert_arr.NO_SPECIAL+alert_arr.IN_GROUPNAME)
}
var constructedOptionValue;
var constructedOptionName;

var roleIdArr=new Array(<?php echo $this->_tpl_vars['ROLEIDSTR']; ?>
);
var roleNameArr=new Array(<?php echo $this->_tpl_vars['ROLENAMESTR']; ?>
);
var userIdArr=new Array(<?php echo $this->_tpl_vars['USERIDSTR']; ?>
);
var userNameArr=new Array(<?php echo $this->_tpl_vars['USERNAMESTR']; ?>
);
var grpIdArr=new Array(<?php echo $this->_tpl_vars['GROUPIDSTR']; ?>
);
var grpNameArr=new Array(<?php echo $this->_tpl_vars['GROUPNAMESTR']; ?>
);

function showOptions()
{
	var selectedOption=document.newGroupForm.memberType.value;
	//Completely clear the select box
	document.forms['newGroupForm'].availList.options.length = 0;

	if(selectedOption == 'groups')
	{
		constructSelectOptions('groups',grpIdArr,grpNameArr);		
	}
	else if(selectedOption == 'roles')
	{
		constructSelectOptions('roles',roleIdArr,roleNameArr);		
	}
	else if(selectedOption == 'rs')
	{
	
		constructSelectOptions('rs',roleIdArr,roleNameArr);	
	}
	else if(selectedOption == 'users')
	{
		constructSelectOptions('users',userIdArr,userNameArr);		
	}
}

function constructSelectOptions(selectedMemberType,idArr,nameArr)
{
	var i;
	var findStr=document.newGroupForm.findStr.value;
	if(findStr.replace(/^\s+/g, '').replace(/\s+$/g, '').length !=0)
	{
		
		var k=0;
		for(i=0; i<nameArr.length; i++)
		{
			if(nameArr[i].indexOf(findStr) ==0)
			{
				constructedOptionName[k]=nameArr[i];
				constructedOptionValue[k]=idArr[i];
				k++;			
			}
		}
	}
	else
	{
		constructedOptionValue = idArr;
		constructedOptionName = nameArr;	
	}
	
	//Constructing the selectoptions
	var j;
	var nowNamePrefix;	
	for(j=0;j<constructedOptionName.length;j++)
	{
		if(selectedMemberType == 'roles')
		{
			nowNamePrefix = 'Roles::'
		}
		else if(selectedMemberType == 'rs')
		{
			nowNamePrefix = 'RoleAndSubordinates::'
		}
		else if(selectedMemberType == 'groups')
		{
			nowNamePrefix = 'Group::'
		}
		else if(selectedMemberType == 'users')
		{
			nowNamePrefix = 'User::'
		}

		var nowName = nowNamePrefix + constructedOptionName[j];
		var nowId = selectedMemberType + '::'  + constructedOptionValue[j]
		document.forms['newGroupForm'].availList.options[j] = new Option(nowName,nowId);	
	}
	//clearing the array
	constructedOptionValue = new Array();
        constructedOptionName = new Array();	
				

}

function validate()
{
	formSelectColumnString();
	if( !emptyCheck( "groupName", "Group Name","text" ) )
		return false;
	//check to restrict the & < > , characters
	var str = $("groupName").value;
	var re1=/[&\<\>\,]/
        if (re1.test(str))
        {
                alert(alert_arr.SPECIAL_CHARACTERS+" & < > , "+alert_arr.NOT_ALLOWED)
                return false;
        }
	
	if(document.newGroupForm.selectedColumnsString.value.replace(/^\s+/g, '').replace(/\s+$/g, '').length==0)
	{

		alert('<?php echo $this->_tpl_vars['APP']['GROUP_SHOULDHAVE_ONEMEMBER_INFO']; ?>
');
		return false;
	}
	dup_validation();return false;	
}
</script>

<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
<tr>
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
		<?php echo '
		<form name="newGroupForm" action="index.php" method="post" onSubmit="if(validate()) { VtigerJS_DialogBox.block();} else { return false; }">
		'; ?>

		<input type="hidden" name="module" value="Users">
		<input type="hidden" name="action" value="SaveGroup">
		<input type="hidden" name="mode" value="<?php echo $this->_tpl_vars['MODE']; ?>
">
		<input type="hidden" name="parenttab" value="Settings">
		<input type="hidden" name="groupId" value="<?php echo $this->_tpl_vars['GROUPID']; ?>
">
		<input type="hidden" name="returnaction" value="<?php echo $this->_tpl_vars['RETURN_ACTION']; ?>
">
			<tr>
				<td width=50 rowspan=2 valign=top><img src="<?php echo vtiger_imageurl('ico-groups.gif', $this->_tpl_vars['THEME']); ?>
" alt="<?php echo $this->_tpl_vars['CMOD']['LBL_GROUPS']; ?>
" title="<?php echo $this->_tpl_vars['CMOD']['LBL_GROUPS']; ?>
" width="48" height="48" border=0 ></td>
				<?php if ($this->_tpl_vars['MODE'] == 'edit'): ?>
				<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <a href="index.php?module=Settings&action=listgroups&parenttab=Settings"><?php echo $this->_tpl_vars['CMOD']['LBL_GROUPS']; ?>
</a> &gt; <?php echo $this->_tpl_vars['MOD']['LBL_EDIT']; ?>
 &quot;<?php echo $this->_tpl_vars['GROUPNAME']; ?>
&quot; </b></td>
				<?php else: ?>	
				<td class=heading2 valign=bottom><b><a href="index.php?module=Settings&action=index&parenttab=Settings"><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS']; ?>
</a> > <a href="index.php?module=Settings&action=listgroups&parenttab=Settings"><?php echo $this->_tpl_vars['CMOD']['LBL_GROUPS']; ?>
</a> &gt; <?php echo $this->_tpl_vars['CMOD']['LBL_CREATE_NEW_GROUP']; ?>
</b></td>
				<?php endif; ?>
			</tr>
			<tr>
				<?php if ($this->_tpl_vars['MODE'] == 'edit'): ?>
				<td valign=top class="small"><?php echo $this->_tpl_vars['MOD']['LBL_EDIT']; ?>
 <?php echo $this->_tpl_vars['CMOD']['LBL_PROPERTIES']; ?>
 &quot;<?php echo $this->_tpl_vars['GROUPNAME']; ?>
&quot; <?php echo $this->_tpl_vars['CMOD']['LBL_GROUP']; ?>
</td>
				<?php else: ?>
				<td valign=top class="small"><?php echo $this->_tpl_vars['CMOD']['LBL_NEW_GROUP']; ?>
</td>
				<?php endif; ?>
			</tr>
		</table>
		
		<br>
		<table border=0 cellspacing=0 cellpadding=10 width=100% >
			<tr>
				<td valign=top>
					<table border=0 cellspacing=0 cellpadding=5 width=100% class="tableHeading">
						<tr>
							<?php if ($this->_tpl_vars['MODE'] == 'edit'): ?>
							<td class="big"><strong><?php echo $this->_tpl_vars['CMOD']['LBL_PROPERTIES']; ?>
 &quot;<?php echo $this->_tpl_vars['GROUPNAME']; ?>
&quot; </strong></td>
							<?php else: ?>
							<td class="big"><strong><?php echo $this->_tpl_vars['CMOD']['LBL_NEW_GROUP']; ?>
</strong></td>
							<?php endif; ?>
							<td>
								<div align="right">
								<?php if ($this->_tpl_vars['MODE'] == 'edit'): ?>
								<input type="submit" class="crmButton small save" name="add" value="  <?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
  " onClick="return validate()">
								<?php else: ?>
								<input type="submit" class="crmButton create small" name="add" value="<?php echo $this->_tpl_vars['CMOD']['LBL_ADD_GROUP_BUTTON']; ?>
" onClick="return validate()">
								<?php endif; ?>
								&nbsp;
								<input type="button" class="crmButton cancel small" name="cancel" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" onClick="window.history.back()">
								</div>
							</td>
					  	</tr>
					</table>
					<table width="100%"  border="0" cellspacing="0" cellpadding="5">
                      				<tr class="small">
							<td width="15%" class="small cellLabel"><font color="red">*</font><strong><?php echo $this->_tpl_vars['CMOD']['LBL_GROUP_NAME']; ?>
</strong></td>
							<td width="85%" class="cellText" ><input id="groupName" name="groupName" type="text" value="<?php echo $this->_tpl_vars['GROUPNAME']; ?>
" class="detailedViewTextBox"></td>
						</tr>
						<tr class="small">
							<td class="small cellLabel"><strong><?php echo $this->_tpl_vars['CMOD']['LBL_DESCRIPTION']; ?>
</strong></td>
							<td class="cellText"><input name="description" type="text" value="<?php echo $this->_tpl_vars['DESCRIPTION']; ?>
" class="detailedViewTextBox"> </td>
						</tr>
                      				<tr class="small">
							<td colspan="2" valign=top class="cellLabel"><strong><?php echo $this->_tpl_vars['CMOD']['LBL_MEMBER']; ?>
</strong></td>
                      				</tr>
						<tr class="small">
							<td colspan="2" valign=top class="cellText">
							<br>
								<table width="95%"  border="0" align="center" cellpadding="5" cellspacing="0">
								<tr>
									<td width="40%" valign=top class="cellBottomDotLinePlain small"><strong><?php echo $this->_tpl_vars['CMOD']['LBL_MEMBER_AVLBL']; ?>
</strong></td>
									<td width="10%">&nbsp;</td>
									<td width="40%" class="cellBottomDotLinePlain small"><strong><?php echo $this->_tpl_vars['CMOD']['LBL_MEMBER_SELECTED']; ?>
</strong></td>
								</tr>
								<tr>
									<td valign=top class="small">
										<?php echo $this->_tpl_vars['CMOD']['LBL_ENTITY']; ?>
:&nbsp;
										<select id="memberType" name="memberType" class="small" onchange="showOptions()">
										<option value="groups" selected><?php echo $this->_tpl_vars['CMOD']['LBL_GROUPS']; ?>
</option>
										<option value="roles"><?php echo $this->_tpl_vars['CMOD']['LBL_ROLES']; ?>
</option>
										<option value="rs"><?php echo $this->_tpl_vars['CMOD']['LBL_ROLES_SUBORDINATES']; ?>
</option>
										<option value="users"><?php echo $this->_tpl_vars['MOD']['LBL_USERS']; ?>
</option>
										</select>
										<input type="hidden" name="findStr" class="small">&nbsp;
									</td>
									<td width="50">&nbsp;</td>
									<td class="small">&nbsp;</td>
								</tr>
                          					<tr class=small>
									<td valign=top><?php echo $this->_tpl_vars['CMOD']['LBL_MEMBER']; ?>
 <?php echo $this->_tpl_vars['CMOD']['LBL_OF']; ?>
 <?php echo $this->_tpl_vars['CMOD']['LBL_ENTITY']; ?>
<br>
										<select id="availList" name="availList" multiple size="10" class="small crmFormList"></select>
										<input type="hidden" name="selectedColumnsString"/>
							
									</td>
									<td width="50">
										<div align="center">
											<input type="button" name="Button" value="&nbsp;&rsaquo;&rsaquo;&nbsp;" onClick="addColumn()" class="crmButton small"/><br /><br />
											<input type="button" name="Button1" value="&nbsp;&lsaquo;&lsaquo;&nbsp;" onClick="delColumn()" class="crmButton small"/>
										</div>
									</td>
									<td class="small" style="background-color:#ddFFdd" valign=top><?php echo $this->_tpl_vars['CMOD']['LBL_MEMBER']; ?>
 <?php echo $this->_tpl_vars['CMOD']['LBL_OF']; ?>
 &quot;<?php echo $this->_tpl_vars['GROUPNAME']; ?>
&quot; <br>
										<select id="selectedColumns" name="selectedColumns" multiple size="10" class="small crmFormList">
										<?php $_from = $this->_tpl_vars['MEMBER']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
										<option value="<?php echo $this->_tpl_vars['element']['0']; ?>
"><?php echo $this->_tpl_vars['element']['1']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan=3>
										<ul class=small>
											<li><?php echo $this->_tpl_vars['CMOD']['LBL_GROUP_MESG1']; ?>
</li>
											<li><?php echo $this->_tpl_vars['CMOD']['LBL_GROUP_MESG2']; ?>
</li>
											<li><?php echo $this->_tpl_vars['CMOD']['LBL_GROUP_MESG3']; ?>
</li>
										</ul>
									</td>
								</tr>
								</table>
							</td>
						</tr>
					</table>
					<br>
					<table border=0 cellspacing=0 cellpadding=5 width=100% >
					<tr><td class="small" nowrap align=right><a href="#top"><?php echo $this->_tpl_vars['MOD']['LBL_SCROLL']; ?>
</a></td></tr>
					</table>
				</td></tr></table>
				</td></tr></table>
				</td>
			</tr>
		</form>
		</table>
	</div>

	</td>
        <td valign="top"><img src="<?php echo vtiger_imageurl('showPanelTopRight.gif', $this->_tpl_vars['THEME']); ?>
"></td>
</tr>
</table>
<script language="JavaScript" type="text/JavaScript">    
var moveupLinkObj,moveupDisabledObj,movedownLinkObj,movedownDisabledObj;
function setObjects() 
{
availListObj=getObj("availList")
selectedColumnsObj=getObj("selectedColumns")

}

function addColumn() 
        {
            for (i=0;i<selectedColumnsObj.length;i++) 
            {
                selectedColumnsObj.options[i].selected=false
            }

            for (i=0;i<availListObj.length;i++) 
            {
                if (availListObj.options[i].selected==true) 
                {            	
                	var rowFound=false;
                	var existingObj=null;
                    for (j=0;j<selectedColumnsObj.length;j++) 
                    {
                        if (selectedColumnsObj.options[j].value==availListObj.options[i].value) 
                        {
                            rowFound=true
                            existingObj=selectedColumnsObj.options[j]
                            break
                        }
                    }

                    if (rowFound!=true) 
                    {
                        var newColObj=document.createElement("OPTION")
                        newColObj.value=availListObj.options[i].value
                        if (browser_ie) newColObj.innerText=availListObj.options[i].innerText
                        else if (browser_nn4 || browser_nn6) newColObj.text=availListObj.options[i].text
                        selectedColumnsObj.appendChild(newColObj)
                        availListObj.options[i].selected=false
                        newColObj.selected=true
                        rowFound=false
                    } 
                    else 
                    {
                        if(existingObj != null) existingObj.selected=true
                    }
                }
            }
        }

function delColumn() 
{
for (i=selectedColumnsObj.options.length;i>0;i--) 
{
	if (selectedColumnsObj.options.selectedIndex>=0)
selectedColumnsObj.remove(selectedColumnsObj.options.selectedIndex)
}
}

function formSelectColumnString()
{
var selectedColStr = "";
for (i=0;i<selectedColumnsObj.options.length;i++) 
{
selectedColStr += selectedColumnsObj.options[i].value + ";";
}
document.newGroupForm.selectedColumnsString.value = selectedColStr;
}
setObjects();
showOptions();
</script>