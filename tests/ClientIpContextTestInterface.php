<?php

/**
 * This file is part of ClientIpExtension.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcon\Tests\ClientIp;

use Behat\Behat\Context\Context;
use Postcon\ClientIp\ClientIpInterface;

interface ClientIpContextTestInterface extends ClientIpInterface, Context
{
    const FQCN = __CLASS__;
}