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
     * $Id: admin.php 41 2009-04-17 08:50:52Z Leo.J $
     */
 

include "../../mainfile.php";
include './class/contactus_data.php';
include XOOPS_ROOT_PATH."/include/cp_functions.php";
xoops_loadLanguage('admin', 'contactus');

$admintest = 0;
if (is_object($xoopsUser)) {
    $xoopsModule =& XoopsModule::getByDirname("contactus");
    if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
        redirect_header(XOOPS_URL."/",3,_NOPERM);
        exit();
    }
    $admintest=1;
} else {
    redirect_header(XOOPS_URL."/",3,_NOPERM);
    exit();
}

if ($admintest != 0) {
    //load languages
}
    
if(!isset($_GET['fct']) || empty($_GET['fct'])) {
    xoops_cp_header();
    echo "error";
    xoops_cp_footer();
} else {
    $fct = trim($_GET['fct']);
}

xoops_cp_header();
switch($fct) {
    case 'info':
        require_once('./admin/info.php');
        break;
    case 'gmap':
        require_once('./admin/gmap.php');
        break;
    case 'email':
        require_once('./admin/email.php');
        break;
    case 'updateinfo':
        $info = new ContactInfoData();
        $enable = (isset($_POST['enable']) && !empty($_POST['enable']))? $_POST['enable'] : 0;
        $title = (isset($_POST['infotitle']) && !empty($_POST['infotitle']))? trim($_POST['infotitle']) : '';
        $content = (isset($_POST['infocontent']) && !empty($_POST['infocontent']))? trim($_POST['infocontent']) : '';
        $info->setinfotitle($title);
        $info->setinfocontent($content);
        $infodata = serialize($info);
        $sql = "UPDATE ".$xoopsDB->prefix("contactus")." SET 
                    enable=$enable,
                    data=".$xoopsDB->quote($infodata)." WHERE 
                    name='info'";
        $xoopsDB->queryF($sql);
        redirect_header($_SERVER['HTTP_REFERER'], 3, "Successful!", false);
        break;
    case 'updateemail':
        $data = new ContactEmailData();
        $enable = (isset($_POST['enable']) && !empty($_POST['enable']))? $_POST['enable'] : 0;
        $title = (isset($_POST['emailareatitle']) && !empty($_POST['emailareatitle']))? trim($_POST['emailareatitle']) : '';
        $toaddr = (isset($_POST['toemailaddr']) && !empty($_POST['toemailaddr']))? trim($_POST['toemailaddr']) : '';
        $data->emailTitle = $title;
        $data->emailToAddr = $toaddr;
        $data = serialize($data);
        $sql = "UPDATE ".$xoopsDB->prefix("contactus")." SET 
                    enable=$enable,
                    data=".$xoopsDB->quote($data)." WHERE 
                    name='email'";

        $xoopsDB->queryF($sql);
        redirect_header($_SERVER['HTTP_REFERER'], 3, "Successful!", false);
        break;
    case 'updatemap':
        $enable = (isset($_POST['enable']) && !empty($_POST['enable']))? $_POST['enable'] : 0;
        $key = (isset($_POST['key']) && !empty($_POST['key']))? trim($_POST['key']) : 'abcdefg';
        $title = (isset($_POST['gmaptitle']) && !empty($_POST['gmaptitle']))? trim($_POST['gmaptitle']) : '';
        $maplang = (isset($_POST['maplang']) && !empty($_POST['maplang']))? trim($_POST['maplang']) : 'en';
        $gmwidth = (isset($_POST['gmwidth']) && !empty($_POST['gmwidth']))? trim($_POST['gmwidth']) : '400';
        $gmheight = (isset($_POST['gmheight']) && !empty($_POST['gmheight']))? trim($_POST['gmheight']) : '300';
        $gmapaddr = (isset($_POST['gmapaddr']) && !empty($_POST['gmapaddr']))? trim($_POST['gmapaddr']) : '';
        $data = new ContactMapData();
        $data->key = $key;
        $data->title = $title;
        $data->maplang = $maplang;
        $data->gmwidth = $gmwidth;
        $data->gmheight = $gmheight;
        $data->gmapaddr = $gmapaddr;
        $data = serialize($data);
        $sql = "UPDATE ".$xoopsDB->prefix("contactus")." SET 
                    enable=$enable,
                    data=".$xoopsDB->quote($data)." WHERE 
                    name='map'";
        $xoopsDB->queryF($sql);
        redirect_header($_SERVER['HTTP_REFERER'], 3, "Successful!", false);
        break;
    default:
        echo "error";
}
xoops_cp_footer();
?>