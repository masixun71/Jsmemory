# Jsmemory


##### In a single server to share content in multiple processes, the use of linux shared memory. Encapsulates complex uses and provides a simplified way to make calls.

##### 在单台服务器多进程中共享内容，利用linux的共享内存。封装了复杂使用，提供简化的方法进行调用。



## Rely

- #### ext-msgpack





# note

##### By default, the use of shared memory is for static data or basically does not change or change the less data, when the data changes, you need to manually delete the shared memory. The future will be extended automatically delete function.

##### 默认情况下，共享内存的使用是针对于静态数据或者基本上不会变更或变更情况较少的数据，当数据有变更时，需要手动删除共享内存。未来会扩展释放删除功能。



## linux delete shm

```
ipcrm -m shmid
```
#### Set according to their own circumstances to delete

#### 根据自身情况设置删除



## Example

```
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


$storage = new Storage(0xff3,1000);


$sme = new Smemory($storage);

//$sme->set('a', '1233');
//$sme->set('b', new tt(1, 2));

var_dump($sme->get('a'));
var_dump($sme->get('b'));
```

