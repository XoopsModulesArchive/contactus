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
     * $Id: gmap.php 41 2009-04-17 08:50:52Z Leo.J $
     */
 
    if(!defined('XOOPS_ROOT_PATH')) {
        exit;
    }
    
    $sql = "SELECT * FROM ".$xoopsDB->prefix("contactus")." WHERE name='map'";
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
<form method="post" action="admin.php?fct=updatemap" id="pref_form" name="pref_form">
    <table width="100%" cellspacing="1" class="outer">
        <tr>
            <th colspan="2"><?php echo _ADMIN_GMAPTITLE;?></th>
        </tr>
        <tr>
            <td class="head">
                <div class="xoops-form-element-caption">
                    <span class="caption-text"><?php echo _ADMIN_GMAP_ENABLE;?></span>
                </div>
            </td>
            <td class="even">
            <?php
                if($row['enable'] == '1') {?>
                    <input type="radio" name="enable" value="1" checked><?php echo _ADMIN_GMAP_YES;?></input>
                    <input type="radio" name="enable" value="0"><?php echo _ADMIN_GMAP_NO;?></input><?php
                } else {?>
                    <input type="radio" name="enable" value="1" ><?php echo _ADMIN_GMAP_YES;?></input>
                    <input type="radio" name="enable" value="0" checked><?php echo _ADMIN_GMAP_NO;?></input><?php
                }
            ?>
            </td>
        </tr>
        <tr valign="top" align="left">
            <td class="head">
                <div class="xoops-form-element-caption">
                    <span class="caption-text"><?php echo _ADMIN_GMAP_KEY;?>
                        <br/>
                        <span style="font-weight: normal;">
                            <?php echo _ADMIN_GMAP_KEY_DESC;?>
                        </span>
                    </span>
                </div>
            </td>
            <td class="even" valign="middle" >
                <input type="text" value="<?php echo $info->key;?>" maxlength="255" size="50" id="key" name="key"/>
            </td>
        </tr>
        <tr valign="top" align="left">
            <td class="head">
                <div class="xoops-form-element-caption">
                    <span class="caption-text"><?php echo _ADMIN_GMAP_TITLE;?></span>
                </div>
            </td>
            <td class="even">
                <input type="text" value="<?php echo $info->title;?>" maxlength="255" size="50" id="gmaptitle" name="gmaptitle"/>
            </td>
        </tr>
        <tr valign="top" align="left">
            <td class="head">
                <div class="xoops-form-element-caption">
                    <span class="caption-text"><?php echo _ADMIN_GMAP_LANG;?></span>
                </div>
            </td>
            <td class="even">
            <?php
                $optvalue = array('en'      =>array('English', ''), 
                                  'zh-CN'   =>array('CHINESE (SIMPLIFIED)', ''),
                                  'zh-TW'   =>array('CHINESE (TRADITIONAL)', ''));
                $optvalue["{$info->maplang}"][1] = 'selected="true"';
            ?>
            
                <select id="maplang" name="maplang">
                <?php
                    foreach ($optvalue as $index=>$e) {
                        echo "<option value=\"".$index."\" ".$e[1].">".$e[0]."</option>";
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="head">
                <div class="xoops-form-element-caption">
                    <span class="caption-text"><?php echo _ADMIN_GMAP_SIZE;?></span>
                </div>
            </td>
            <td class="even">
                <input type="text" value="<?php echo $info->gmwidth;?>" id="gmwidth" name="gmwidth" size="5"/> pixel x
                <input type="text" value="<?php echo $info->gmheight;?>" id="gmheight" name="gmheight" size="5"/> pixel
            </td>
        </tr>
        <tr valign="top" align="left">
            <td class="head">
                <div class="xoops-form-element-caption">
                    <span class="caption-text"><?php echo _ADMIN_GMAP_LOCATION;?><br/>
                        <span style="font-weight: normal;">
                            <?php echo _ADMIN_GMAP_LOCATION_DESC;?>
                        </span>
                    </span>
                </div>
            </td>
            <td class="even">
                <input type="text" value="<?php echo $info->gmapaddr;?>" maxlength="255" size="50" id="gmapaddr" name="gmapaddr"/>
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