<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'甜品屋管理系统',

	// preloading 'log' component
	'preload'=>array(
		'log',
		'bootstrap',
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
	),

	'modules'=>array(
		'user',

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
				'bootstrap.gii',
			)
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			'allowAutoLogin'=>true,
			'loginUrl'=>array('/user/login'),
		),
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			'showScriptName'=>false,
		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=stomanage',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
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
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),

		'bootstrap' => array(
			'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
	        'coreCss'=>true, // whether to register the Bootstrap core CSS (bootstrap.min.css), defaults to true
	        'responsiveCss'=>false, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
	        'plugins'=>array(
	            // Optionally you can configure the "global" plugins (button, popover, tooltip and transition)
	            // To prevent a plugin from being loaded set it to false as demonstrated below
	            'transition'=>false, // disable CSS transitions
	            'tooltip'=>array(
	                'selector'=>'a.tooltip', // bind the plugin tooltip to anchor tags with the 'tooltip' class
	                'options'=>array(
	                    'placement'=>'bottom', // place the tooltips below instead
	                ),
	            ),
	        ),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),

	'language'=>'ch',
);