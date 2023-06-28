<?php

namespace Models;

class MemberModel
{
    public int $id;
    public int $role;
    public int $nickname;
    public array $medias;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->role = $data['role'];
        $this->nickname = $data['nickname'];
        $this->medias = $data['medias'];
    }

}