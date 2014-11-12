<?php
namespace Home\Model;
use Think\Model;
use Think\Model\RelationModel;


class UsersModel extends RelationModel{
    protected $_link = array(
        'Projects' => array(
            'mapping_type'      =>  self::MANY_TO_MANY,
            'class_name'        =>  'Projects',
            'mapping_name'      =>  'ProjectDetails',
            'foreign_key'       =>  'UserID',
            'relation_foreign_key'  =>  'ProjectID',
            'as_fields'         =>  'ProjectName',
            'relation_table'    =>  'Users_Projects',
            
        ),
    );
}
