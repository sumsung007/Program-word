<?php
/* $memcache->addServer('10.169.216.146',11211);
 

$checks = array(
    123,
    4542.32,
    'a string',
    true,
    array(123, 'string'),
    (object)array('key1' => 'value1'),
);
foreach ($checks as $i => $value) {
    print "Checking WRITE with Memcache\n";
    $key = 'cachetest' . $i;
    $memcache->set($key, $value);
    usleep(100);
    $val = $memcache->get($key);
 

   
}   */



 

 
//测试session读取是否正常 
session_start(); 
$_SESSION['username'] = "jb51.net"; 
echo session_id(); 

//从Memcache中读取session 
$m = new Memcache(); 
$m->connect('10.169.216.146', 11211); 
//或者这样 
//$mem->addServer("127.0.0.1", 11211) or die ("Can't add Memcache server 127.0.0.1:12000"); 

//根据session_id获取数据 

//本机 
//$session = $m->get(session_id()); //session_id：d527b6f983bd5e941f9fff318a31206b 

//另一台服务器，已知session id 
$session = $m->get(session_id()); 

echo $session."<br/>"; //会得到这样的数据：username|s:16:"pandao";，解析一下就可以得到相应的值了 
echo session_id()."<br/>"; 
exit; 
 
?>