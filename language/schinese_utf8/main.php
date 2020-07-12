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
 

define('_CONTACTUS_NAME',"姓名（必填）");
define('_CONTACTUS_EMAIL','邮件地址（必填）');
define('_CONTACTUS_SUBJ',"主题（必填）");
define('_CONTACTUS_BODY',"您的意见（必填）");
define('_CONTACTUS_CAPTCHA',"验证码（必填）");

define('_CONTACTUS_SEND_EMAIL', "发E-Mail给我们");
define('_CONTACTUS_SEND', "发 送");

//error message
define('_ERROR_AUTHOR', "姓名不能为空！\\n");
define('_ERROR_EMAIL', "Email地址不能为空！\\n");
define('_ERROR_EMAIL_INVALID', "Email地址格式错误！\\n");
define('_ERROR_SUBJ', "主题不能为空！\\n");
define('_ERROR_EMAILBODY', "内容不能为空！\\n");
define('_ERROR_CHECKCODE_INVALID', "验证码错误！\\n");
define('_ERROR_CHECKCODE', "验证码不能为空！\\n");
define('_ERROR_REQUIERFIELDEMPTY', "必填项不能为空！\\n");


define('_SEND_OK', "内容发送成功");
?>