<?php
namespace ZfDeals;

class Module
{
	/* Wo ist die Configuration zu finden ? */
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}
	
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespace' => array(
					__NAMESPACE__ => __DIR__.'/src'.__NAMESPACE__,
					),
					
				),
			);
	}
}