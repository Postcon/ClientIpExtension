<?php

/**
 * This file is part of ClientIpExtension.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcon\ClientIp;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\Initializer\ContextInitializer as ContextInitializerInterface;

class ContextInitializer implements ContextInitializerInterface
{
    const FQCN = __CLASS__;

    /** @var string */
    private $clientIp;

    /**
     * @param string $clientIp
     */
    public function __construct($clientIp)
    {
        $this->clientIp = $clientIp;
    }

    /**
     * @param Context $context
     */
    public function initializeContext(Context $context)
    {
        if ($context instanceof ClientIpInterface) {
            $context->setClientIp($this->clientIp);
        }
    }
}