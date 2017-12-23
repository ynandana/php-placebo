<?php
/*********************************************************************
 * PLACEBO object-oriented framework for PHP
 *
 * PLACEBO framework for PHP is written by Yoseph Nandana
 * (ynandana@gmail.com).
 *
 * This framework is distributed under The MIT License.
 * http://www.opensource.org/licenses/mit-license.php
 *
 *
 * The MIT License
 * Copyright (c) 2004 ynandana@gmail.com
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
 * Filename: placebo.php
 * Purpose : object request broker (ORB)
 *
 * Log:
 * 14-dec-2001 : Initially created
 * 21-dec-2001 : Add debug error message mechanism
 * 25-dec-2001 : Config file inclusion improvement
 * 24-apr-2004 : First introduction of CReturnValue class
 *
 ***************************************/

/**
 * Object-request broker function
 *
 * @param $_sClassName Class name to instantiate
 *
 * @return Object of class $_sClassName
 */

//-----------------------------------------------

date_default_timezone_set('UTC');

$s_CONFIG_FILE = "placebo.conf.php";
//---------- load config file (placebo.conf.conf) ----------

if (!defined ("CONFIG_FILE")) {
   include "./" . $s_CONFIG_FILE;
   define ("CONFIG_FILE", $s_CONFIG_FILE);
}
if (!defined ("PLACEBO")) {
   define ("PLACEBO", "placebo");
}

session_save_path ($s_SESSION_DIR);
session_cache_expire ($s_SESSION_LIFETIME);
session_start();

// -------- LOGGING SECTION -----------
$oLogEngine = null;
global $i_LOGGING;
if ($i_LOGGING > 0) {
    include_once "PLOG.class.php";
    $oLogEngine = new PLOG ($s_LOGGING_CONFIG);
}
// -------- LOGGING SECTION -----------


/**
 * PLACEBO API: Instante new PLACEBO Object.
 * @param $_sCallerObject Reference to the object from which the
 *        instantiate() function is called.
 * @param $_sClassname Full class name to instantiate a new
 *        PLACEBO object. The class' package names is separated
 *        by slash (/). Example: 'com/duahati/client/web/CCoRegister"
 * @return Reference to the new PLACEBO object
 */
 function #Object
    instantiate (&$_sCallerObject, $_sClassName)
 {
    global $s_SOURCE_DIR, $s_CONFIG_FILE;
    global $ORIGIN;

    $s_CLASS_SUFFIX = ".php";
    $s_CLASS_DIR = $s_SOURCE_DIR;
    $oRetVal = null;

    if (!defined ($_sClassName)) {
    $sClassFileName = $_sClassName . $s_CLASS_SUFFIX;
        define ($_sClassName, $sClassFileName);

    if (is_file ($s_CLASS_DIR . $sClassFileName) ) {
            include_once ($s_CLASS_DIR . $sClassFileName);
        } else {
        $ORIGIN = get_class ($_sCallerObject);
        echo includeFail ($s_CLASS_DIR . $sClassFileName, "");
        return (null);
    }

    }

  $sClassName = preg_replace ("{/}", "_", $_sClassName);
  if (class_exists ($sClassName)) {
       $oRetVal = new $sClassName();
  } else {
      echo classNotExist ($sClassFileName, $sClassName);
      return (null);
  }


    return ($oRetVal);
 }

 function #String
    errorHeader()
 {
    $sRetVal = "<font color=\"#333333\" face=\"Verdana, Helvetica\"> \n" .
           "<h2>Placebo Object Request Broker Error!</h2>\n";
    return ($sRetVal);
 }

 function #String
    errorFooter()
 {
    global $s_CONTACT_PERSON, $s_CONTACT_PERSON_PHONE;

    $sRetVal = "\n<br><br><hr size=1 noshade><font size=2> \n" .
           "<i>Contact <a href=\"mailto:$s_CONTACT_PERSON\">" .
                   "$s_CONTACT_PERSON</a> via e-mail or phone: $s_CONTACT_PERSON_PHONE</i><br>\n" .
           "Generated by PLACEBO framework at " . date("d-M-Y H:i:s", time()) . "<br /><br />\n" .
           "PLACEBO is object-oriented framework for PHP <br />\n" .
           "Find more about PLACEBO at PLACEBO home: <a href='http://freshmeat.net/projects/placebo'>http://freshmeat.net/projects/placebo</a>";
    return ($sRetVal);
 }

 function #String
    includeFail ($_sAbsolutePath, $_sMethodName)
 {
    global $b_DEBUG;
    global $ORIGIN;

    $sMessage = "Error including required class file.<br>\n" .
                "Filesystem path to class file or class file name is not correct.";

    if ($b_DEBUG) {
        // WARNING: FOR DEBUGGING PURPOSE ONLY
        $sMessage .= "\n<br><br>\n<b>ORIGIN: " . $ORIGIN . "</b>";
        $sMessage .= "\n<br>\n<b>CLASS_FILE: $_sAbsolutePath  " .
                         "METHOD: $_sMethodName</b>";
        $sMessage .= "\n<br>\n<b>ORB_FAULT : " . __FILE__ . ", LINE: " . __LINE__ .
                             "</b>";
    }


    $sRetVal = errorHeader() . $sMessage . errorFooter();
    return ($sRetVal);
 }


 function #String
    functionNotExist ($_sAbsolutePath, $_sMethodName)
 {
    global $b_DEBUG, $ORIGIN;
    $sMessage = "Error invoking class method.<br>\n" .
                "Method name <b>$_sMethodName()</b> is not a valid method " .
            " in class <b>$ORIGIN</b>.";

    if ($b_DEBUG) {
        // WARNING: FOR DEBUGGING PURPOSE ONLY
        $sMessage .= "\n<br><br>\n<b>CLASS: " . $ORIGIN . "</b>";
        $sMessage .= "\n<br>\n<b>CLASS_FILE: $_sAbsolutePath  " .
                         "METHOD: $_sMethodName</b>";
        $sMessage .= "\n<br>\n<b>ORB_FAULT : " . __FILE__ . ", LINE: " . __LINE__ .
                             "</b>";
    }


    $sRetVal = errorHeader() . $sMessage . errorFooter();
    return ($sRetVal);
 }


 function #String
    classNotExist ($sClassFile, $class)
 {
    $sMessage = "Error instantiating class definition.<br>\n" .
            "Class definition file: <b>$sClassFile</b> is loaded, but the file ".
            "does not contain definition for class <b>$class</b>\n";
    $sRetVal = errorHeader() . $sMessage . errorFooter();
    return ($sRetVal);
 }





