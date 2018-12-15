<?php defined('BASEPATH') OR exit('No direct script access allowed');
$hook['pre_system'][] = [new yidas\Psr4Autoload, 'register'];
//$hook = Luthier\Hook::getHooks([
	/*'modules' => ['debug']*/
//]);