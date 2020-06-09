<?php

namespace pschocke\GoogleMapsLinks\Tests;

use PHPUnit\Framework\TestCase;
use pschocke\GoogleMapsLinks\GMapsLocation;

class LocationTest extends TestCase
{
    /** @test */
    public function it_can_generate_a_search_location()
    {
        $expected = "https://www.google.com/maps/search/?api=1&query=Elbphilharmonie+Hamburg";
        $this->assertSame($expected, (new GMapsLocation())->location('Elbphilharmonie Hamburg'));
    }

    /** @test */
    public function it_can_generate_a_coordinate_location()
    {
        $expected = "https://www.google.com/maps/search/?api=1&query=53.541321%2C9.983945";
        $this->assertSame($expected, (new GMapsLocation())->coordinates('53.541321', '9.983945'));
    }

    /** @test */
    public function it_can_generate_a_search_with_a_place_id()
    {
        $expected = "https://www.google.com/maps/search/?api=1&query=Elbphilharmonie+Hamburg&query_place_id=ChIJT8RwZwaPsUcRhkKYaCqr5LI";
        $actual = (new GMapsLocation())
                    ->queryPlaceId('ChIJT8RwZwaPsUcRhkKYaCqr5LI')
                    ->location('Elbphilharmonie Hamburg');

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_generate_a_coordinate_location_with_a_place_id()
    {
        $expected = "https://www.google.com/maps/search/?api=1&query=53.541321%2C9.983945&query_place_id=ChIJT8RwZwaPsUcRhkKYaCqr5LI";
        $actual = (new GMapsLocation())
            ->queryPlaceId('ChIJT8RwZwaPsUcRhkKYaCqr5LI')
            ->coordinates('53.541321', '9.983945');

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_forget_place_id()
    {
        $gmapslocation = new GMapsLocation();
        $expected = "https://www.google.com/maps/search/?api=1&query=53.541321%2C9.983945&query_place_id=ChIJT8RwZwaPsUcRhkKYaCqr5LI";
        $actual = $gmapslocation
            ->queryPlaceId('ChIJT8RwZwaPsUcRhkKYaCqr5LI')
            ->coordinates('53.541321', '9.983945');

        $this->assertSame($expected, $actual);

        $expected = "https://www.google.com/maps/search/?api=1&query=53.541321%2C9.983945";
        $this->assertSame($expected, $gmapslocation->coordinates('53.541321', '9.983945'));
    }
}
