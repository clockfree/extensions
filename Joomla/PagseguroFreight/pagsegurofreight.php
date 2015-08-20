<?php
/**
 * @copyright	Copyright (C) 2015 Aran Dunkley
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * @package		Joomla.Plugin
 * @subpackage	System.pagsegurofreight
 * @since 2.5
 */
class plgSystemPagseguroFreight extends JPlugin {

	public function onExtensionAfterInstall() {

		// Install our extended shipping type if not already there
		$db = JFactory::getDbo();
		$tbl = '#__jshopping_shipping_ext_calc';
		$query = $db->getQuery( true );
		$query->select( '1' );
		$query->from( $tbl );
		$query->where( "name='PagseguroFreight'" );
		$db->setQuery( $query );
		if( !$db->loadRow() ) {
			$query = "INSERT INTO `$tbl` "
				. "(`id`, `name`, `alias`, `description`, `params`, `shipping_method`, `published`, `ordering`) "
				. "VALUES( 2, 'PagseguroFreight', 'sm_pagseguro_freight', 'PagseguroFreight', '', '', 1, 2 )";
			$db->setQuery( $query );
		}

		// Copy the script into the correct place

	}

	public function onExtensionAfterUnInstall() {
		
		// Remove our extended shipping type
		
		// Remove our shipping script
	}
}