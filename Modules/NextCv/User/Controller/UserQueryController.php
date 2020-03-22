<?php

namespace NextCv\Modules\User\Controller;


use App\Core\Http\QueryController;
use App\Core\QueryBus\Query\AllUsersHandler;
use App\Core\QueryBus\Query\AllUsersQuery;
use App\Core\QueryBus\QueryBus;
use League\Tactician\CommandBus;
use NextCv\Modules\User\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\SerializerInterface;

class UserQueryController extends QueryController
{
    private UserRepository $repository;
    private SerializerInterface $serializer;

    public function __construct(QueryBus $queryBus, Security $security, UserRepository $repository, SerializerInterface $serializer, CommandBus $commandBus)
    {
        parent::__construct($queryBus, $security);
        $this->repository = $repository;
        $this->serializer = $serializer;
    }

    public function all(): JsonResponse
    {
        $query = new AllUsersQuery();
        $resumes = $this->ask($query);
        return new JsonResponse($this->serializer->normalize($resumes), Response::HTTP_OK);
    }

    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php'
        ]);
    }

}
