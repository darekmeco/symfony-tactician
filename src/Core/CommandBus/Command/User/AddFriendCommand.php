<?php declare(strict_types=1);


namespace App\Core\CommandBus\Command\User;


class AddFriendCommand
{
    /**
     * @var int
     */
    private $userId;
    /**
     * @var int
     */
    private $friendId;

    public function __construct(int $userId, int $friendId)
    {
        $this->userId = $userId;
        $this->friendId = $friendId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getfriendId(): int
    {
        return $this->friendId;
    }
}