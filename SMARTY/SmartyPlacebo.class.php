<?php
/*********************************************************************
 * SmartyPlacebo.class.php - PLACEBO/Smarty adaptor.
 * This class extends from Smarty class to provide API for use with
 * PLACEBO framework.
 *
 * PLACEBO framework for PHP  is written by Yoseph Nandana
 * (yoseph@duahati.com).
 *
 * THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESSED OR IMPLIED
 * WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED.  IN NO EVENT SHALL THE WRITER OF THIS SOFTWARE BE 
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 * OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR
 * TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF
 * THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF
 * SUCH DAMAGE.
 */

include "Smarty.class.php";
include "TargetMaker.class.php";

/**
 * This class extends from Smarty base class.
 * The purpose is to wrap the Smarty's fetch() method
 * that returns string representation of a template obj.
 *
 * This class file has to reside in the same directory
 * with the Smarty base class.
 * @author Yoseph Nandana (yoseph@duahati.com)
 */


class SmartyPlacebo extends Smarty
{

	/**
	 * Returns string representation of the template object for a
	 * given template name.
	 * @param $_sTemplateName Template name to output
	 * @return String representation of template object
	 * @author Yoseph Nandana (yoseph@duahati.com)
     */
    function &toString ($_sTemplateName)
    {
        $retVal = $this->fetch ($_sTemplateName, null, null, false);
        return ($retVal);
    }


	/**
	 * Assign link for $_sLinkName template variable to object 
	 * $_oLinkObject without passing parameter(s).
	 * @see assignLinkParam
	 * @param $_sLinkName Name of template variable that holds the
	 *        link in the template.
	 * @param $_sLinkObject Object to assign to the template
	 *        variable.
     * @author Yoseph Nandana (yoseph@duahati.com)
	 */
	function assignLink($_sLinkName, $_oLinkObject)
	{
		$this->assign ($_sLinkName, 	
			 TargetMaker::makeTargetLink ($_oLinkObject,
										   null));
	}

	/**
	 * Assign link for $_sLinkName template variable to object 
	 * $_oLinkObject with parameter $_aParam.
	 * @see assignLink
	 * @param $_sLinkName Name of template variable that holds the
	 *        link in the template.
	 * @param $_sLinkObject Object to assign to the template
	 *        variable.
	 * @param $_aParam Associative array represents collection of
	 *        string/object to pass to object's method via the link.
     * @author Yoseph Nandana (yoseph@duahati.com)
	 */
	function assignLinkParam($_sLinkName, $_oLinkObject, &$_aParam)
	{
		$this->assign ($_sLinkName, 	
			 TargetMaker::makeTargetLink ($_oLinkObject,
										  $_aParam));
	}


	/**
	 * Assign form action for $_sLinkName template variable to object 
	 * $_oLinkObject.
	 * @see assignLinkParam, assignLink
	 * @param $_sLinkName Name of template variable that holds the
	 *        link in the template.
	 * @param $_sLinkObject Object to assign to the template
	 *        variable.
	 * @param $_aParam Associative array represents collection of
	 *        string/object to pass to object's method via the link.
     * @author Yoseph Nandana (yoseph@duahati.com)
	 */
	function assignAction($_sLinkName, $_sLinkObject, $_aParam)
	{
		$this->assign 
			($_sLinkName,
			 TargetMaker::makeTargetForm ($_sLinkObject,
										   $_aParam));
	}


}

?>