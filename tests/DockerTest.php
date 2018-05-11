<?php

namespace SimonDevelop\Test;

use \PHPUnit\Framework\TestCase;
use \SimonDevelop\Docker;

class DockerTest extends TestCase
{
    /**
     * Constructor test
     */
    public function testInitConstructor()
    {
        $Docker = new Docker();
        $this->assertEquals("", $Docker->getImage());
        $this->assertEquals([], $Docker->getPorts());
        $this->assertEquals([], $Docker->getVolumes());
        return $Docker;
    }

    /**
     * Constructor test with params
     */
    public function testInitConstructorWithParam()
    {
        $image = "nginx:latest";
        $ports = ["8080" => "80"];
        $volumes = ["/some/content" => "/usr/share/nginx/html"];
        $Docker = new Docker($image, $ports, $volumes);
        $this->assertEquals("nginx:latest", $Docker->getImage());
        $this->assertEquals(["8080" => "80"], $Docker->getPorts());
        $this->assertEquals(["/some/content" => "/usr/share/nginx/html"], $Docker->getVolumes());
    }

    /**
     * Getters and Setters test
     * @depends testInitConstructor
     */
    public function testGetterSetter($Docker)
    {
        $Docker->setImage("nginx:latest");
        $Docker->setPorts(["8080" => "80"]);
        $Docker->setVolumes(["/some/content" => "/usr/share/nginx/html"]);
        $this->assertEquals("nginx:latest", $Docker->getImage());
        $this->assertEquals(["8080" => "80"], $Docker->getPorts());
        $this->assertEquals(["/some/content" => "/usr/share/nginx/html"], $Docker->getVolumes());

        $Docker->removePorts(["8080" => "80"]);
        $Docker->removeVolumes(["/some/content" => "/usr/share/nginx/html"]);
        $this->assertEquals([], $Docker->getPorts());
        $this->assertEquals([], $Docker->getVolumes());

        $Docker->addPorts(["8080" => "80"]);
        $Docker->addVolumes(["/some/content" => "/usr/share/nginx/html"]);
        $this->assertEquals(["8080" => "80"], $Docker->getPorts());
        $this->assertEquals(["/some/content" => "/usr/share/nginx/html"], $Docker->getVolumes());
    }
}
