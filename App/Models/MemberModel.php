<?php

namespace Models;

class MemberModel
{
    public int $id;
    public string $role;
    public string $nickname;
    public array $medias;

    public function __construct(array $data)
    {

        $this->id = $data['id'];
        $this->role = $data['role'];
        $this->nickname = $data['nickname'];
        if (empty($data['medias'])){
            $this->medias = ["lala","test"];
        }else{
        $this->medias = $data['medias'];
        }
    }

}