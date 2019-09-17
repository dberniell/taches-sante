<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * A task.
 *
 * @ORM\Entity
 */
class Task
{

    /**
     * @var int The id of this task.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int The user_id of this task.
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user_id;

    /**
     * @var string The title of the task.
     *
     * @ORM\Column
     */
    public $title;

    /**
     * @var string The description of this task.
     *
     * @ORM\Column(type="text")
     */
    public $description;

    /**
     * @var string The status of this task.
     *
     * @ORM\Column(type="text")
     */
    public $status;

    /**
     * @var \DateTimeInterface The date of creation of this task.
     *
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @var \DateTimeInterface The date of updating of this task.
     *
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->created_at;
    }

    /**
     * @param \DateTimeInterface $created_at
     */
    public function setCreatedAt(\DateTimeInterface $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updated_at;
    }

    /**
     * @param \DateTimeInterface $updated_at
     */
    public function setUpdatedAt(\DateTimeInterface $updated_at): void
    {
        $this->updated_at = $updated_at;
    }
}