// ----------------------------------------------
// LOGGING API SECTION
// THESE ARE THE FUNCTIONS TO WRAP THE METHODS
// IN THE LOGGIN CLASS OBJECT
// LOGGING CLASS: PLOG.class.php
// ----------------------------------------------
function DEBUG ($_oOrigObject, $_sMessage) {
    global $i_LOGGING;
    if ($i_LOGGING > 0) {
        global $oLogEngine;
        $oLogEngine->debug ($_oOrigObject, $_sMessage);
    } else {
        // do nothing
    }
}

function NOTIFY ($_oOrigObject, $_sMessage) {
    global $i_LOGGING;
    if ($i_LOGGING > 0) {
        global $oLogEngine;
        $oLogEngine->notify ($_oOrigObject, $_sMessage);
    } else {
        // do nothing
    }
}


function WARNING ($_oOrigObject, $_sMessage) {
    global $i_LOGGING;
    if ($i_LOGGING > 0) {
        global $oLogEngine;
        $oLogEngine->warning ($_oOrigObject, $_sMessage);
    } else {
        // do nothing
    }
}

function ERROR ($_oOrigObject, $_sMessage) {
    global $i_LOGGING;
    if ($i_LOGGING > 0) {
        global $oLogEngine;
        $oLogEngine->error ($_oOrigObject, $_sMessage);
    } else {
        // do nothing
    }
}


function systemLog ($_oOrigObject, $_sMessage, $_iLogLevel) {
    global $i_LOGGING;
    if ($i_LOGGING > 0) {
        global $oLogEngine;
        $oLogEngine->log ($_oOrigObject, $_sMessage, $_iLogLevel);
    } else {
        // do nothing
    }
}


// ==============================================
// class definition for CReturnValue
// ==============================================

class CReturnValue
{
    /**
     * This class is the value object class used in the Placebo
     * framework. The class is used as return values by all
     * methods in the framework
     */

    var $m_bException = true;
    var $m_iErrorCode = -1;
    var $m_sErrorMessage = "";
    var $m_oValue;


    /**
     * Set the exception flag of this return value object. If set
     * to True, means that exception occured the caller method should
     * see what happenend using getErrorCode() and getErrorMessage()
     * @param $_bValue Boolean value to set to exception flag
     * @see getErrorCode
     * @see getErrorMessage
     * @since April 2004
     * @author ynandana@yahoo.com
     */
    function setException ($_bValue)
    {
        $this->m_bException = $_bValue;
    }

    /**
     * Get the value of exception flag. If returns true means
     * exception has occured.
     * @return Boolean value, true if exception occured
     * @see getErrorCode
     * @see getErrorMessage
     * @since April 2004
     * @author ynandana@yahoo.com
     */
    function exception()
    {
        return ($this->m_bException);
    }


    /**
     * Set human-readable error message when exception occur.
     * @param $_sValue Error message string to set.
     * @see getErrorCode
     * @see getErrorMessage
     * @since April 2004
     * @author ynandana@yahoo.com
     */
    function setErrorMessage ($_sValue)
    {
        $this->m_sErrorMessage = $_sValue;
    }


    /**
     * Get error message when exception occur.
     * @return Human-readable error message string.
     * @see getErrorCode
     * @see getErrorMessage
     * @since April 2004
     * @author ynandana@yahoo.com
     */
    function getErrorMessage()
    {
        return ($this->m_sErrorMessage);
    }


    /**
     * Set error code (optional) when exception occur.
     * @param $_iValue Integer value to set as error code.
     * @see getErrorCode
     * @see getErrorMessage
     * @since April 2004
     * @author ynandana@yahoo.com
     */
    function setErrorCode ($_iValue)
    {
        $this->m_iErrorCode = $_iValue;
    }



    /**
     * Get error code when exception occur, -1 if not set.
     * @return Error code integer number
     * @see getErrorCode
     * @see getErrorMessage
     * @since April 2004
     * @author ynandana@yahoo.com
     */
    function getErrorCode()
    {
        return ($this->m_iErrorCode);
    }


    /**
     * Set the actual return value for the method invoked, with
     * assumption there is no exception during the method call.
     * @param $_oValue The return value of the method, can be any
     *        types (integer, string), array, or object.
     * @see getErrorCode
     * @see getErrorMessage
     * @since April 2004
     * @author ynandana@yahoo.com
     */
    function setValue ($_oValue)
    {
        $this->m_oValue = $_oValue;
    }

    /**
     * Get the actual return value for the method invoked, with
     * assumption there is no exception during the method call.
     * @return The return value of the method, can be any
     *        types (integer, string), array, or object.
     * @see getErrorCode
     * @see getErrorMessage
     * @since April 2004
     * @author ynandana@yahoo.com
     */
    function getValue()
    {
        return ($this->m_oValue);
    }

} // end CReturnValue class




//**************** END OF FILE ****************
?>
