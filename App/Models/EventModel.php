<?php

namespace Models;

use Utils\Database\PdoDb;

class EventModel extends Model
{
    public int $id;
    public string $start_date;
    public string $end_date;
    public string $title;
    public string $description;
    public string $meta_title;
    public array $media;

    function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->start_date = $data['start_date'];
        $this->end_date = $data['end_date'];
        $this->description = $data['description'];
        $this->meta_title = $data['meta_title'];
        $this->media = $data['media'];
    }

    static function getEvents()
    {
        $bdd = PdoDb::getInstance();

        $sql = "
            SELECT e.id,
                   c.title,
                   p.meta_title
            
            FROM event e 
                
            INNER JOIN event_content 		AS ec 		ON ec.event_id = e.id 
            INNER JOIN content 				AS c 		ON c.id = ec.content_id
            INNER JOIN page 				AS p 		ON p.id = c.page_id
            
            WHERE e.start_date < NOW() AND NOW() < e.end_date  
            
            ORDER BY e.start_date DESC
        ";

        return $bdd->select($sql);
    }

    static function getEvent(int $id)
    {
        $bdd = PdoDb::getInstance();

        $sqlEvents = "
            SELECT e.id, e.start_date, e.end_date, c.title, c.description, p.meta_title, p.meta_description
            
            FROM event e 
                
            INNER JOIN event_content 		AS ec 		ON ec.event_id = e.id 
            INNER JOIN content 				AS c 		ON c.id = ec.content_id
            INNER JOIN page 				AS p 		ON p.id = c.page_id
            
            WHERE e.id = '$id'
        ";

        $event = $bdd->select($sqlEvents, 'fetch');

        $sqlMedia = "
            SELECT m.name, m.path, mt.type, p.meta_title
            
            FROM event_media em
                
            INNER JOIN media				AS m		ON m.id = em.media_id
            INNER JOIN page                 AS p        ON p.id = m.pages_id
            INNER JOIN media_type			AS mt 		ON mt.id = m.media_type_id
            
            WHERE p.meta_title = '$event[pageName]'
        ";
        $medias = $bdd->select($sqlMedia);

        $sqlMedia = "
        SELECT m.name, m.path, mt.type, p.meta_title 
        
        FROM media m 
            
        INNER JOIN page                 AS p        on p.id = m.pages_id
        INNER JOIN media_type           AS mt       on mt.id = m.media_type_id
        
        WHERE p.meta_title='$event[pageName]' OR p.meta_title='All'
        ";

        $medias = $bdd->select($sqlMedia);

        foreach ($medias as $media) :
            $event['media'][$media['meta_title']][$media['type']][] = new MediaModel($media);
        endforeach;

        return $event;
    }
}