<?php

namespace Models;

use Utils\Database\PdoDb;

class PageModel extends Model
{
    public int $id;
    public string $meta_title;
    public string $meta_description;
    public array $content;
    public array $media;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->meta_title = $data['meta_title'];
        $this->meta_description = $data['meta_description'];
        $this->content = $data['content'];
        $this->media = $data['media'];
    }

    static function getPageContent($pageName)
    {
        //Connexion à la BDD
        $bdd = PdoDb::getInstance();


        // récupération des informations de la page
        $sqlPage = "
        SELECT id,
               meta_title, 
               meta_description
        
        FROM page
        
        WHERE meta_title = '$pageName'
        ";
        $page = $bdd->select($sqlPage, "fetch");

        // récupération du contenu de la page
        $sqlContent = " 
        SELECT title,
               description
        
        FROM content
        
        WHERE page_id = '$page[id]'
        ";
        $contents = $bdd->select($sqlContent);

        //rangement du tableau content et création d'un objet ContentModel
        foreach ($contents as $content) :
                $page['content'][$content['title']] = new ContentModel($content);
        endforeach;

        // récupération des médias de la page concerner et la page All
        $sqlMedia = "
        SELECT m.name,
               m.path,
               mt.type,
               p.meta_title
        
        FROM media m 
            
        INNER JOIN page                 AS p        ON p.id = m.pages_id
        INNER JOIN media_type           AS mt       ON mt.id = m.media_type_id
        
        WHERE p.meta_title='$pageName'  OR          p.meta_title='All'
        ";

        $medias = $bdd->select($sqlMedia);

        //rangement du tableau média et création d'un objet MediaModel
        foreach ($medias as $media) :
            $page['media'][$media['meta_title']][$media['type']][$media['name']] = new MediaModel($media);
        endforeach;

        return $page;
    }

}