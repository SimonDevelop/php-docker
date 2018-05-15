[![version](https://img.shields.io/badge/Version-0.0.2-brightgreen.svg)](https://github.com/SimonDevelop/php-docker/releases/tag/0.0.2)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg)](https://php.net/)
[![Build Status](https://travis-ci.org/SimonDevelop/array-organize.svg?branch=master)](https://travis-ci.org/SimonDevelop/php-docker)
[![GitHub license](https://img.shields.io/badge/License-MIT-blue.svg)](https://github.com/SimonDevelop/php-docker/blob/master/LICENSE)
# array-organize
Php library for managing docker and its commands.

```bash
composer require simondevelop/php-docker
```

## Example
```php
<?php
// Initiate
require "vendor/autoload.php";
use SimonDevelop\Docker;

$docker = new Docker("mysql:5.7", [
    "3306" => "3306"
], [
    "/my/own/datadir" => "/var/lib/mysql"
]);
$docker->setEnv([
    "MYSQL_ROOT_PASSWORD" => "my-secret-pw"
]);

echo $docker->run();
// docker run -d -v /my/own/datadir:/var/lib/mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=my-secret-pw mysql:5.7
```

Check this [docs](https://github.com/SimonDevelop/php-docker/blob/master/docs/introduction.md) for more.

#### Go to contribute !
- Check the [Code of Conduct](https://github.com/SimonDevelop/php-docker/blob/master/.github/CODE_OF_CONDUCT.md)
- Check the [Contributing file](https://github.com/SimonDevelop/php-docker/blob/master/.github/CONTRIBUTING.md)
- Check the [Pull Request Template](https://github.com/SimonDevelop/php-docker/blob/master/.github/PULL_REQUEST_TEMPLATE.md)
