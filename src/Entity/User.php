<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * A book.
 *
 * @ORM\Entity
 */
class User
{
    /**
     * @var int The id of this user.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The name of this user.
     *
     * @ORM\Column
     */
    private $name;

    /**
     * @var \DateTimeInterface The date of creation of this user.
     *
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @var \DateTimeInterface The date of updating of this user.
     *
     * @ORM\Column(type="datetime")
     */
    private $updated_at;
}