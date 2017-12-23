<?php
/********************************************
 * Placebo Object-oriented framework for PHP
 * (c)2002 Yoseph Nandana (yoseph_n@yahoo.com)
 *
 * Log      : 16-Nov-2002 - Initially crated
 *
 ******************************************** */

/**
 * This is a 'static class' representing target maker for
 * HTML links and forms. The links for HTML link and form actions
 * are specially formed for proper use with PLACEBO framework.
 */

class TargetMaker
{
	 /**
	  * Make proper link.
	  * @param $_sTarget is the full name to called method, in the 
	  *        format: ClassName.methodName.
	  * @param $_aParam Array representing collections of parameters
	  *        to pass to the invoked method.
	  * @return String of URL with the method-call encoded into it.
      * @author Yoseph Nandana (yoseph@duahati.com)
	  */
	function #String
		&makeTargetLink ($_sTarget, $_aParam)
	{
		//---- generating param list for URL ----
		$sWEBLAYER = "webdispatch.php";
        $sParam = "";
		$aClassMethod = explode (".", $_sTarget);
		$sClassName = $aClassMethod[0];
		$sMethodName = $aClassMethod[1];
		//---------------------------------------
		
		$iParameterCount = sizeof($_aParam);
		if ($iParameterCount > 0) {
	        for ($i=0; $i < $iParameterCount; $i++) {
				$aParamElement = each ($_aParam);
 				$sParam = $sParam . "p$i=" . $aParamElement['value'];

				if ($i < ($iParameterCount - 1) ) {
					$sParam = $sParam . '&';
	            }
			}
			$sParam .= "&";
		}
		
		$sRetVal = 
			   $sWEBLAYER . "?" . 
			   "class=$sClassName&m=$sMethodName&" .
			   $sParam . "pc=$iParameterCount";
	 
		return ($sRetVal);
	}
	 
	 
	 /**
	  * Make proper action for HTML form
	  * @param $_sTarget is the full name to called method, in the 
	  *        format: ClassName.methodName.
	  * @param $_aParam Array representing collections of parameters
	  *        to pass to the invoked method.
	  * @return String of HTML Form hidden variables to embed to the
	  *         template containing the method-call and the params.
      * @author Yoseph Nandana (yoseph@duahati.com)
	  */
	function #String
		&makeTargetForm ($_sTarget, $_aParam)
	{
		$sWEBLAYER = "webdispatch.php";
		$aClassMethod = explode (".", $_sTarget);
		$sClassName = $aClassMethod[0];
		$sMethodName = $aClassMethod[1];

		$sParam = "";
		$iParameterCount = sizeof($_aParam);

		for ($i=0; $i < $iParameterCount; $i++) {
		   $aParamElement = each ($_aParam);
 		   //$sParam = $sParam . "p$i=" . $aParamElement['value'];
		   $sParam .= "<input type=\"Hidden\" name=\"p$i\" value=\"" .
			      $aParamElement['value'] . "\">\n";
    	}

		$sParam .= "<input type=\"Hidden\" name=\"pc\" value=\"" .
			      $iParameterCount . "\">\n";
			   
		$sRetVal = 
			   $sWEBLAYER . "\">\n" .
			   "<input type=\"Hidden\" name=\"class\" value=\"" . $sClassName . "\">\n" .
			   "<input type=\"Hidden\" name=\"m\" value=\"" . $sMethodName . "\">\n" .
			   $sParam;
			
		return ($sRetVal);
	}

}


?>