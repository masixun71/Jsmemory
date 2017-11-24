<?php

namespace Jue\Jsmemory\Infrastructure;


use Jue\Jsmemory\Domain\IStorage;

class Storage implements IStorage
{

    protected $shmKey;
    protected $shmId;
    protected $size;


    public function __construct($shmKey, $size)
    {
        $this->shmKey = $shmKey;
        $this->shmId = shmop_open($this->shmKey, "c", 0644, $size);
        $this->size = $size;
    }


    protected function generateKey()
    {
        $id = ftok(__FILE__, "b");
        return $id;
    }


    public function exists()
    {
        $status = @shmop_open($this->shmKey, "a", 0, 0);
        return (bool)$status;
    }

    public function read()
    {
        $data = shmop_read($this->shmId, 0, $this->size);
        if ($data[0] === "\000")
        {
            return [];
        }
        else
        {
            return @msgpack_unpack($data);
        }
    }

    public function write($data)
    {
        $msg = msgpack_pack($data);
        shmop_write($this->shmId, $msg, 0);
    }

    public function info()
    {
        return [
            'shm_key' => $this->shmKey,
            'shm_id' => $this->shmId
        ];
    }

}