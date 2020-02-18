<?php

namespace BambooHrLeavesNotifier\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="employees")
 */
class Employee
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", nullable=false)
	 */
	private $firstName;

	/**
	 * @ORM\Column(type="string", nullable=false)
	 */
	private $lastName;

	/**
	 * @ORM\OneToMany(targetEntity="Leave", mappedBy="createdBy")
	 * @var Leave[] An ArrayCollection of Leaves.
	 */
	private $leaves;

	public function getId()
	{
		return $this->id;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;

		return $this;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function setLastName($lastName)
	{
		$this->lastName = $lastName;

		return $this;
	}

	public function getLeaves()
	{
		return $this->leaves;
	}
}
