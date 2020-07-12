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
     * $Id: contact.php 41 2009-04-17 08:50:52Z Leo.J $
     */
 
    include '../../mainfile.php';
    include './class/utility.php';
    
    $cleangpc = array();
    $cleangpc['captchano'] = (isset($_POST['captchano']) && !empty($_POST['captchano'])) ? $_POST['captchano'] : '';
    $cleangpc['author'] = (isset($_POST['author']) && !empty($_POST['author'])) ? $_POST['author'] : '';
    $cleangpc['email'] = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : '';
    $cleangpc['com_title'] = (isset($_POST['com_title']) && !empty($_POST['com_title'])) ? $_POST['com_title'] : '';
    $cleangpc['com_text'] = (isset($_POST['com_text']) && !empty($_POST['com_text'])) ? $_POST['com_text'] : '';
    $cleangpc['xoops_redirect'] = (isset($_POST['xoops_redirect']) && !empty($_POST['xoops_redirect'])) ? $_POST['xoops_redirect'] : '';
    
    
    $error = "";
    if (empty($cleangpc['captchano'])){
        $error = _ERROR_CHECKCODE;
    } else {
        include("./class/securimage/securimage.php");
        $img = new Securimage();
        $valid = $img->check($cleangpc['captchano']);
        if(!$valid) {
            $error = _ERROR_CHECKCODE_INVALID;
        }
    }
    
    if (empty($cleangpc['author'])){
        $error .= _ERROR_AUTHOR;
    }
    
    if(empty($cleangpc['email'])){
        $error .= _ERROR_EMAIL;
    } else if(!IsValidEmail($cleangpc['email'])) {
        $error .= _ERROR_EMAIL_INVALID;
    }
    
    if(empty($cleangpc['com_title'])){
        $error .= _ERROR_SUBJ;
    }
    
    if(empty($cleangpc['com_text'])){
        $error .= _ERROR_EMAILBODY;
    }
    
    if($error) {
        $author = HtmlSpecialChars_uni($cleangpc['author']);
        $email = HtmlSpecialChars_uni($cleangpc['email']);
        $com_text = HtmlSpecialChars_uni($cleangpc['com_text']);
        $com_title = HtmlSpecialChars_uni($cleangpc['com_title']);
        if(!empty($cleangpc['xoops_redirect'])) {
            $url = HtmlSpecialChars_uni($cleangpc['xoops_redirect']);
        } else {
            $url = XOOPS_URL.'/index.php';
        }
        
        $xoopsOption['template_main'] = 'contactus.html';
        include XOOPS_ROOT_PATH.'/header.php';
        
        include './class/contactus_data.php';
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

        
        
        $xoopsTpl->assign('author', $author);
        $xoopsTpl->assign('email', $email);
        $xoopsTpl->assign('com_title', $com_title);
        $xoopsTpl->assign('com_text', $com_text);
        $xoopsTpl->assign('errormsg', $error);
        $xoopsTpl->assign('xoops_requesturi', $url);
        include XOOPS_ROOT_PATH.'/footer.php';
        exit();
    }
    
    $xoopsMailer =& xoops_getMailer();
    $xoopsMailer->useMail();
    $xoopsMailer->setBody($cleangpc['com_text']);
    
    include './class/contactus_data.php';
    $sql = "SELECT * FROM ".$xoopsDB->prefix("contactus")." WHERE name='email'";
    $result = $xoopsDB->queryF($sql);
    if($row = $xoopsDB->fetchArray($result)) {
        $info = unserialize($row['data']);
        if(!empty($info->emailToAddr)) {
            $xoopsMailer->setToEmails($info->emailToAddr);
        } else {
            $xoopsMailer->setToEmails($xoopsConfig['adminmail']);
        }
    } else {
        $xoopsMailer->setToEmails($xoopsConfig['adminmail']);
    }

    $xoopsMailer->setFromEmail($cleangpc['email']);
    $xoopsMailer->setFromName($cleangpc['author']);
    $xoopsMailer->setSubject($cleangpc['com_title']);
    $xoopsMailer->send();
    
    if(!empty($cleangpc['xoops_redirect'])) {
        $url = $cleangpc['xoops_redirect'];
    } else {
        $url = XOOPS_URL.'/index.php';
    }
    redirect_header($url, 3, _SEND_OK, false);
?>