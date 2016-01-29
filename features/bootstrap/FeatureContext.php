<?php

use Behat\Behat\Context\Context;
use Postcon\ClientIp\ClientIpInterface;

class FeatureContext implements Context, ClientIpInterface
{
    /**
     * @Given foo bar
     */
    public function fooBar()
    {
    }

    /**
     * @param string $clientIp
     */
    public function setClientIp($clientIp)
    {
        var_dump($clientIp);
    }
}
