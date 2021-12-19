<?php

use core\Model;

class IndexModel extends Model
{

    public function getUsers()
    {
        return $this->query->row('SELECT * FROM users');
    }

}