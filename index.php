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
     * $Id: index.php 41 2009-04-17 08:50:52Z Leo.J $
     */
 
 
    include '../../mainfile.php';
    include './class/contactus_data.php';

    
    $xoopsOption['template_main'] = 'contactus.html';
    include XOOPS_ROOT_PATH.'/header.php';
    
    $sql = "SELECT * FROM ".$xoopsDB->prefix("contactus");
    $result = $xoopsDB->queryF($sql);
    while($row = $xoopsDB->fetchArray($result)) {
        switch($row['name']) {
            case 'info':
                if($row['enable'] == '1') {
                    $info = unserialize($row['data']);
                }
                break;
            case 'map':
                if($row['enable'] == '1') {
                    $map = unserialize($row['data']);
                }
                break;
            case 'email':
                if($row['enable'] == '1') {
                    $emailconf = unserialize($row['data']);
                }
                break;
        }
    }
    
    if(isset($info)) {
        $xoopsTpl->assign('INFOTITLE', $info->infotitle);
        $xoopsTpl->assign('INFOCONTENT', $info->infocontent);
        $xoopsTpl->assign('INFOENABLE', true);
    }
    
    if(isset($emailconf)) {
        $xoopsTpl->assign('EMAILTITLE', $emailconf->emailTitle);
        $xoopsTpl->assign('EMAILENABLE', true);
    }
    
    if(isset($map)) {
        $xoopsTpl->assign('GMTITLE', $map->title);
        $xoopsTpl->assign('GMWIDTH', $map->gmwidth);
        $xoopsTpl->assign('GMHEIGHT', $map->gmheight);
        $xoopsTpl->assign('GMAPADDR', $map->gmapaddr);
        $xoopsTpl->assign('MAPLANG', $map->maplang);
        $xoopsTpl->assign('KEY', $map->key);
        $xoopsTpl->assign('MAPENABLE', true);
    }
    
    $xoopsTpl->assign('errormsg', '');
    $xoopsTpl->assign('xoops_requesturi', htmlspecialchars( $_SERVER['REQUEST_URI'], ENT_QUOTES));
    include XOOPS_ROOT_PATH.'/footer.php';
?>