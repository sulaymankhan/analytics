<?php

return [
	'providers'=>[
		 Spatie\Analytics\AnalyticsServiceProvider::class,
	],
	'aliases'=>[
		 'Analytics' => Spatie\Analytics\AnalyticsFacade::class,
	],
	//Your layout name
	'layout'=>env('ANALYTICS_LAYOUT','layouts.app')	
];