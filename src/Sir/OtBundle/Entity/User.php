<?php
/**
 * @author Rustam Ibragimov
 * @mail Rustam.Ibragimov@softline.ru
 * @date 07.11.13
 */

namespace Sir\OtBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

	/**
	 * @ORM\OneToMany(targetEntity="Usersubdivision", mappedBy="userid")
	 */
	protected $usersubdivision;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	public function __construct()
	{
		parent::__construct();
		$this->usersubdivision = new ArrayCollection();
		// your own logic
	}

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

	public function __toString()
	{
		return $this->username;
	}

    /**
     * Add usersubdivision
     *
     * @param \Sir\OtBundle\Entity\Usersubdivision $usersubdivision
     * @return User
     */
    public function addUsersubdivision(\Sir\OtBundle\Entity\Usersubdivision $usersubdivision)
    {
        $this->usersubdivision[] = $usersubdivision;
    
        return $this;
    }

    /**
     * Remove usersubdivision
     *
     * @param \Sir\OtBundle\Entity\Usersubdivision $usersubdivision
     */
    public function removeUsersubdivision(\Sir\OtBundle\Entity\Usersubdivision $usersubdivision)
    {
        $this->usersubdivision->removeElement($usersubdivision);
    }

    /**
     * Get usersubdivision
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsersubdivision()
    {
        return $this->usersubdivision;
    }
}