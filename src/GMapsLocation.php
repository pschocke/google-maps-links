<?php

namespace pschocke\GoogleMapsLinks;

class GMapsLocation
{
    private $baseUrl = "https://www.google.com/maps/search/?api=1";

    private $location;
    private $lat;
    private $long;
    public $placeId;

    public function __construct($placeId = null)
    {
        $this->placeId = $placeId;
    }

    /**
     * @param $lat
     * @param $long
     * @return string
     */
    public function coordinates($lat, $long)
    {
        $this->location = null;
        $this->lat = $lat;
        $this->long = $long;

        return $this->get();
    }

    /**
     * @param $location
     * @return string
     */
    public function location($location)
    {
        $this->lat = null;
        $this->long = null;
        $this->location = $location;

        return $this->get();
    }

    /**
     * @param $queryPlaceId
     * @return $this
     */
    public function queryPlaceId($queryPlaceId)
    {
        return new GMapsLocation($queryPlaceId);
    }

    /**
     * @return string
     */
    private function get()
    {
        $url = $this->baseUrl;
        $attribues = [];

        if ($this->lat) {
            $url .= "&query=" . urlencode($this->lat . "," . $this->long);
        }

        if ($this->location) {
            $url .= "&query=" . urlencode($this->location);
        }

        if ($this->placeId) {
            $url .= "&query_place_id=" . urlencode($this->placeId);
        }

        return $url;
    }
}
