<?php

namespace Models;

use Utils\Database\PdoDb;

class PageModel extends Model
{
    private string $meta_title;
    private string $title;
    private string $description;
    private array $media;
    /**
     * @return string
     */
    public function getMetaTitle(): string
    {
        return $this->meta_title;
    }

    /**
     * @param string $meta_title
     */
    public function setMetaTitle(string $meta_title): void
    {
        $this->meta_title = $meta_title;
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getMedia(): array
    {
        return $this->media;
    }

    /**
     * @param array $media
     */
    public function setMedia(array $media): void
    {
        $this->media = $media;
    }


    public function __construct(array $data)
    {
        $this->meta_title = $data['meta_title'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->media = $data['media'];
    }

    static function getPageContent($data)
    {
        $bdd = PdoDb::getInstance();

        // récupération des événements
        $sqlPage = "
        SELECT p.meta_title, c.title, c.description FROM page p 
        INNER JOIN content c on c.page_id = p.id 
        WHERE meta_title = '$data'
        ";

        $page = $bdd->select($sqlPage, "fetch");

        $sqlPageMedia = "
        SELECT m.name, m.path, mt.title, p.meta_title
        FROM media m 
        INNER JOIN media_media_type mmt on mmt.media_id = m.id
        INNER JOIN media_type mt on mt.id = mmt.media_type_id
        INNER JOIN page p on p.id = m.pages_id
        WHERE p.meta_title='$data' OR p.meta_title='All'
        ";
        $page['media'] = $bdd->select($sqlPageMedia);

        foreach ($page['media'] as $mediaKey => $mediaValue) {

            $page['media'][$mediaKey] = new MediaModel($mediaValue);

        }
        return $page;
    }
}