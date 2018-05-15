# Docker references

### __constructor (string $image, array $ports = [], array $volumes = [])
```php
<?php

// example
$image = "nginx:latest";
$ports = [ // optionnal
    "8080" => "80"
];
$volumes = [ // optionnal
    "/some/content" => "/usr/share/nginx/html"
];

$obj = new Docker($image, $ports, $volumes);
```


### Work in progress...
