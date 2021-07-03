<?php

declare(strict_types=1);

namespace MyVendor\MyProject;

interface MyLoggerInterface
{
    public function log(string $message): void;
}