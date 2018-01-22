<?php

namespace App\Services;

use App\User;

class Example
{
    public function getUsersData() {
        $datas = (new User)->get();
        //all logic should be implemented here
        $data = [
            'first_name' => 'james',
            'second_name' => 'smith'
        ];
        
        return $datas;
    }
}
