<?php
namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Model\Product;
use Symfony\Contracts\EventDispatcher\Event;

class ProductEvent extends Event
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * ProductEvent constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }
}