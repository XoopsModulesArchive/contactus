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
 * $Id: function_valid.js 62 2009-06-15 03:46:57Z jliu $
 */

/*valid email*/
function IsValidEmail(emailaddress) {
    var valid = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+([\.][a-z]+){1,6}$/i.test(emailaddress);
    return valid;
}


/*valid input string*/
String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g,"");
}
String.prototype.ltrim = function() {
	return this.replace(/^\s+/,"");
}
String.prototype.rtrim = function() {
	return this.replace(/\s+$/,"");
}

function IsEmptyValue(value) {
    //test object, string, number, reference
    value = value.trim();
    if(value == null || value=="" || value==undefined ) {
        return true;
    } else {
        return false;
    }
}