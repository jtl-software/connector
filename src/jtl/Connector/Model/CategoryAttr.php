<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Localized category attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 */
class CategoryAttr extends DataModel
{
    /**
     * @var Identity Reference to category
     */
    protected $categoryId = null;

    /**
     * @var Identity Unique categoryAttr id
     */
    protected $id = null;

    /**
     * @var int Optional sort number
     */
    protected $sort = 0;

    /**
     * @param  Identity $categoryId Reference to category
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId)
    {
        return $this->setProperty('categoryId', $categoryId, 'Identity');
    }

    /**
     * @return Identity Reference to category
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param  Identity $id Unique categoryAttr id
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique categoryAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\CategoryAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'int');
    }

    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

 
}
