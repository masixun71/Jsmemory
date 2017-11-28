<?php

use Jue\Jsmemory\Infrastructure\Smemory;
use Jue\Jsmemory\Infrastructure\Storage;

require(__DIR__ . "/../src/Domain/IStorage.php");
require(__DIR__ . "/../src/Infrastructure/Smemory.php");
require(__DIR__ . "/../src/Infrastructure/Storage.php");


class tt
{

    public $a;
    public $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

}


$storage = new Storage(0xff3,1024);


$sme = new Smemory($storage);

$sme->set('a', '1233');
$sme->set('b', new tt(1, 2));
$sme->set('c', new tt(1, 2));
$sme->flush();

var_dump($sme->get('a'));
var_dump($sme->get('b'));
var_dump($sme->get('c'));
