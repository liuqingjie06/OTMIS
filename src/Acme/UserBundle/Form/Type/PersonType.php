<?php 
/**
 * (c) liuqingjie06 <liuqingjie06@yahoo.com.cn>
 * @author 刘庆杰
 * date 2013-4-12
 *
 * Type Form 用于创建人员信息表
 */

namespace Acme\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PersonType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('realname','text',array(
				 'label'  => '用户姓名',));
		$builder->add('sex','choice', array(
				'choices'   => array('m' => '男', 'f' => '女'),
				'required'  => false,));
		$builder->add('zhicheng','text',array(
				 'label'  => '职称',));
		$builder->add('level','text',array(
				 'label'  => '级别',));
		$builder->add('skill','text',array(
				 'label'  => '专业技术资格',));
		$builder->add('birthday','birthday', array(
						'label'  => '生日',
					    'widget' => 'single_text',
					    'format' => 'yyyy-MM-dd',
					));
		$builder->add('joinday','date', array(
						'label'  => '参见工作日期',
					    'widget' => 'single_text',
					    'format' => 'yyyy-MM-dd',
					));
		$builder->add('politics','text',array(
						'label'  => '政治面貌',));
		$builder->add('remark','textarea',array(
						'label'  => '备注',
					));

		
	}
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Acme\UserBundle\Entity\Person',
		));
	}
	
	public function getName()
	{
		return 'person';
	}
}
?>