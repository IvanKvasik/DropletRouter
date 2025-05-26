# DropletRouter
#### A simple, lightweight PHP router for handling HTTP requests with minimal setup and no dependencies. Easily define routes for your web application using clean and readable syntax. Nothing less, nothing more

### Usage

The `Router` class only contains two static methods for handling requests with specific URI template:

`all(string $URI, callable $callback)` - used to handle all types of requests

`request(string $URI, callable $callback, string $method)` - used to handle specific type of requests

The request URI is compared to `$URI` parameter, template parts inside of curly brackets `{}` are handed over to `$callback` as parameters

### Example

```php
<?php
include 'Router.php';
use \Router\Router as Router;

Router::request('/part1/{type}/part2', function(int $type){
	echo $type;
}, 'GET');
```
