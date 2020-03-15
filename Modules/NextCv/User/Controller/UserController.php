<?php

namespace NextCv\Modules\User\Controller;


use NextCv\Modules\User\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{

    private $repository = null;
    private $serializer;

    public function __construct(UserRepository $repository, SerializerInterface $serializer)
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
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
}
