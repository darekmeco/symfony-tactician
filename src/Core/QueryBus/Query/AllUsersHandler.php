<?php

namespace App\Core\QueryBus\Query;


class AllUsersHandler
{
    public function __construct()
    {
    }
    public function __invoke(AllUsersQuery $query)
    {
        dump('query handler');
    }
}
