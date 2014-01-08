
 <?php	 	

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->post('#/login/', function () {
	echo "success request";
});

$app->put('/put', function () {
    echo 'This is a PUT route';
});

$app->delete('/delete', function () {
    echo 'This is a DELETE route';
});

$app->get('index.html#/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('index.html#/:user/', function () {
	echo $user;
});


$app->run();



 ?>
 