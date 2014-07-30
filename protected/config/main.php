<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('booster', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../extensions/YiiBooster');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Devel Yii',
	'defaultController'=>'site',
	'theme'=>'bootstrap3', // requires you to copy the theme under your themes directory
	'sourceLanguage' => 'en_uk',
	'language'=>'el_gr',

	// preloading 'log' component
	'preload'=>array(
		'log',
		'booster'
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.models.materials.*',
		'application.models.departments.*',
		'application.components.*',
		'ext.EDataTables.*',
		'booster.widgets.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'generatorPaths'=>array(
				'booster.gii',
			),
			'class'=>'system.gii.GiiModule',
			'password'=>'!@#!@#',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('192.168.43.0','127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'autoRenewCookie'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=devel_yii',
			'emulatePrepare' => true,
			'username' => 'yii_user',
			'password' => 'yii-p@sswd',
			'charset' => 'utf8',
			/*'enableParamLogging'=>true,
			'enableProfiling'=>true,*/
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*array(
					'class'=>'CWebLogRoute',
				),*/

			),
		),
		/*'request'=>array(
			'enableCookieValidation'=>true,//Securing Cookies
			'enableCsrfValidation'=>true,//Preventing CSRF Attacks
		),*/
		'session' => array (
			'timeout' => 3600
		),
		'booster'=>array(
			'class'=>'booster.components.Booster',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'akondylis@techmind.gr',
		'encryptionKey' => 'l^kj2#mn5j@%KJ3%r',
	),
);