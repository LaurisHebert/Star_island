<?php

namespace Models;

class MediaModel extends Model
{
    private string $name;
    private string $path;
    private string $title;
    private string $meta_title;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getMetaTitle(): int
    {
        return $this->meta_title;
    }

    /**
     * @param int $meta_title
     */
    public function setMetaTitle(int $meta_title): void
    {
        $this->meta_title = $meta_title;
    }
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->path = $data['path'];
        $this->title = $data['title'];
        $this->meta_title = $data['meta_title'];
    }

}