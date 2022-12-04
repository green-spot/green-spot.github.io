# 組み込み関数(PHP)

- [サーバコンポーネント](../server-components/)
- [Page Props](../page-props)
- [Page Paths](../page-paths)

の中で使える、PHP用の関数をいくつか用意しています。

## h($str)

```php
function h($str){
  return htmlspecialchars($str);
}
```

### usage

```php
echo h("<script>alert(3);</script>");
#=> &lt;script&gt;alert(3);&lt;/script&gt;
```

## el($object, $key, $default=null)

```php
function el($object, $key, $default=null){
  if(is_array($object)){
    return isset($object[$key]) ? $object[$key] : $default;
  }else{
    return isset($object->$key) ? $object->$key : $default;
  }
}
```

### usage

```php
$array = ["x" => 1, "y" => 2];
echo el($array, "x", 100);
#=> 1

echo el($array, "y", 100);
#=> 2

echo el($array, "z", 100);
#=> 100
```
