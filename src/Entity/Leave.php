<?php

namespace BambooHrLeavesNotifier\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="leaves")
 */
class Leave
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
	private $type;

	/**
	 * @ORM\Column(type="string", nullable=false)
	 */
	private $status;

	/**
	 * @ORM\Column(type="integer", nullable=false)
	 */
	private $amount;

	/**
	 * @ORM\Column(type="datetime", nullable=false)
	 */
	private $dateStart;

	/**
	 * @ORM\Column(type="datetime", nullable=false)
	 */
	private $dateEnd;

	/**
	 * @ORM\ManyToOne(targetEntity="Employee", inversedBy="leaves")
	 * @ORM\JoinColumn(name="created_by", referencedColumnName="id", nullable=false)
	 */
	private $createdBy;

	/**
	 * @ORM\Column(type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @ORM\ManyToOne(targetEntity="Employee")
	 * @ORM\JoinColumn(name="updated_by", referencedColumnName="id", nullable=true)
	 */
	private $updatedBy;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $updatedAt;

	public function getId()
	{
		return $this->id;
	}

	public function getType()
	{
		return $this->type;
	}

	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

	public function getAmount()
	{
		return $this->amount;
	}

	public function setAmount($amount)
	{
		$this->amount = $amount;

		return $this;
	}

	public function getDateStart()
	{
		return $this->dateStart;
	}

	public function setDateStart($dateStart)
	{
		$this->dateStart = $dateStart;

		return $this;
	}

	public function getDateEnd()
	{
		return $this->dateEnd;
	}

	public function setDateEnd($dateEnd)
	{
		$this->dateEnd = $dateEnd;

		return $this;
	}

	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	public function getCreatedBy()
	{
		return $this->createdBy;
	}

	public function setCreatedBy(Employee $createdBy)
	{
		$this->createdBy = $createdBy;

		return $this;
	}

	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}

	public function setUpdatedAt($updatedAt)
	{
		$this->updatedAt = $updatedAt;

		return $this;
	}

	public function getUpdatedBy()
	{
		return $this->updatedBy;
	}

	public function setUpdatedBy(Employee $updatedBy)
	{
		$this->updatedBy = $updatedBy;

		return $this;
	}
}
