<?php
/*********************************************************************
 * PLACEBO object-oriented framework for PHP
 *
 * PLACEBO framework for PHP is written by Yoseph Nandana
 * (yoseph@duahati.com).
 *
 * This framework is distributed under The MIT License.
 * http://www.opensource.org/licenses/mit-license.php
 *
 *
 * The MIT License
 * Copyright (c) 2004 Yoseph Nandana
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


/**
 * SUMMARY: 
 * PLOG PHP Logging class configuration file
 */


// the log output directory, where the log file will be located,
// related to web's root directory.
// don't forget to give write permission to this directory if you 
// want to enable logging.
$s_LOGGING_DIR = "./log/";

// the log output file name, this is where you can see the logs
$s_LOGGING_FILE = "placebo.log";


// the level of logging
// 0 - OFF
// 1 - Error
// 3 - Warning
// 6 - Notify
// 8 - Debug
// 10 - ALL
$i_LOGGING_LEVEL = 7;




?>
