<?php

namespace pschocke\GoogleMapsLinks;

class GMapsMap
{
    private $baseUrl = "https://www.google.com/maps/@?api=1&map_action=map";

    private $center;
    private $zoom;
    private $basemap;
    private $layer;

    public function center(string $lat, string $long)
    {
        $this->center = [
            $lat,
            $long,
        ];

        return $this;
    }

    public function zoom(int $zoomLevel)
    {
        $this->zoom = $zoomLevel;

        return $this;
    }

    public function basemap(string $basemap)
    {
        $this->basemap = $basemap;

        return $this;
    }

    public function layer(string $layer)
    {
        $this->layer = $layer;

        return $this;
    }

    /**
     * @return string
     */
    public function get()
    {
        $url = $this->baseUrl;

        if ($this->center) {
            $url .= "&center=" . implode(',', $this->center);
        }

        if ($this->zoom) {
            $url .= "&zoom=" . $this->zoom;
        }

        if ($this->basemap) {
            $url .= "&basemap=" . $this->basemap;
        }

        if ($this->layer) {
            $url .= "&layer=" . $this->layer;
        }

        return $url;
    }
}
