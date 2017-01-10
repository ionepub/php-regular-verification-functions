<?php
	/**
    * 验证手机号是否正确
    * 仅支持中国大陆11位手机号
    * 移动：134、135、136、137、138、139、150、151、152、157、158、159、182、183、184、187、188、178(4G)、147(上网卡)；
    * 联通：130、131、132、155、156、185、186、176(4G)、145(上网卡)；
    * 电信：133、153、180、181、189 、177(4G)；
    * 卫星通信：1349
    * 虚拟运营商：170
    * @author lan
    * @param string $mobile
    * @return bool
    */
    function isMobile($mobile='') {
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }

    /**
    * 验证密码是否正确
    * 密码由6-16位大小写字母、数字和下划线组成
    * @author lan
    * @param string $password
    * @return bool
    */
    function isPassword($password=''){
        return preg_match("/^[0-9a-zA-Z_]{6,16}$/", $password) ? true : false;
    }

    /**
    * 验证邮箱是否正确
    * @author lan
    * @param string $email
    * @return bool
    */
    function isEmail($email=''){
        return preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i", $email) ? true : false;
    }

    /**
    * 验证用户名是否正确
    * 用户名由6-24位字母、数字组成，首位不能是数字
    * @param string $username
    * @return bool
    */
    function isUserName($username=''){
        return preg_match("/^[a-zA-Z]{1}[0-9a-zA-Z]{5,23}$/", $username) ? true : false;
    }

    /**
    * 验证身份证号码格式是否正确
    * 仅支持二代身份证
    * @author chiopin
    * @param string $idcard 身份证号码
    * @return boolean
    */
    function isIdCard($idcard=''){
        // 只能是18位
        if(strlen($idcard)!=18){
            return false;
        }
        
        $vCity = array(
        '11','12','13','14','15','21','22',
        '23','31','32','33','34','35','36',
        '37','41','42','43','44','45','46',
        '50','51','52','53','54','61','62',
        '63','64','65','71','81','82','91'
        );
        
        if (!preg_match('/^([\d]{17}[xX\d]|[\d]{15})$/', $idcard)) return false;
        
        if (!in_array(substr($idcard, 0, 2), $vCity)) return false;
        
        // 取出本体码
        $idcard_base = substr($idcard, 0, 17);
        
        // 取出校验码
        $verify_code = substr($idcard, 17, 1);
        
        // 加权因子
        $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
        
        // 校验码对应值
        $verify_code_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
        
        // 根据前17位计算校验码
        $total = 0;
        for($i=0; $i<17; $i++){
            $total += substr($idcard_base, $i, 1)*$factor[$i];
        }
        
        // 取模
        $mod = $total % 11;
        
        // 比较校验码
        if($verify_code == $verify_code_list[$mod]){
            return true;
        }else{
            return false;
        }
    }