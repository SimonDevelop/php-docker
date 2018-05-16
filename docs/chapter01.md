# Config functions

### setName (string $name)
```php
<?php
$docker->setName("nginx-test");
// Name for the docker container (default => "")
```

### setTag (string $name)
```php
<?php
$docker->setTag("USERNAME/nginx-test");
// Tag for the docker container  (default => "")
```

### setImage (string $image)
```php
<?php
$docker->setImage("nginx:latest");
// Image for the docker container (default => "")
```

---

### setAutoPort (bool $autoPort)
```php
<?php
$docker->setAutoPort(true);
// Parameter for the automatical set ports expose for the docker container (default => false)
```

### setRestart (string $restart)
```php
<?php
$docker->setRestart("always");
// Parameter for the restart flag for the docker container (default => null)
```

### setMemory (int $memory)
```php
<?php
$docker->setMemory(1024); // Mo
// Parameter for the memory flag for the docker container (default => 0)
```

---

### setPorts (array $ports)
```php
<?php
$docker->setPorts([
    "8080" => "80"
]);
// Ports list for the docker container (default => [])
```

### addPorts (array $ports)
```php
<?php
$docker->addPorts([
    "8080" => "80"
]);
// add ports in the Ports list for the docker container
```

### removePorts (array $ports)
```php
<?php
$docker->removePorts([
    "8080"
]);
// remove ports in the Ports list for the docker container
```

---

### setVolumes (array $volumes)
```php
<?php
$docker->setVolumes([
    "/my/own/datadir" => "/var/lib/mysql"
]);
// Volumes list for the docker container (default => [])
```

### addVolumes (array $volumes)
```php
<?php
$docker->addVolumes([
    "/my/own/datadir" => "/var/lib/mysql"
]);
// add volumes in the Volumes list for the docker container
```

### removeVolumes (array $volumes)
```php
<?php
$docker->removeVolumes([
    "/my/own/datadir"
]);
// remove volumes in the Volumes list for the docker container
```

---

### setLinks (array $links)
```php
<?php
$docker->setLinks([
    "mysql" => "db"
]);
// Links list for the docker container (default => [])
```

### addLinks (array $links)
```php
<?php
$docker->addLinks([
    "mysql" => "db"
]);
// add links in the Links list for the docker container
```

### removeLinks (array $links)
```php
<?php
$docker->removeLinks([
    "mysql" => "db"
]);
// remove links in the Links list for the docker container
```

---

### setArg (array $arg)
```php
<?php
$docker->setArg([
    "SSH_PASSWORD" => "root"
]);
// Arg list for the docker container (default => [])
```

### addArg (array $arg)
```php
<?php
$docker->addArg([
    "SSH_PASSWORD" => "root"
]);
// add argument variable in the Arg list for the docker container
```

### removeArg (array $arg)
```php
<?php
$docker->removeArg([
    "SSH_PASSWORD" => "root"
]);
// remove argument variable in the Arg list for the docker container
```

---

### setEnv (array $env)
```php
<?php
$docker->setEnv([
    "SSH_PASSWORD" => "root"
]);
// Env list for the docker container (default => [])
```

### addEnv (array $env)
```php
<?php
$docker->addEnv([
    "SSH_PASSWORD" => "root"
]);
// add Environment variables in the Env list for the docker container
```

### removeEnv (array $env)
```php
<?php
$docker->removeEnv([
    "SSH_PASSWORD" => "root"
]);
// remove Environment variables in the Env list for the docker container
```

| Introduction | Next chapter |
| :---------------------: | :--------------: |
| [Introduction](https://github.com/SimonDevelop/php-docker/blob/master/docs/introduction.md) | [Build/Run functions](https://github.com/SimonDevelop/php-docker/blob/master/docs/chapter02.md) |
