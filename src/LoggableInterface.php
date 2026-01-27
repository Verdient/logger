<?php

namespace Verdient\Logger;

use Psr\Log\LoggerInterface;

/**
 * 可记录接口
 *
 * @author Verdient。
 */
interface LoggableInterface
{
    /**
     * 记录器
     *
     * @author Verdient。
     */
    public function logger(): LoggerInterface;

    /**
     * 设置记录器
     *
     * @param LoggerInterface $logger 记录器
     *
     * @author Verdient。
     */
    public function setLogger(LoggerInterface $logger): static;
}
