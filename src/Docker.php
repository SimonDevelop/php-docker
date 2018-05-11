<?php

/*
 * This file is the php-docker package.
 *
 * (c) Simon Micheneau <contact@simon-micheneau.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SimonDevelop;

/**
 * Class Docker
 * Managing docker and its commands.
 */
class Docker
{
    /**
    * @var string Image
    */
    private $image;

    /**
    * @var array Ports list
    */
    private $ports;

    /**
     * @var array Volumes list
     */
    private $volumes;

    /**
     * @param string $image Image of docker (optionnal)
     * @param array $ports Ports list of docker (optionnal)
     * @param array $volumes Volumes list of docker (optionnal)
     */
    public function __construct(string $image = "", array $ports = [], array $volumes = [])
    {
        $this->image = $image;
        $this->ports = $ports;
        $this->volumes = $volumes;
    }

    /**
     * @return string Image of docker
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image Image of docker
     * @return string Image of docker
     */
    public function setImage(string $image)
    {
        $this->image = $image;
        return $this->image;
    }

    /**
     * @return array Ports list of docker
     */
    public function getPorts()
    {
        return $this->ports;
    }

    /**
     * @param array $ports Ports list of docker
     * @return array Ports list of docker
     */
    public function setPorts(array $ports)
    {
        $this->ports = $ports;
        return $this->ports;
    }

    /**
     * @param array $ports Ports list of docker
     * @return array Ports list of docker
     */
    public function addPorts(array $ports)
    {
        foreach ($ports as $k => $v) {
            $this->ports[$k] = $v;
        }
        return $this->ports;
    }

    /**
     * @param array $ports Ports list of docker
     * @return array Ports list of docker
     */
    public function removePorts(array $ports)
    {
        foreach ($ports as $k => $v) {
            if (isset($this->ports[$k])) {
                unset($this->ports[$k]);
            }
        }
        return $this->ports;
    }

    /**
     * @return array Volumes list of docker
     */
    public function getVolumes()
    {
        return $this->volumes;
    }

    /**
     * @param array $volumes Volumes list of docker
     * @return array Volumes list of docker
     */
    public function setVolumes(array $volumes)
    {
        $this->volumes = $volumes;
        return $this->volumes;
    }

    /**
     * @param array $volumes Volumes list of docker
     * @return array Volumes list of docker
     */
    public function addVolumes(array $volumes)
    {
        foreach ($volumes as $k => $v) {
            $this->volumes[$k] = $v;
        }
        return $this->volumes;
    }

    /**
     * @param array $volumes Volumes list of docker
     * @return array Volumes list of docker
     */
    public function removeVolumes(array $volumes)
    {
        foreach ($volumes as $k => $v) {
            if (isset($this->volumes[$k])) {
                unset($this->volumes[$k]);
            }
        }
        return $this->volumes;
    }
}
