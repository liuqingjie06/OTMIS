<?php
namespace Acme\TryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TryBundle\Entity\Testdata
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Testdata
{
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(name="x", type="float", length=30)
	 */
	protected $x;
	
	/**
	 * @ORM\Column(name="y", type="float", length=30)
	 */
	protected $y;
	

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set x
     *
     * @param float $x
     * @return Testdata
     */
    public function setX($x)
    {
        $this->x = $x;
    
        return $this;
    }

    /**
     * Get x
     *
     * @return float 
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param float $y
     * @return Testdata
     */
    public function setY($y)
    {
        $this->y = $y;
    
        return $this;
    }

    /**
     * Get y
     *
     * @return float 
     */
    public function getY()
    {
        return $this->y;
    }
}