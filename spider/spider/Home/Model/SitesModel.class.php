<?php
namespace Home\Model;
use Think\Model;


class SitesModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('Name','require','标题必须'),
        array('URL','require','地址必须'),
        array('Description','require','描述必须'),
        );
    // 定义自动完成
    protected $_auto    =   array(
        array('CreateTime','date',1,'function',array('Y-m-d H:i:s')),
        );
}