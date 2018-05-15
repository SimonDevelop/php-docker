# Build/Run functions

### build (string $path = null)
```php
<?php
$path = "/absolut/path/of/dockerfile/";
$docker->setTag("USERNAME/name-of-tag");
$docker->build($path);
// Build the dockerfile
// The 'image' property automatically takes the value of the 'tag' property after build function
```

### run (string $image = null)
```php
<?php
// If you don't build before
$docker->run("mysql:5.7");
// else
$docker->run();
// run the docker
```

| Introduction | Previous chapter |
| :---------------------: | :--------------: |
| [Introduction](https://github.com/SimonDevelop/php-docker/blob/master/docs/introduction.md) | [Config functions](https://github.com/SimonDevelop/php-docker/blob/master/docs/chapter01.md) |
