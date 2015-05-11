<?php

return [

	'enabled' => true,

	// Flowdock
	'api'    => null,

	// Message
	// You can use the following variables :
	// 1: User deploying
	// 2: Branch
	// 3: Connection and stage
	// 4: Host
	'messages' => [
		'before_deploy' => '{1} is deploying "{2}" on "{3}" ({4})',
		'after_deploy'  => '{1} finished deploying branch "{2}" on "{3}" ({4})',
	],
];
