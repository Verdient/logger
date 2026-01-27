<?php

declare(strict_types=1);

namespace Verdient\Logger;

use Override;
use Psr\Log\LoggerInterface;
use Stringable;

/**
 * 记录器
 *
 * @author Verdient。
 */
class Logger implements LoggerInterface
{
    /**
     * @param LoggerInterface $logger 记录器
     * @param ?string $prefix 前缀
     *
     * @author Verdient。
     */
    public function __construct(
        protected LoggerInterface $logger,
        protected ?string $prefix = null
    ) {
        $this->logger = $logger;
        $this->prefix = (string) $prefix;
    }

    /**
     * 设置前缀
     *
     * @param string $prefix 前缀
     *
     * @author Verdient。
     */
    public function setPrefix(string $prefix): static
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * 获取日志组件
     *
     * @author Verdient。
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * 格式化消息
     *
     * @param string|Stringable $message 消息
     *
     * @author Verdient。
     */
    protected function formatMessage(string|Stringable $message): string
    {
        if ($this->prefix === null || $this->prefix === '') {
            return $message;
        }
        return trim($this->prefix) . ' ' . (string) $message;
    }

    /**
     * @author Verdient。
     */
    #[Override]
    public function emergency(string|Stringable $message, array $context = []): void
    {
        $this->logger->emergency($this->formatMessage($message), $context);
    }

    /**
     * @author Verdient。
     */
    #[Override]
    public function alert(string|Stringable $message, array $context = []): void
    {
        $this->logger->alert($this->formatMessage($message), $context);
    }

    /**
     * @author Verdient。
     */
    #[Override]
    public function critical(string|Stringable $message, array $context = []): void
    {
        $this->logger->critical($this->formatMessage($message), $context);
    }

    /**
     * @author Verdient。
     */
    #[Override]
    public function error(string|Stringable $message, array $context = []): void
    {
        $this->logger->error($this->formatMessage($message), $context);
    }

    /**
     * @author Verdient。
     */
    #[Override]
    public function warning(string|Stringable $message, array $context = []): void
    {
        $this->logger->warning($this->formatMessage($message), $context);
    }

    /**
     * @author Verdient。
     */
    #[Override]
    public function notice(string|Stringable $message, array $context = []): void
    {
        $this->logger->notice($this->formatMessage($message), $context);
    }

    /**
     * @author Verdient。
     */
    #[Override]
    public function info(string|Stringable $message, array $context = []): void
    {
        $this->logger->info($this->formatMessage($message), $context);
    }

    /**
     * @author Verdient。
     */
    #[Override]
    public function debug(string|Stringable $message, array $context = []): void
    {
        $this->logger->debug($this->formatMessage($message), $context);
    }
    /**
     * @author Verdient。
     */
    #[Override]
    public function log($level, string|Stringable $message, array $context = []): void
    {
        $this->logger->log($level, $this->formatMessage($message), $context);
    }
}
