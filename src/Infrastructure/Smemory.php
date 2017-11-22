<?php

namespace Jue\Jsmemory\Infrastructure;


use Jue\Jsmemory\Domain\IStorage;

class Smemory
{

    protected $storage;

    protected $data;


    public function __construct(IStorage $storage)
    {
        $this->storage = $storage;
    }


    public function exists()
    {
        return $this->storage->exists();
    }

    public function get($key)
    {

        if (empty($this->data) && $this->storage->exists() )
        {
            $this->data = $this->storage->read();
        }

        if (!isset($this->data[$key]))
        {
            return false;
        }
        else
        {
            return $this->data[$key];
        }
    }

    public function set($key, $value)
    {
        if (empty($this->data) && $this->storage->exists())
        {
            $this->data = $this->storage->read();
        }

        $this->data[$key] = $value;
        $this->storage->write($this->data);
    }

    public function getData()
    {
        return $this->data;
    }

}