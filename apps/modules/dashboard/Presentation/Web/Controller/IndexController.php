<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $db = $this->getDI()->get('db');

        $sql = "SELECT * from users";

        $result = $db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

        echo var_dump($result);
    }
}