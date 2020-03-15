<?php


namespace App\Core\CommandBus\Command\User;


use App\Repository\UserRepository;

class AddFriendHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(AddFriendCommand $command)
    {
        $user = $this->userRepository->find($command->getUserId());
        $friend = $this->userRepository->find($command->getFirndId());

        $user->addFriend($friend);
    }
}