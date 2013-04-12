<?php
/**
 * (c) liuqingjie06 <liuqingjie06@yahoo.com.cn>
* @author 刘庆杰
* date 2013-4-12
*
* Type Form 用于创建用户表
*/

namespace Acme\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class UserType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username','text',array(
        		'label' => '用户编号',
        		));
        $builder->add('person',new PersonType(),array(
        		'label'=>'用户信息'));
        $builder->add('department','entity',array(
        		'class' => 'AcmeUserBundle:Department',
        		));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults(array(
    			'data_class' => 'Acme\UserBundle\Entity\User',
    			'cascade_validation' => true,
    	));
    }
    
    public function getName()
    {
        return 'user';
    }
    
}
