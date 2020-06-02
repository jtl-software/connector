<?php
namespace Jtl\Connector\Core\Model;

use Jtl\Connector\Core\Definition\RelationType;

class SpecificValueImage extends AbstractImage
{
    /**
     * @return string
     */
    public function getRelationType(): string
    {
        return RelationType::SPECIFIC_VALUE;
    }
}