<?php


namespace App\Core\CommandBus\Command\User;
use NextCv\Modules\User\Repository\UserRepository;

class AddFriendHandler
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(AddFriendCommand $command): void
    {
        $this->userRepository->addFriend($command->getUserId(), $command->getfriendId());
    }
}