<?php

declare(strict_types=1);

namespace Verdient\Logger;

use Psr\Log\LoggerInterface;

/**
 * 包含记录器
 *
 * @author Verdient。
 */
trait HasLogger
{
    /**
     * 记录器
     *
     * @author Verdient。
     */
    protected ?LoggerInterface $logger = null;

    /**
     * 创建默认的记录器
     *
     * @author Verdient。
     */
    protected function createDefaultLogger(): LoggerInterface
    {
        return new NullLogger();
    }

    /**
     * 获取记录器
     *
     * @author Verdient。
     */
    public function logger(): LoggerInterface
    {
        if (!$this->logger) {
            $this->logger = $this->createDefaultLogger();
        }

        return $this->logger;
    }

    /**
     * 设置记录器
     *
     * @param LoggerInterface 记录器
     *
     * @author Verdient。
     */
    public function setLogger(LoggerInterface $logger): static
    {
        $this->logger = $logger;
        return $this;
    }
}
