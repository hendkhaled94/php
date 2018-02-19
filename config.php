
<?php

require_once  __DIR__.'/Dependances/vendor/autoload.php';
require_once __DIR__.'/Dependances/vendor/php-activerecord/php-activerecord/ActiveRecord.php';

ob_start();
session_start();


ActiveRecord\Config::initialize(function($cfg)
{
  $cfg->set_model_directory(__DIR__.'/models');
  $cfg->set_connections(array('development' =>
    'mysql://root:1234@localhost/phpProject'));
});

$loader = new Twig_Loader_Filesystem(__DIR__.'/templates');

$twig = new Twig_Environment($loader,array(
    //'cache' => __DIR__.'/Dependances/compilation_cach',
));



function render($path,$context){
  global $twig;
  return $twig->render($path,$context);
}
