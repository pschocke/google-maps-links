<?php

namespace pschocke\GoogleMapsLinks\Tests;

use PHPUnit\Framework\TestCase;
use pschocke\GoogleMapsLinks\GMapsStreetView;

class StreetViewTest extends TestCase
{
    /** @test */
    public function it_can_generate_a_street_view()
    {
        $expected = "https://www.google.com/maps/@?api=1&map_action=pano&viewpoint=48.857832,2.295226&pano=tu510ie_z4ptBZYo2BGEJg&heading=-45&pitch=38&fov=80";
        $this->assertSame($expected, (new GMapsStreetView())->pano('tu510ie_z4ptBZYo2BGEJg')->viewpoint('48.857832', '2.295226')->heading('-45')->pitch(38)->fov(80)->get());
    }
}
