<?php

namespace NextCv\Modules\User\Controller;


use App\Core\CommandBus\Command\User\AddFriendCommand;
use League\Tactician\CommandBus;
use NextCv\Modules\User\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class UserCommandController extends AbstractController
{

    private $repository = null;
    private $serializer;
    private $commandBus;

    public function __construct(UserRepository $repository, SerializerInterface $serializer, CommandBus $commandBus)
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
         $this->commandBus = $commandBus;
    }

    public function all(): JsonResponse
    {
        $resumes = $this->repository->findAll();
        return new JsonResponse($this->serializer->normalize($resumes), Response::HTTP_OK);
    }

    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php'
        ]);
    }

    public function addFriends(Request $request)
    {
        //$this->repository->addFriend(52, 53);
        $command = new AddFriendCommand(52, 53);
        $this->commandBus->handle($command);
        return new JsonResponse(['status' => 'success1'], Response::HTTP_OK);
    }

    public function syncFriends(Request $request)
    {
        $this->repository->syncFriends(52, [56, 55]);
        return new JsonResponse(['status' => 'success2'], Response::HTTP_OK);
    }

}
