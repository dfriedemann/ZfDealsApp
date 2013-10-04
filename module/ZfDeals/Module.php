<?php
namespace ZfDeals;

class Module
{
	/* Wo ist die Configuration zu finden ? */
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

	/* Welches Autoload soll verwendet werden */
	public function getAutoloaderConfig()
	{
		return array(
				'Zend\Loader\StandardAutoloader' => array(
						'namespaces' => array(
								__NAMESPACE__ => __DIR__.'/src/'.__NAMESPACE__,
						),
							
				),
		);
	}
	
	public function init(\Zend\ModuleManager\ModuleManager $moduleManager)
	{
		$sharedEvents = $moduleManager->getEventManager()->getSharedManager();
		$sharedEvents->attach(
				'ZfDeals\Controller\AdminController',
				'dispatch',
						function($e) {
							$controller = $e->getTarget();
							$controller->layout('zf-deals/layout/admin');
						},
				100		
				);
	}
}