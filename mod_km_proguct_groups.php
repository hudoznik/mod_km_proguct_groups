<?php 
/**
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
defined('_JEXEC') or die;

JEventDispatcher::getInstance()->trigger('onLoadKsen', array('ksenmart', array('common'), array(), array('angularJS' => 0)));

KSLoader::loadLocalHelpers(array('common'));
if (!class_exists('KsenmartHtmlHelper')) {
	require JPATH_ROOT . DS . 'components' . DS . 'com_ksenmart' . DS . 'helpers' . DS . 'head.php';
}

$km_params = JComponentHelper::getParams('com_ksenmart');
$module_name = basename(__FILE__, ".php");
$layout = $params->get('layout', 'default');

if (KsenmartHtmlHelper::AddHeadTags($module_name,$params) !== true){
	JHtml::script($module_name.'/default.js');
	if ($km_params->get('modules_styles', true)) {
		JHtml::stylesheet($module_name.'/'.array_pop(explode(':',"_:".$layout)).'.css');
	}
}

require_once(__DIR__ . DS . 'helper.php');
$modKMShopreviewsHelper = new modKMShopreviewsHelper();

$jinput     = JFactory::getApplication()->input;
if (!($jinput->getCmd('view', '') == 'comments' && $jinput->getCmd('layout', '') == 'reviews')){

	$user            = KSUsers::getUser();
	$reviews         = $modKMShopreviewsHelper->getReviews($params);
	if ($reviews){
		$Itemid			 = $modKMShopreviewsHelper->getReviewsItemid();
		$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
		
		require JModuleHelper::getLayoutPath($module_name, $layout);

	}
}