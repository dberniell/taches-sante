<?php


namespace App\Repository;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function getTasksOfUser(User $user)
    {
        $queryBuilder = $this->createQueryBuilder('b');
        $query = $queryBuilder->select('b')
            ->from(Task::class, 'b')
            ->where('b.id_user = :id_user')
            ->setParameter('id_user', $user->getId())
            ->getQuery();

        return $query->execute();
    }
}