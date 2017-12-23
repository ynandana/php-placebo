<?php /* Smarty version 2.6.26, created on 2017-12-23 08:33:00
         compiled from page.html */ ?>
<html>
<head><title>Placebo Sample Page: <?php echo $this->_tpl_vars['sHelloMessage']; ?>
</title>
</head>

<body>
  <font face="Helvetica" color="#666666" />

  <table width="60%" border=0 cellspacing=0 cellpadding=0>
     <tr>
       <td width=180 align="Center" valign="Middle">
         <img src="placebophp_logo.png" />
       </td>
       <td width=40>&nbsp;</td>
       <td width="*" align="Left" valign="Top">
         <font face="Helvetica" color="#666666" />
          <big><?php echo $this->_tpl_vars['sHelloMessage']; ?>
 from Placebo</big>
          <hr size=1 />
          <small>
          Congratulations!<br />
          If you can see this page it means you have succesfuly installed
          Placebo sample application.

          <p>
            The sample application contains all needed to build your typical web application:
            <ul>
            <li><code>entrypoint.php</code>&nbsp;Entry point to your application</li>
            <li><code>src/php/placebo/CVoDemo.php</code>&nbsp;View object, handles output based on <a href="https://www.smarty.net/">SMARTY</a> templates</li>
            <li><code>src/php/placebo/CCoDemo.php</code>&nbsp;Controller object, containes application logic</li>
            <li><code>src/templates/page.html</code>&nbsp;HTML template to display this page, used by CVoDemo</li>
            </ul>
          </p>
        </small>
       </td>
     </tr>
   </table>
</body>
</html>
