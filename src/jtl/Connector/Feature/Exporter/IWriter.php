<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Feature
 */

namespace jtl\Connector\Feature\Writer;

/**
 * Writer Interface
 * 
 * @author David Spickers <david.spickers@jtl-software.de>
 */
interface IWriter
{

    public function load($array);
}