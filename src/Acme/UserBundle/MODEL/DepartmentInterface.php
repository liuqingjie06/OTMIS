<?php

/*
 *
 * (c) liuqingjie06 <http://railmaps.org/>
 *
 * 部门管理接口
 */

namespace Acme\UserBundl\Model;

/**
 * @author liuqingjie6<liuqingjie06@yahoo.com.cn>
 */
interface DepartmentInterface
{
     /**
     * @param string $role
     *
     * @return self
     */
    public function addRole($role);

    /**
     * @return integer
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name);
    
    /**
     * @return integer
     */
    public function getFatherId();
    
    /**
     * @param integer $id
     * 
     * @return iteger
     */
    public function setFatherId($id);

}
