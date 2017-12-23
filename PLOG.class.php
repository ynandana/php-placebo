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


/**
 * SUMMARY: 
 * The PLOG class.
 * PLOG stands for PHP LOG. This class is an utility class
 * designed to handle logging for PHP code.
 * Created by: Yoseph Nandana <yoseph@duahati.com>  
 * Initially created on Saturday, 26 April 2003
 */

class PLOG
{
    /**
     * <b>The PLOG class.<b><br>
     * PLOG stands for <i><b>PHP LOG</b></i>. This class is an utility class
     * designed to handle logging for PHP code.<br>
     * Created by: Yoseph Nandana <yoseph@duahati.com>  <br>
     * Initially created on Saturday, 26 April 2003
     */


	// ==========================================
    //      member constants and variables
    // ==========================================
	// constants
	var $OFF = 0;
	var $ERROR = 1;
	var $WARNING = 3;
	var $NOTIFY = 6;
	var $DEBUG = 8;
	var $ALL = 10;
	
	// member variables
	var $s_LOG_FILE = "";
	var $i_LOG_LEVEL = -1;

	var $o_FILE_HANDLER = null;



	// ==========================================
    //               constructor
    // ==========================================
	/**
	 * @param $_sConfigFileName The full path of the config file name
	 */
	 function PLOG (&$_sConfigFileName)
	{
		if (!is_file ($_sConfigFileName)) {
			die ("[PLOG] -- Error loading config file, " . 
				" [" . $_sConfigFileName . "] " . 
				 "PLOG is NOT instantiated");
		} else {
			include_once $_sConfigFileName;
			$this->s_LOG_FILE = $s_LOGGING_DIR . $s_LOGGING_FILE;
			$this->i_LOG_LEVEL = $i_LOGGING_LEVEL;

			$this->o_FILE_HANDLER = fopen ($this->s_LOG_FILE, "ab");

		}
	} 


	// ==========================================
    //              public methods
    // ==========================================
	/**
	 * Do the DEBUG logging action.
	 * @param $_sMessage The message to record in the log
	 */
	 function #void
		debug (&$origObject, &$_sMessage)
	{
		if ($this->i_LOG_LEVEL >= $this->DEBUG) {
			$this->_record ($origObject, "DEBUG", $_sMessage);
		}
	}


	/**
	 * Do the WARNING logging action.
	 * @param $_sMessage The message to record in the log
	 */
	 function #void
		warning (&$origObject, &$_sMessage)
	{
		if ($this->i_LOG_LEVEL >= $this->WARNING) {
			$this->_record ($origObject, "WARNING", $_sMessage);
		}
	}
	

	/**
	 * Do the ERROR logging action.
	 * @param $_sMessage The message to record in the log
	 */
	 function #void
		error (&$origObject, &$_sMessage)
	{
		if ($this->i_LOG_LEVEL >= $this->ERROR) {
			$this->_record ($origObject, "ERROR", $_sMessage);
		}
	}

	/**
	 * Do the NOTIFY logging action.
	 * @param $_sMessage The message to record in the log
	 */
	 function #void
		notify (&$origObject, &$_sMessage)
	{
		if ($this->i_LOG_LEVEL >= $this->NOTIFY) {
			$this->_record ($origObject, "NOTIFY", $_sMessage);
		}
	}


	/**
	 * Do the flexible-loglevel logging action.
	 * @param $_sMessage The message to record in the log
	 */
	 function #void
		log (&$origObject, &$_sMessage, $_iLogLevel)
	{
		if ($this->i_LOG_LEVEL >= $_iLogLevel) {
			$this->_record ($origObject, "LOG-" . $_iLogLevel, $_sMessage);
		}
	}

	// ==========================================
    //              private methods
    // ==========================================
	/**
	 * Record the log message to the file
	 */
	 function #void
		_record (&$_oOrigObject, $_sType, &$_sMessage)
	{
		$sTimeStamp = date ("Ymd - H:i:s", time());
		$sString = "[" . $sTimeStamp . "][" . get_class($_oOrigObject) . "] - " . $_sType . ": " . 
			$_sMessage . "\n";
		fwrite ($this->o_FILE_HANDLER, $sString);
	}

}
// ----------------------------------------------
//                end of file
// ----------------------------------------------
?>
