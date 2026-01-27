<?php

declare(strict_types=1);

namespace Verdient\Logger;

use Override;
use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;
use Stringable;
use Verdient\cli\Console;

/**
 * 打印记录器
 *
 * @author Verdient。
 */
class StdoutLogger extends AbstractLogger
{
    /**
     * @author Verdient。
     */
    #[Override]
    public function log($level, string|Stringable $message, array $context = []): void
    {
        $keys = array_keys($context);

        foreach ($context as $key => $value) {
            if (is_object($value) && !$value instanceof Stringable) {
                $context[$key] = '<OBJECT> ' . $value::class;
            }
        }

        $search = array_map(function ($key) {
            return sprintf('{%s}', $key);
        }, $keys);

        $message = str_replace($search, $context, (string) $message);

        $formats = match ($level) {
            LogLevel::EMERGENCY, LogLevel::ALERT, LogLevel::CRITICAL => [Console::BG_RED],
            LogLevel::ERROR => [Console::FG_RED],
            LogLevel::WARNING, LogLevel::NOTICE => [Console::FG_YELLOW],
            default => [Console::FG_GREEN],
        };

        if ($level === LogLevel::DEBUG || $level === LogLevel::INFO || $level === LogLevel::NOTICE) {
            Console::output(Console::colour('[' . strtoupper($level) . ']', ...$formats) . ' ' . $message);
        } else {
            Console::error(Console::colour('[' . strtoupper($level) . ']', ...$formats) . ' ' . $message);
        }
    }
}
