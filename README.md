# php-placebo

Placebo is a PHP object creation broker and template engine intended to make the PHP source code more organized and clean:
* It encourage you to code in PHP as one-class-per-file
* Instantiate other class by referring the "classpath" and "packages"
* "Classpath" and "packages" are structured as filesystem directory simular to in Java
* Include a template engine (SmartyPlacebo.class.php) to be extended by classes acting as "View" objects
* Encourage single place for application config parameter in placebo.conf.php
