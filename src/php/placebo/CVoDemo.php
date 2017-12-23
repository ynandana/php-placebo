<?php
/**
 */

global $s_SMARTY_DIR;
include_once "$s_SMARTY_DIR/SmartyPlacebo.class.php";
class php_placebo_CVoDemo extends SmartyPlacebo
{

    // =====================================
    // Constructor
    // =====================================
    function php_placebo_CVoDemo() {
        global $s_TEMPLATE_DIR, $s_COMPILE_DIR;
        global $s_CONFIG_DIR, $s_CACHE_DIR;
        global $b_CACHING;

        $this->template_dir = $s_TEMPLATE_DIR;
        $this->compile_dir = $s_COMPILE_DIR;
        $this->config_dir = $s_CONFIG_DIR;
        $this->cache_dir = $s_CACHE_DIR;

        $this->caching = $b_CACHING;
    }


	/**
   * Show the 'compiled' HTML page as string
   * after assigning variable(s) to the template.
   */
    function #String
        helloPage ($sMessage)
    {
          $oDemoController = instantiate($this, "php/placebo/CCoDemo");
          $sProcessedMessage = $oDemoController->prepareMessage($sMessage);

		      $this->assign("sHelloMessage", $sProcessedMessage);
		      return ($this->toString ("page.html"));
	   }



//===============================================
//                END OF FILE
//===============================================
}
?>
