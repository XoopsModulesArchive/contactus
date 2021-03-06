<?php
    /**
     * Project: Contactus: An XOOPS Module For Contact Us With Google Map
     *
     * Description:  This XOOPS module is a basic contact us page with Google Map and send email feature.
     *   
     * @author Leo J http://www.cmsgp.org, Copyright (C) 2009.
     *   
     * @see The GNU Public License (GPL)
     *
     *
     * This program is free software; you can redistribute it and/or modify 
     * it under the terms of the GNU General Public License as published by 
     * the Free Software Foundation; either version 2 of the License, or 
     * (at your option) any later version.
     * 
     * This program is distributed in the hope that it will be useful, but 
     * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY 
     * or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License 
     * for more details.
     * 
     * You should have received a copy of the GNU General Public License along 
     * with this program; if not, write to the Free Software Foundation, Inc., 
     * 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
     *
     * $Id: info.php 41 2009-04-17 08:50:52Z Leo.J $
     */
 
    if(!defined('XOOPS_ROOT_PATH')) {
        exit;
    }

    $sql = "SELECT * FROM ".$xoopsDB->prefix("contactus")." WHERE name='info'";
    $result = $xoopsDB->queryF($sql);
    if($row = $xoopsDB->fetchArray($result)) {
        $info = unserialize($row['data']);
    }

    if (file_exists(XOOPS_ROOT_PATH."/modules/contactus/language/".$xoopsConfig['language']."/admin/".$fct.".php")) {
        include XOOPS_ROOT_PATH."/modules/contactus/language/".$xoopsConfig['language']."/admin/".$fct.".php";
    } elseif (file_exists(XOOPS_ROOT_PATH."/modules/contactus/language/english/admin/".$fct.".php")) {
        include XOOPS_ROOT_PATH."/modules/contactus/language/english/admin/".$fct.".php";
    }
?>

<form method="post" action="admin.php?fct=updateinfo" id="pref_form" name="pref_form">
    <table width="100%" cellspacing="1" class="outer">
        <tr>
            <th colspan="2"><?php echo _ADMIN_INFOTITLE;?></th>
        </tr>
        <tr>
            <td class="head">
                <div class="xoops-form-element-caption">
                    <span class="caption-text"><?php echo _ADMIN_INFO_ENABLE;?></span>
                </div>
            </td>
            <td class="even">
            <?php
                if($row['enable'] == '1') {?>
                    <input type="radio" name="enable" value="1" checked><?php echo _ADMIN_INFO_YES;?></input>
                    <input type="radio" name="enable" value="0"><?php echo _ADMIN_INFO_NO;?></input><?php
                } else {?>
                    <input type="radio" name="enable" value="1" ><?php echo _ADMIN_INFO_YES;?></input>
                    <input type="radio" name="enable" value="0" checked><?php echo _ADMIN_INFO_NO;?></input><?php
                }
            ?>
            </td>
        </tr>
        <tr valign="top" align="left">
            <td class="head">
                <div class="xoops-form-element-caption">
                    <span class="caption-text"><?php echo _ADMIN_INFO_TITLE;?> </span>
                </div>
            </td>
            <td class="even">
                <input type="text" value="<?php echo $info->infotitle;?>" maxlength="255" size="50" id="infotitle" name="infotitle"/>
            </td>
        </tr>
        <tr>
            <td class="head">
                <div class="xoops-form-element-caption">
                    <span class="caption-text"><?php echo _ADMIN_INFO_CONTENT;?></span>
                </div>
            </td>
            <td class="even">
                <textarea cols="50" rows="10" id="infocontent" name="infocontent"><?php echo $info->infocontent;?></textarea>
            </td>
        </tr>
        <tr valign="top" align="left">
            <td class="head"/>
            <td class="even">
                <input type="submit" title="Go!" value="Go!" id="button" name="button" class="formButton"/>
            </td>
        </tr>
    </table>
</form>
