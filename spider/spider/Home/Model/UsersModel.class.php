<?php
namespace Home\Model;
use Think\Model;


class UsersModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('Name','require','用户名必须'),
        array('Name','','用户名已经存在！',0,'unique',1),
        //array('NickName','','昵称已经存在！',0,'unique',3),
        array('Password','require','密码必须'),
        );
    // 定义自动完成
    protected $_auto    =   array(
        array('CreateTime','date',1,'function',array('Y-m-d H:i:s')),
        array('Password','md5',1,'function'),
        );
}