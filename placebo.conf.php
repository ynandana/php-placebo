<?php
/*********************************************************************
 * PLACEBO object-oriented framework for PHP
 *
 * PLACEBO framework for PHP is written by Yoseph Nandana
 *
 * This framework is distributed under The MIT License.
 * http://www.opensource.org/licenses/mit-license.php
 *
 *
 * The MIT License
 * Copyright (c) 2004 yoseph@duahati.com
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files
 * (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge,
 * publish, distribute, sublicense, and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 */



//================================
//   APPLICATION-WIDE CONSTANTS
//================================
$s_CONTACT_PERSON = "yourname@emailaddress.com";
$s_CONTACT_PERSON_PHONE = "+99-99999999";


// root directory of source code
$s_SOURCE_DIR = "./src/";


// show debug information or not; use carefuly
// if set to 'true', debug information will be
// displayed on screen.
$b_DEBUG = true;



/** SMARTY TEMPLATE ENGINE LOCATION **
This is relative to the web directory!!! */
$s_SMARTY_DIR = "./SMARTY";

// these are required by smarty...
$s_TEMPLATE_DIR = "./src/templates/";
$s_COMPILE_DIR =  "./src/templates_c";
$s_CONFIG_DIR =  "./src/configs";
$s_CACHE_DIR =  "./src/cache";
$b_CACHING = false;



/** directory for storing session data, relative to web's root */
$s_SESSION_DIR = "./tmp";

/** how long until user session expires */
$s_SESSION_LIFETIME = 15; // in minutes;

/**
 * ============= LOGGING FEATURE ==============
 *  Set the logging feature
 *  possible values
 *  $i_LOGGING = 0;      logging is DISABLED
 *  $i_LOGGING = 1;      logging is ENABLED (the value can be
 *                       anything that > 0
 *
 *  See the documentation for the API for the logging features
 */
$i_LOGGING = 1;
// WARNING: SET THIS TO [0] (off) IN PRODUCTION SERVER!!


// the file name of the configuration file for logging, relative to
// web directory
// it's
$s_LOGGING_CONFIG = "PLOG.conf.php";







// ==============================================
//        application-specific variables
// ==============================================
// Define your application-specific global variables here
// ex. the path to your photo directory, etc
//
// note : if you define anything related to physical directory,
//        it is related to the web's root directory.


//**************** END OF FILE ****************
?>
