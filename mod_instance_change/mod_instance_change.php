<?php
/*
 * @package    Instance Change Package
 * @version    __DEPLOY_VERSION__
 * @author     Septdir Workshop - septdir.com
 * @copyright  Copyright (c) 2018 - 2021 Septdir Workshop. All rights reserved.
 * @license    GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link       https://www.septdir.com/
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\Registry\Registry;
use Joomla\Utilities\ArrayHelper;

/**
 * @var object   $module Module object
 * @var Registry $params Module params
 */

$current = Uri::getInstance()->getHost();

$links = array();
foreach (ArrayHelper::fromObject($params->get('instances', new stdClass())) as $item)
{
	$uri  = Uri::getInstance($item['admin_url']);
	$host = $uri->getHost();

	$links[] = array(
		'title'  => Text::_($item['title']),
		'host'   => $host,
		'href'   => $item['admin_url'],
		'active' => ($current === $host)
	);
}

// Show module
if (empty($links)) return;
require ModuleHelper::getLayoutPath($module->module, $params->get('layout', 'default'));