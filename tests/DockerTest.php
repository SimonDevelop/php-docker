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
        $this->assertEquals("", $Docker->getName());
        $this->assertEquals([], $Docker->getEnv());
        $this->assertEquals([], $Docker->getArg());
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
        $this->assertEquals("", $Docker->getName());
        $this->assertEquals([], $Docker->getEnv());
        $this->assertEquals([], $Docker->getArg());

        $Docker->addEnv(["MYSQL_PASSWORD" => "root"]);
        $Docker->addArg(["SSH_PASSWORD" => "root"]);
        $this->assertEquals(["MYSQL_PASSWORD" => "root"], $Docker->getEnv());
        $this->assertEquals(["SSH_PASSWORD" => "root"], $Docker->getArg());

        $Docker->removePorts(["8080" => "80"]);
        $Docker->removeVolumes(["/some/content" => "/usr/share/nginx/html"]);
        $this->assertEquals([], $Docker->getPorts());
        $this->assertEquals([], $Docker->getVolumes());

        $Docker->removeEnv(["MYSQL_PASSWORD" => "root"]);
        $Docker->removeArg(["SSH_PASSWORD" => "root"]);
        $this->assertEquals([], $Docker->getEnv());
        $this->assertEquals([], $Docker->getArg());

        $Docker->addPorts(["8080" => "80"]);
        $Docker->addVolumes(["/some/content" => "/usr/share/nginx/html"]);
        $this->assertEquals(["8080" => "80"], $Docker->getPorts());
        $this->assertEquals(["/some/content" => "/usr/share/nginx/html"], $Docker->getVolumes());

        $Docker->setName("test");
        $this->assertEquals("test", $Docker->getName());

        $this->assertEquals(false, $Docker->getAutoPort());
        $Docker->setAutoPort(true);
        $this->assertEquals(true, $Docker->getAutoPort());
    }

    /**
     * Build function test
     * @depends testInitConstructor
     */
    public function testBuild($Docker)
    {
        $Docker->setTag("steam/01");
        $this->assertEquals("nginx:latest", $Docker->getImage());
        $Docker->addArg(["SSH_PASSWORD" => "root"]);
        $this->assertEquals("docker build -t steam/01 --build-arg SSH_PASSWORD=root .", $Docker->build());
    }

    /**
     * Run function test
     * @depends testInitConstructor
     */
    public function testRun($Docker)
    {
        $this->assertEquals("steam/01", $Docker->getImage());
        $Docker->setPorts([
            "27115" => "27015",
            "27115/udp" => "27015/udp"
        ]);
        $this->assertEquals([
            "27115" => "27015",
            "27115/udp" => "27015/udp"
        ], $Docker->getPorts());
        $Docker->setVolumes([
            "/home/test" => "/root"
        ]);
        $this->assertEquals([
            "/home/test" => "/root"
        ], $Docker->getVolumes());
        $Docker->setAutoPort(true);
        $this->assertEquals(
            "docker run -d -P -v /home/test:/root -p 27115:27015 -p 27115:27015/udp --name test steam/01",
            $Docker->run()
        );
    }
}
