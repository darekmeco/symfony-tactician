<?php

namespace NextCv\Modules\User\Repository;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ManagerRegistry;
use NextCv\Modules\User\Entity\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    /**
     * @param int $userId
     * @param int $friendId
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function addFriend(int $userId, int $friendId)
    {
        $user = $this->find($userId);
        $friend = $this->find($friendId);
        $currentFriends = $user->getMyFriends();

        if (!$currentFriends->contains($friend)) {
            $currentFriends->add($friend);
        }

        $this->_em->persist($user);
        $this->_em->flush();
    }

    /**
     * @param int $userId
     * @param array $friendIds
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function syncFriends(int $userId, array $friendIds)
    {
        $user = $this->find($userId);
        $currentFriends = $user->getMyFriends();

        $syncFriends = new ArrayCollection($this->findBy(['id' => $friendIds]));
        $currentFriends->map(function ($row) use ($syncFriends, $currentFriends) {
            if (!$syncFriends->contains($row)) {
                $currentFriends->removeElement($row);
            }
        });

        $syncFriends->map(function ($row) use ($syncFriends, $currentFriends) {
            if (!$currentFriends->contains($row)) {
                $currentFriends->add($row);
            }
        });

        $this->_em->persist($user);
        $this->_em->flush();

    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
