<?php

namespace MohammadMahdi\Framework\Http;

class Response
{
    const HTTP_OK = 200;

    public function __construct(
        private ?string $content = '',
        private int $status = self::HTTP_OK,
        private array $headers = []
    )
    {
    }

    public function send(): void
    {
        echo $this->content;
    }
}