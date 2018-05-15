# Docker references

### __constructor (string $image = "", array $ports = [], array $volumes = [])
```php
<?php

// example
$image = "nginx:latest"; // optionnal
$ports = [ // optionnal
    "8080" => "80"
];
$volumes = [ // optionnal
    "/some/content" => "/usr/share/nginx/html"
];

$obj = new Docker($image, $ports, $volumes);
```

- [Config functions](https://github.com/SimonDevelop/php-docker/blob/master/docs/chapter01.md)
- [Build/Run functions](https://github.com/SimonDevelop/php-docker/blob/master/docs/chapter02.md)
