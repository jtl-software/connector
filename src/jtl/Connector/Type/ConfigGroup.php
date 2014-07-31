<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Product extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('comment', 'string', '', false, false, false),
			new PropertyInfo('i18n', '\jtl\Connector\Model\ConfigGroupI18n', null, false, false, true),
			new PropertyInfo('image', '\jtl\Connector\Model\Byte[]', null, false, false, false),
			new PropertyInfo('maximumSelection', 'integer', 0, false, false, false),
			new PropertyInfo('minimumSelection', 'integer', 0, false, false, false),
			new PropertyInfo('sort', 'integer', 0, false, false, false),
			new PropertyInfo('type', 'integer', 0, false, false, false),
        );
    }
}