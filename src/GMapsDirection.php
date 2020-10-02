<?php

namespace pschocke\GoogleMapsLinks;

class GMapsDirection
{
    private $baseUrl = "https://www.google.com/maps/dir/?api=1";

    private $origin;
    private $destination;
    private $travelMode = "driving";

    public function from(string $location)
    {
        $this->origin = $location;

        return $this;
    }

    public function to(string $location)
    {
        $this->destination = $location;

        return $this;
    }

    public function travelMode(string $travelMode)
    {
        $this->travelMode = $travelMode;

        return $this;
    }

    /**
     * @return string
     */
    public function get()
    {
        $url = $this->baseUrl;
        $attribues = [];

        if ($this->origin) {
            $url .= "&origin=" . urlencode($this->origin);
        }

        if ($this->destination) {
            $url .= "&destination=" . urlencode($this->destination);
        }

        $url .= "&travelmode=" . urlencode($this->travelMode);

        return $url;
    }
}
