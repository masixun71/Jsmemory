<?php

namespace Jue\Jsmemory\Domain;

interface IStorage
{

    public function exists();


    public function read();


    public function write($value);

}