<?php

/**
 * This file is part of ClientIpExtension.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcon\Tests\ClientIp;

use Postcon\ClientIp\ContextInitializer;

class ContextInitializerTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $clientIp = '1.2.3.4';

        $initializer = new ContextInitializer($clientIp);

        $context = $this->getMock(ClientIpContextTestInterface::class);
        $context->expects($this->once())->method('setClientIp')->with($clientIp);

        $initializer->initializeContext($context);
    }
}