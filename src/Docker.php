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
    * @var string Name
    */
    private $name;

    /**
    * @var string Tag
    */
    private $tag;

    /**
    * @var string Image
    */
    private $image;

    /**
    * @var array Ports list
    */
    private $ports;

    /**
    * @var bool Automatical port option
    */
    private $autoPort;

    /**
    * @var string restart option
    */
    private $restart;

    /**
     * @var array Volumes list
     */
    private $volumes;

    /**
     * @var array Links list
     */
    private $links;

    /**
     * @var array environnement variables list
     */
    private $env;

    /**
     * @var array argument variables list
     */
    private $arg;

    /**
     * @param string $image Image of docker (optionnal)
     * @param array $ports Ports list of docker (optionnal)
     * @param array $volumes Volumes list of docker (optionnal)
     */
    public function __construct(string $image = "", array $ports = [], array $volumes = [])
    {
        $this->name = "";
        $this->tag = "";
        $this->image = $image;
        $this->ports = $ports;
        $this->volumes = $volumes;
        $this->links = [];
        $this->env = [];
        $this->arg = [];
        $this->autoPort = false;
        $this->restart = "";
    }

    public function build(string $path = null)
    {
        if ($this->tag == "") {
            throw new \Exception("Unable build: You must set the 'tag' property before calling the 'build' method");
        } else {
            if ($path == null) {
                $absolut_path = ".";
            } else {
                $absolut_path = $path;
            }
            $command = "docker build -t ".$this->tag." ";
            foreach ($this->env as $k => $v) {
                $command .= "-e ".$k."=".$v." ";
            }
            foreach ($this->arg as $k => $v) {
                $command .= "--build-arg ".$k."=".$v." ";
            }
            $this->image = $this->tag;
            return $command.$absolut_path;
        }
    }

    public function run(string $image = null)
    {
        if ($image == null || $image == "") {
            if ($this->image == null || $this->image == "") {
                throw new \Exception("Unable build:
                Need the 'image' property or a correct 'image' parameter before calling the 'run' method");
            } else {
                $image = $this->image;
            }
        }
        $command = "docker run -d ";
        if ($this->autoPort == true) {
            $command .= "-P ";
        }
        foreach ($this->links as $k => $v) {
            $command .= "--link ".$k.":".$v." ";
        }
        foreach ($this->volumes as $k => $v) {
            $command .= "-v ".$k.":".$v." ";
        }
        foreach ($this->ports as $k => $v) {
            $key = str_replace("/udp", "", str_replace("/tcp", "", $k));
            $command .= "-p ".$key.":".$v." ";
        }
        foreach ($this->env as $k => $v) {
            $command .= "-e ".$k."=".$v." ";
        }
        if (!empty($this->restart)) {
            $command .= "--restart ".$this->restart." ";
        }
        if (!empty($this->name)) {
            $command .= "--name ".$this->name." ";
        }
        $command .= $image;
        return $command;
    }

    /**
     * @return string Name of docker
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name Name of docker
     * @return string Name of docker
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this->name;
    }

    /**
     * @return string Tag of docker
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $tag Tag of docker
     * @return string Tag of docker
     */
    public function setTag(string $tag)
    {
        $this->tag = $tag;
        return $this->tag;
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

    /**
     * @return array Links list of docker
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param array $links Links list of docker
     * @return array Links list of docker
     */
    public function setLinks(array $links)
    {
        $this->links = $links;
        return $this->links;
    }

    /**
     * @param array $links Links list of docker
     * @return array Links list of docker
     */
    public function addLinks(array $links)
    {
        foreach ($links as $k => $v) {
            $this->links[$k] = $v;
        }
        return $this->links;
    }

    /**
     * @param array $links Links list of docker
     * @return array Links list of docker
     */
    public function removeLinks(array $links)
    {
        foreach ($links as $k => $v) {
            if (isset($this->links[$k])) {
                unset($this->links[$k]);
            }
        }
        return $this->links;
    }

    /**
     * @return array Env list of docker
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param array $env Env list of docker
     * @return array Env list of docker
     */
    public function setEnv(array $env)
    {
        $this->env = $env;
        return $this->env;
    }

    /**
     * @param array $env Env list of docker
     * @return array Env list of docker
     */
    public function addEnv(array $env)
    {
        foreach ($env as $k => $v) {
            $this->env[$k] = $v;
        }
        return $this->env;
    }

    /**
     * @param array $env Env list of docker
     * @return array Env list of docker
     */
    public function removeEnv(array $env)
    {
        foreach ($env as $k => $v) {
            if (isset($this->env[$k])) {
                unset($this->env[$k]);
            }
        }
        return $this->env;
    }

    /**
     * @return array Arg list of docker
     */
    public function getArg()
    {
        return $this->arg;
    }

    /**
     * @param array $arg Arg list of docker
     * @return array Arg list of docker
     */
    public function setArg(array $arg)
    {
        $this->arg = $arg;
        return $this->arg;
    }

    /**
     * @param array $arg Arg list of docker
     * @return array Arg list of docker
     */
    public function addArg(array $arg)
    {
        foreach ($arg as $k => $v) {
            $this->arg[$k] = $v;
        }
        return $this->arg;
    }

    /**
     * @param array $arg Arg list of docker
     * @return array Arg list of docker
     */
    public function removeArg(array $arg)
    {
        foreach ($arg as $k => $v) {
            if (isset($this->arg[$k])) {
                unset($this->arg[$k]);
            }
        }
        return $this->arg;
    }

    /**
     * @return bool AutoPort of option docker
     */
    public function getAutoPort()
    {
        return $this->autoPort;
    }

    /**
     * @param bool $autoPort AutoPort option of docker
     * @return bool AutoPort option of docker
     */
    public function setAutoPort(bool $autoPort)
    {
        $this->autoPort = $autoPort;
        return $this->autoPort;
    }

    /**
     * @return string Restart option option of docker
     */
    public function getRestart()
    {
        return $this->restart;
    }

    /**
     * @param string $restart Restart option of docker
     * @return string Restart option of docker
     */
    public function setRestart(string $restart)
    {
        $this->restart = $restart;
        return $this->restart;
    }
}
