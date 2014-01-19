<?php

class Hash
{
    //algo: md5, sha1, whirlpool, etc
    public static function create ($algo, $data, $key)
    {
        $context = hash_init($algo, HASH_HMAC, $key);
        hash_update($context, $data);
        return hash_final($context);    
    }
}
?>
