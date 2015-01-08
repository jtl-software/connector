<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class CategoryAttrI18n extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('categoryAttrId', 'int', null, true, true, false),
            new PropertyInfo('key', 'string', null, false, false, false),
            new PropertyInfo('localeName', 'string', null, false, false, false),
            new PropertyInfo('value', 'string', null, false, false, false),
        );
    }

	public function isMain()
	{
		return false;
	}
}