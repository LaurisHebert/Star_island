<?php

namespace Models;

class MediaModel extends Model
{
    public string $name;
    public string $path;
    public string $type;
    public string $meta_title;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->path = $data['path'];
        $this->type = $data['type'];
        $this->meta_title = $data['meta_title'];
    }

}