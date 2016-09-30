<?php
/**
 * CRM Field Mask for SuiteCRM
 * @package CRM Field Mask for SuiteCRM
 * @copyright Brian Lasher http://brianlasher.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Brian Lasher <me@brianlasher.com>
 */


class crm_field_mask
{

	function load()
	{

		if( ($GLOBALS['_REQUEST']['module'] === 'ModuleBuilder' ) ||
//			 ($GLOBALS['_REQUEST']['module'] === 'Emails' ) ||
			 ($GLOBALS['_REQUEST']['action'] === 'ajaxui' ))
		{}
		else
		{
			$r = print_r($_REQUEST, true);
			$r = str_replace("\n", " ", $r);

			$GLOBALS['log']->debug( 'TABBED SUBPANELS EXECUTION MODULE= '. $GLOBALS['_REQUEST']['module'] );
			$GLOBALS['log']->debug( 'TABBED SUBPANELS EXECUTION ACTION= '. $GLOBALS['_REQUEST']['action'] );
			$GLOBALS['log']->debug( 'TABBED SUBPANELS EXECUTION $REQUEST=  '. $r );

			self::load_js();
		}
	}

	function load_js()
	{
		echo '<script type="text/javascript" src="custom/Extension/application/crm_field_mask/crm_field_mask.js"></script>';
	}


	function debug()
	{
		echo '<!-- ';
//		var_dump( $GLOBALS );
		var_dump( $GLOBALS['_REQUEST']['module'] );
		echo "\n";
		var_dump( $GLOBALS['_REQUEST']['action'] );
		echo "\n";
		echo ' -->';
	}


}

?>
