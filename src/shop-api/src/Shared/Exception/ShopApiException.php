<?php

namespace ShopApi\Shared\Exception;

use Throwable;

class ShopApiException extends \RuntimeException
{
    public function __construct(
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
        array $messages = [],
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getMessages(): array
    {
        return $this->messages;
    }
}
