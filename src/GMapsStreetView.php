<?php

namespace pschocke\GoogleMapsLinks;

class GMapsStreetView
{
    private $baseUrl = "https://www.google.com/maps/@?api=1&map_action=pano";

    private $viewpoint;
    private $pano;
    private $heading;
    private $pitch;
    private $fov;

    /**
     * @param $lat
     * @param $long
     * @return string
     */
    public function viewpoint($lat, $long)
    {
        $this->viewpoint = [
            $lat,
            $long,
        ];

        return $this;
    }

    public function pano(string $panoId)
    {
        $this->pano = $panoId;

        return $this;
    }

    public function heading(string $heading)
    {
        $this->heading = $heading;

        return $this;
    }

    public function pitch(string $pitch)
    {
        $this->pitch = $pitch;

        return $this;
    }

    public function fov(int $fov)
    {
        $this->fov = $fov;

        return $this;
    }

    /**
     * @return string
     */
    public function get()
    {
        $url = $this->baseUrl;

        if ($this->viewpoint) {
            $url .= "&viewpoint=" . implode(',', $this->viewpoint);
        }

        if ($this->pano) {
            $url .= "&pano=" . urlencode($this->pano);
        }

        if ($this->heading) {
            $url .= "&heading=" . $this->heading;
        }

        if ($this->pitch) {
            $url .= "&pitch=" . $this->pitch;
        }

        if ($this->fov) {
            $url .= "&fov=" . $this->fov;
        }

        return $url;
    }
}
