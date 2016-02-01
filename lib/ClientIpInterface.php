<?php

/**
 * This file is part of ClientIpExtension.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcon\ClientIpExtension;

interface ClientIpInterface
{
    /**
     * @param string $clientIp
     */
    public function setClientIp($clientIp);
}
