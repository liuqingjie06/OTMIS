<?php
namespace Acme\TryBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TryBundle\Entity\Detection
 *
 * @ORM\Table()
 * @ORM\Entity
 * 
 * 检测数据表：
 * 	id integer
 *  date datatime
 * 	里程--mileage (flaot 30)；
 *  超限--erro (int*2）；
 *  左轨向--l_align（float 30）；
 *  右轨向--r_align (float 30);
 *  左高低--l_surf(flaot*30);
 *  右高低--r_surf(flaot*30);
 *  轨距--guage(flaot*30);
 *  三角坑--twist(float*30);
 *  TQI--TQI（float*30）；
 *  超标--oog（out of guage）（string*120）；
 *  速度--speed（integer 11）；
 *  标准--standard（string*120);
 *  
 */
class Detection
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
	 * 
	 * @ORM\Column(name="date",type="datetime")
	 * 
	 */
	private $date;
	
	/**
	 *  @ORM\Column(name="mileage",type="float",length=30)
	 *
	 */
	private $mileage;
	
	/**
	 * @ORM\Column(name="error",type="string",length=255)
	 */
	private $error;
	
	/**
	 * @ORM\Column(name="l_align",type="float",length=30)
	 *
	 */
	private $l_align;

	/**
	 * @ORM\Column(name="r_align",type="float",length=30)
	 *
	 */
	private $r_align;
	
	/**
	 * @ORM\Column(name="l_surf", type="float",length=30)
	 *
	 */
	private $l_surf;
	
	/**
	 * @ORM\Column(name="r_surf", type="float",length=30)
	 *
	 */
	private $r_surf;
	
	/**
	 * @ORM\Column(name="level", type="float",length=30)
	 *
	 */
	private $level;
	
	/**
	 * @ORM\Column(name="gauge", type="float",length=30)
	 *
	 */
	private $guage;

	/**
	 * @ORM\Column(name="twist", type="float",length=30)
	 *
	 */
	private $twist;

	/**
	 * @ORM\Column(name="tqi", type="float",length=30)
	 *
	 */
	private $tqi;

	/**
	 * @ORM\Column(name="oog", type="string",length=255)
	 *
	 */
	private $oog;
	
	/**
	 * 速度--speed（integer 11）；
	 * @ORM\Column(name="speed", type="integer",length=32)
	 *
	 */
	private $speed;
	
	/**
	 *  标准--standard（string*120);
	 * @ORM\Column(name="standard", type="string",length=255)
	 *
	 */
	private $standard;
	
	
	

	

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
     * Set date
     *
     * @param \DateTime $date
     * @return Detection
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set mileage
     *
     * @param float $mileage
     * @return Detection
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    
        return $this;
    }

    /**
     * Get mileage
     *
     * @return float 
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set error
     *
     * @param string $error
     * @return Detection
     */
    public function setError($error)
    {
        $this->error = $error;
    
        return $this;
    }

    /**
     * Get error
     *
     * @return string 
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set l_align
     *
     * @param float $lAlign
     * @return Detection
     */
    public function setLAlign($lAlign)
    {
        $this->l_align = $lAlign;
    
        return $this;
    }

    /**
     * Get l_align
     *
     * @return float 
     */
    public function getLAlign()
    {
        return $this->l_align;
    }

    /**
     * Set r_align
     *
     * @param float $rAlign
     * @return Detection
     */
    public function setRAlign($rAlign)
    {
        $this->r_align = $rAlign;
    
        return $this;
    }

    /**
     * Get r_align
     *
     * @return float 
     */
    public function getRAlign()
    {
        return $this->r_align;
    }

    /**
     * Set l_surf
     *
     * @param string $lSurf
     * @return Detection
     */
    public function setLSurf($lSurf)
    {
        $this->l_surf = $lSurf;
    
        return $this;
    }

    /**
     * Get l_surf
     *
     * @return string 
     */
    public function getLSurf()
    {
        return $this->l_surf;
    }

    /**
     * Set r_surf
     *
     * @param string $rSurf
     * @return Detection
     */
    public function setRSurf($rSurf)
    {
        $this->r_surf = $rSurf;
    
        return $this;
    }

    /**
     * Get r_surf
     *
     * @return string 
     */
    public function getRSurf()
    {
        return $this->r_surf;
    }

    /**
     * Set guage
     *
     * @param string $guage
     * @return Detection
     */
    public function setGuage($guage)
    {
        $this->guage = $guage;
    
        return $this;
    }

    /**
     * Get guage
     *
     * @return string 
     */
    public function getGuage()
    {
        return $this->guage;
    }

    /**
     * Set twist
     *
     * @param string $twist
     * @return Detection
     */
    public function setTwist($twist)
    {
        $this->twist = $twist;
    
        return $this;
    }

    /**
     * Get twist
     *
     * @return string 
     */
    public function getTwist()
    {
        return $this->twist;
    }

    /**
     * Set tqi
     *
     * @param string $tqi
     * @return Detection
     */
    public function setTqi($tqi)
    {
        $this->tqi = $tqi;
    
        return $this;
    }

    /**
     * Get tqi
     *
     * @return string 
     */
    public function getTqi()
    {
        return $this->tqi;
    }

    /**
     * Set oog
     *
     * @param string $oog
     * @return Detection
     */
    public function setOog($oog)
    {
        $this->oog = $oog;
    
        return $this;
    }

    /**
     * Get oog
     *
     * @return string 
     */
    public function getOog()
    {
        return $this->oog;
    }

    /**
     * Set speed
     *
     * @param string $speed
     * @return Detection
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    
        return $this;
    }

    /**
     * Get speed
     *
     * @return string 
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set standard
     *
     * @param string $standard
     * @return Detection
     */
    public function setStandard($standard)
    {
        $this->standard = $standard;
    
        return $this;
    }

    /**
     * Get standard
     *
     * @return string 
     */
    public function getStandard()
    {
        return $this->standard;
    }

    /**
     * Set level
     *
     * @param float $level
     * @return Detection
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return float 
     */
    public function getLevel()
    {
        return $this->level;
    }
}