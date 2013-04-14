<?php

/*
 *
 * (c) liuqingjie06 <http://railmaps.org/>
 *
 * 部门管理接口
 */

namespace Acme\UserBundle\Model;

/**
 * @author liuqingjie6<liuqingjie06@yahoo.com.cn>
 */
interface DepartmentInterface
{

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
    public function getParent();
    
    /**
     * @param integer $id
     * 
     * @return iteger
     */
    public function setParent($id);

}
