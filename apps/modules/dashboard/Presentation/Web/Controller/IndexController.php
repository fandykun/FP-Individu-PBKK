<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    /**
     * Action ini
     * Untuk sementara dibuat coba-coba 
     * karena masih learning by doing
     */
    public function indexAction()
    {
        // $db = $this->getDI()->get('db');

        // $sql = "SELECT * from users";

        // $result = $db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

        // echo var_dump($result);
        $hash = password_hash('fandykun', PASSWORD_BCRYPT);
        var_dump($hash);
        $hashed = password_hash('fandykun', PASSWORD_BCRYPT);
        var_dump($hashed); die();
    }
}