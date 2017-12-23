<?php
/**
 */

global $s_SMARTY_DIR;

class php_placebo_CCoDemo
{

  /**
   * Prepare proper message
   */
  function prepareMessage($sOriginalMessage)
  {
      $sReturnMessage = $sOriginalMessage;
      if($sOriginalMessage == "Hello") {
           $sReturnMessage = $sOriginalMessage . ", World!";
      }

      return ($sReturnMessage);
  }


}
