<?php

namespace pschocke\GoogleMapsLinks\Tests;

use PHPUnit\Framework\TestCase;
use pschocke\GoogleMapsLinks\GMapsDirection;
use pschocke\GoogleMapsLinks\GMapsLocation;

class DirectionTest extends TestCase
{
    /** @test */
    public function it_can_generate_a_direction()
    {
        $expected = "https://www.google.com/maps/dir/?api=1&origin=Elbphilharmonie+Hamburg&travelmode=driving";
        $this->assertSame($expected, (new GMapsDirection())->from('Elbphilharmonie Hamburg')->get());
    }

    /** @test */
    public function it_can_generate_a_direction_with_destination()
    {
        $expected = "https://www.google.com/maps/dir/?api=1&origin=Elbphilharmonie+Hamburg&destination=alter+Fischmarkt+Hamburg&travelmode=driving";
        $this->assertSame($expected, (new GMapsDirection())->from('Elbphilharmonie Hamburg')->to('alter Fischmarkt Hamburg')->get());
    }

    /** @test */
    public function it_can_generate_a_direction_with_destination_without_origin()
    {
        $expected = "https://www.google.com/maps/dir/?api=1&destination=alter+Fischmarkt+Hamburg&travelmode=driving";
        $this->assertSame($expected, (new GMapsDirection())->to('alter Fischmarkt Hamburg')->get());
    }

    /** @test */
    public function it_can_generate_a_direction_with_destination_and_travel_mode()
    {
        $expected = "https://www.google.com/maps/dir/?api=1&origin=Elbphilharmonie+Hamburg&destination=alter+Fischmarkt+Hamburg&travelmode=bicycling";
        $this->assertSame($expected, (new GMapsDirection())->from('Elbphilharmonie Hamburg')->to('alter Fischmarkt Hamburg')->travelMode('bicycling')->get());
    }
}
