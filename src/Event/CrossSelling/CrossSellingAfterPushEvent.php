<?php
namespace jtl\Connector\Event\CrossSelling;

use Symfony\Contracts\EventDispatcher\Event;
use jtl\Connector\Model\CrossSelling;


class CrossSellingAfterPushEvent extends Event
{
    const EVENT_NAME = 'crossselling.after.push';

	protected $crossSelling;

    public function __construct(CrossSelling &$crossSelling)
    {
		$this->crossSelling = $crossSelling;
    }

    public function getCrossSelling()
    {
        return $this->crossSelling;
	}
	
}