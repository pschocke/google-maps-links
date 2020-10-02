<?php

namespace pschocke\GoogleMapsLinks\Tests;

use PHPUnit\Framework\TestCase;
use pschocke\GoogleMapsLinks\GMapsMap;

class MapTest extends TestCase
{
    /** @test */
    public function it_can_generate_a_map_with_center()
    {
        $expected = "https://www.google.com/maps/@?api=1&map_action=map&center=-33.712206,150.311941";
        $this->assertSame($expected, (new GMapsMap())->center('-33.712206', '150.311941')->get());
    }

    /** @test */
    public function it_can_generate_a_map_with_center_and_zoom()
    {
        $expected = "https://www.google.com/maps/@?api=1&map_action=map&center=-33.712206,150.311941&zoom=12";
        $this->assertSame($expected, (new GMapsMap())->center('-33.712206', '150.311941')->zoom(12)->get());
    }

    /** @test */
    public function it_can_generate_a_map_with_center_and_zoom_and_basemap()
    {
        $expected = "https://www.google.com/maps/@?api=1&map_action=map&center=-33.712206,150.311941&zoom=12&basemap=terrain";
        $this->assertSame($expected, (new GMapsMap())->center('-33.712206', '150.311941')->zoom(12)->basemap('terrain')->get());
    }
}
