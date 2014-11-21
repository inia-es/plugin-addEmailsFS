<?php

/**
 * @file AddEmailsFS.inc.php
 *
 * Copyright (c) 2003-2011 John Willinsky
 * Copyright (c) 2014 Instituto Nacional de Investigaci�n y Tecnolog�a Agraria y Alimentaria
 *
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * A contribution from:
 *    - 2014 Instituto Nacional de Investigacion y Tecnologia Agraria y Alimentaria
 *
 * @class AddEmailsFS
 * @ingroup plugins_block_webFeed
 *
 * @brief This plugin add bcc and cc to email assign to editor
 */

// $Id$


import('lib.pkp.classes.plugins.GenericPlugin');

class AddEmailsFSPlugin extends GenericPlugin {
	/**
	 * Get the  name of this plugin
	 * @return string
	 */
	function getName() {
		return 'AddEmailsFSPlugin';
	}
	/**
	 * Get the display name of this plugin
	 * @return string
	 */
	function getDisplayName() {
		return Locale::translate('plugins.generic.AddEmailsFS.displayName');
	}

	/**
	 * Get the description of this plugin
	 * @return string
	 */
	function getDescription() {
		return Locale::translate('plugins.generic.AddEmailsFS.description');
	}

	function register($category, $path) {
		if (parent::register($category, $path)) {
			Registry::set( 'AddEmailsFSPlugin', $this );
				HookRegistry::register('EditorAction::assignEditor',array(&$this, 'callback'));
				
			return true;
		}
		return false;
	}

	

	/**
	 * Register as a block plugin, even though this is a generic plugin.
	 * This will allow the plugin to behave as a block plugin, i.e. to
	 * have layout tasks performed on it.
	 * @param $hookName string
	 * @param $args array
	 */
	function callback($hookName, $args) {

		$email=& $args[3];
		$email->addBcc('forestsystems@inia.es', 'Forest Systems');
		return $args[3] = $email;
	 }	

}
?>
