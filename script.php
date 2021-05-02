<?php
/*
 * @package    Instance Change Package
 * @version    1.0.0
 * @author     Septdir Workshop - septdir.com
 * @copyright  Copyright (c) 2018 - 2021 Septdir Workshop. All rights reserved.
 * @license    GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link       https://www.septdir.com/
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\Adapter\PackageAdapter;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Version;

class pkg_instance_changeInstallerScript
{
	/**
	 * Minimum PHP version required to install the extension.
	 *
	 * @var  string
	 *
	 * @since  0.0.0
	 */
	protected $minimumPhp = '7.0';

	/**
	 * Minimum Joomla version required to install the extension.
	 *
	 * @var  string
	 *
	 * @since  0.0.0
	 */
	protected $minimumJoomla = '3.9.0';

	/**
	 * Runs right before any installation action.
	 *
	 * @param   string                           $type    Type of PostFlight action.
	 * @param   InstallerAdapter|PackageAdapter  $parent  Parent object calling object.
	 *
	 * @throws  Exception
	 *
	 * @return  boolean True on success, false on failure.
	 *
	 * @since  0.0.0
	 */
	function preflight($type, $parent)
	{
		// Check compatible
		if (!$this->checkCompatible('PKG_INSTANCE_CHANGE')) return false;

		return true;
	}

	/**
	 * Method to check compatible.
	 *
	 * @param   string  $prefix  Language constants prefix.
	 *
	 * @throws  Exception
	 *
	 * @return  boolean True on success, false on failure.
	 *
	 * @since  0.0.0
	 */
	protected function checkCompatible($prefix = null)
	{
		// Check old Joomla
		if (!class_exists('Joomla\CMS\Version'))
		{
			JFactory::getApplication()->enqueueMessage(JText::sprintf($prefix . 'ERROR_COMPATIBLE_JOOMLA',
				$this->minimumJoomla), 'error');

			return false;
		}

		$app = Factory::getApplication();

		// Check PHP
		if (!(version_compare(PHP_VERSION, $this->minimumPhp) >= 0))
		{
			$app->enqueueMessage(Text::sprintf($prefix . 'ERROR_COMPATIBLE_PHP', $this->minimumPhp),
				'error');

			return false;
		}

		// Check joomla version
		if (!(new Version())->isCompatible($this->minimumJoomla))
		{
			$app->enqueueMessage(Text::sprintf($prefix . 'ERROR_COMPATIBLE_JOOMLA', $this->minimumJoomla),
				'error');

			return false;
		}


		return true;
	}
}