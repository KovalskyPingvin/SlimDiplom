<?php
// app/Twig/Extensions/TwigExtensions.php

namespace App\Twig\Extensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigExtensions extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('truncate', [$this, 'truncate']),
        ];
    }

    public function truncate(string $str, int $length = 20): string
    {
        $str = trim($str);
        if (mb_strlen($str, 'UTF-8') > $length) {
            return mb_substr($str, 0, $length, 'UTF-8') . '...';
        }
        return $str;
    }
}