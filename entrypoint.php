<?php
/**
 * Main entry point to web application
 */

// get Placebo framework
include ("placebo.php");

$sMessage = "Hello";

$oDemoView = instantiate ($this, "php/placebo/CVoDemo");
echo ($oDemoView->helloPage($sMessage));

?>
