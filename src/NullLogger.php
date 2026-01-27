<?php

declare(strict_types=1);

namespace Verdient\Logger;

use Override;
use Psr\Log\AbstractLogger;
use Stringable;

/**
 * 空记录器
 *
 * @author Verdient。
 */
class NullLogger extends AbstractLogger
{
    /**
     * @author Verdient。
     */
    #[Override]
    public function log($level, string|Stringable $message, array $context = []): void {}
}
