<?php

namespace App\Core\Http;

use App\Core\QueryBus\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;

class QueryController extends AbstractController
{
    private $queryBus;
    protected Security $security;

    public function __construct(QueryBus $queryBus, Security $security)
    {
        $this->queryBus = $queryBus;
        $this->security = $security;
    }

    public function ask($query)
    {
        return $this->queryBus->query($query);
    }

    public function guard()
    {
        $user = $this->security->getUser();
//        if (!$user) {
//            throw new UserDoesntExists();
//        }

        return $user;
    }
}