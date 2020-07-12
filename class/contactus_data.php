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
     * $Id: contactus_data.php 41 2009-04-17 08:50:52Z Leo.J $
     */
 
    if(!defined('XOOPS_ROOT_PATH')) {
        exit;
    }
    
    class ContactInfoData {
        var $infotitle;
        var $infocontent;
        
        function setinfotitle($title) {
            $this->infotitle = $title;
        }
        
        function setinfocontent($content) {
            $this->infocontent = $content;
        }
        
        function getinfotitle() {
            return $this->infotitle;
        }
        
        function getinfocontent() {
            return $this->infocontent;
        }
    }
    
    class ContactEmailData {
        var $emailTitle;
        var $emailToAddr;
    }
    
    class ContactMapData {
        var $key;
        var $title;
        var $maplang;
        var $gmwidth;
        var $gmheight;
        var $gmapaddr;
    }
?>