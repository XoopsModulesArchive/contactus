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
     * $Id: xoops_version.php 61 2009-06-14 13:39:10Z jliu $
     */
 
    $modversion['name'] = _MD_NAME;
    $modversion['version'] = '0.1a';
    $modversion['description'] = _MD_DESC; 
    $modversion['author'] = "Leo J"; 
    $modversion['license'] = "GPL see LICENSE"; 
    $modversion['dirname'] = "contactus"; 
    $modversion['hasAdmin'] = 1; 
    $modversion['image'] = "images/contact_slogo.png"; 
    
    //sql
    $modversion['sqlfile']['mysql'] = "sql/contactus.sql";
    
    //mysql tables created by sql
    $modversion['tables'][0] = "contactus" ;
    
    // Menu
    $modversion['hasMain'] = 1; 
    
    // Admin things
    $modversion['hasAdmin'] = 1;
    $modversion['adminindex'] = "admin.php";
    $modversion['adminmenu'] = "menu.php";
    
    
    // Templates
    $modversion['templates'][1]['file'] = 'contactus.html';
    $modversion['templates'][1]['description'] = 'Send email to webmaster';
?>