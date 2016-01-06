<?php
require __DIR__ . '/../src/Application.php';

$app = new Application();

class JsonService
{
    public function out($name)
    {
        return json_encode(array(
            'name' => $name
        ));
    }
}

class TxtService
{
    public function out($name)
    {
        return 'name is '. $name;
    }
}



$app['json_service'] = function() {
    return new JsonService();
};

$app['txt_service'] = function() {
    return new TxtService();
};

$jsonService = $app['json_service'];
var_dump($jsonService->out('javier'));

$txtService = $app['txt_service'];
var_dump($txtService->out('javier'));

$app->path('get','/hello', function() {
    return SomeController();
})
