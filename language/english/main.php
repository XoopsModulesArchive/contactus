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
     * $Id: main.php 41 2009-04-17 08:50:52Z Leo.J $
     */
 

define('_CONTACTUS_NAME',"Author Name");
define('_CONTACTUS_EMAIL','Email');
define('_CONTACTUS_SUBJ',"Email Title");
define('_CONTACTUS_BODY',"Email Content");
define('_CONTACTUS_CAPTCHA',"Verify Code");

define('_CONTACTUS_SEND_EMAIL', "Send E-Mail to Us");
define('_CONTACTUS_SEND', "Send");

//error message
define('_ERROR_AUTHOR', "Name is required.\\n");
define('_ERROR_EMAIL', "Email Address is required.\\n");
define('_ERROR_EMAIL_INVALID', "Email Address is not valid.\\n");
define('_ERROR_SUBJ', "Subject is required.\\n");
define('_ERROR_EMAILBODY', "Email content is required.\\n");
define('_ERROR_CHECKCODE_INVALID', "Verify Code is invalid.\\n");
define('_ERROR_CHECKCODE', "Verify Code is required.\\n");
define('_ERROR_REQUIERFIELDEMPTY', "Required field is emtpy!!!\\n");

define('_SEND_OK', "Send Successful");
?>