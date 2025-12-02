<?php
// app/Common/Services/FlashService.php

namespace App\Common\Services;

class FlashService
{
    private const FLASH_KEY = 'flash_message';

    public function setMessage(string $message, string $type = 'info'): void
    {
        $_SESSION[self::FLASH_KEY] = [
            'message' => $message,
            'type' => $type,
        ];
    }

    public function getMessage(): ?array
    {
        $message = $_SESSION[self::FLASH_KEY] ?? null;
        if ($message) {
            unset($_SESSION[self::FLASH_KEY]); // ← Удаляем после получения
        }
        return $message;
    }

    public function hasMessage(): bool
    {
        return isset($_SESSION[self::FLASH_KEY]);
    }
}