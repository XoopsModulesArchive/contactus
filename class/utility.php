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
     * $Id: utility.php 41 2009-04-17 08:50:52Z Leo.J $
     */
 
    function HtmlSpecialChars_uni($text) {
        return preg_replace(array("/&amp;/i", "/&nbsp;/i"), array('&', '&amp;nbsp;'), htmlspecialchars($text, ENT_QUOTES));
    }
    
    function IsValidEmail($email) {
        return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s\'"<>]+\.+[a-z]{2,6}))$#si', $email);
    }
?>