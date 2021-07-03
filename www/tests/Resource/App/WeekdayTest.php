<?php

declare(strict_types=1);

use BEAR\Resource\ResourceInterface;
use MyVendor\MyProject\Exception\InvalidDateTime;
use MyVendor\MyProject\Injector;
use PHPUnit\Framework\TestCase;

class WeekdayTest extends TestCase
{
    private ResourceInterface $resource;

    protected function setUp(): void
    {
        $injector = Injector::getInstance('app');
        $this->resource = $injector->getInstance(ResourceInterface::class);
    }

    public function testOnGet()
    {
        $ro = $this->resource->get('app://self/weekday', ['year' => '2001', 'month' => '1', 'day' => '1']);
        $this->assertSame(200, $ro->code);
        $this->assertSame('Mon', $ro->body['weekday']);
    }

    public function testInvalidDateTime(): void
    {
        $this->expectException(InvalidDateTime::class);
        $this->resource->get('app://self/weekday', ['year' => '-1', 'month' => '-1', 'day' => '1']);
    }
}