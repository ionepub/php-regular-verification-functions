# PHP常用正则验证函数

包含中国大陆手机号验证、密码验证、邮箱验证、用户名验证、二代身份证号码验证。

## 手机号验证

```php
    /**
    * 验证手机号是否正确
    * 移动：134、135、136、137、138、139、150、151、152、157、158、159、182、183、184、187、188、178(4G)、147(上网卡)、148、172、198；
    * 联通：130、131、132、155、156、185、186、176(4G)、145(上网卡)；146、166、171、175
    * 电信：133、153、180、181、189 、177(4G)；149、173、174、199
    * 卫星通信：1349
    * 虚拟运营商：170
    * http://www.cnblogs.com/zengxiangzhan/p/phone.html
    * @author lan
    * @param $mobile
    * @return bool
    */
    function isMobile($mobile='') {}
```

## 密码验证

```php
	/**
    * 验证密码是否正确
    * 密码由6-16位大小写字母、数字和下划线组成
    * @author lan
    * @param string $password
    * @return bool
    */
    function isPassword($password=''){}
```

## 邮箱验证

```php
	/**
    * 验证邮箱是否正确
    * @author lan
    * @param string $email
    * @return bool
    */
    function isEmail($email=''){}
```

## 用户名验证

```php
	/**
    * 验证用户名是否正确
    * 用户名由6-24位字母、数字组成，首位不能是数字
    * @param string $username
    * @return bool
    */
    function isUserName($username=''){}
```

## 二代身份证号码验证

```php
	/**
    * 验证身份证号码格式是否正确
    * 仅支持二代身份证
    * @author chiopin
    * @param string $idcard 身份证号码
    * @return boolean
    */
    function isIdCard($idcard=''){}
```
