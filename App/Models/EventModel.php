<?php

namespace Models;

use Utils\Database\PdoDb;

class EventModel extends Model
{
    private int $id;
    private string $start_date;
    private string $end_date;
    private string $importance;
    private string $title;
    private string $description;
    private string $meta_title;
    private array $media;

    public function setMetaTitle(string $meta_title): void
    {
        $this->meta_title = $meta_title;
    }
    function __construct(array $data){
        $this->id = $data['id'];
        $this->start_date = $data['start_date'];
        $this->end_date = $data['end_date'];
        $this->importance = $data['importance'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->meta_title = $data['meta_title'];
        $this->media = $data['media'];
    }
    static function getEvents(string $importance = "MEDIUM")
    {
        $bdd = PdoDb::getInstance();

        // récupération des événements
        $sqlEvents = "
            SELECT e.id, start_date, end_date, importance, title, description, p.meta_title FROM event e 
            INNER JOIN event_content 		AS ec 		ON ec.event_id = e.id 
            INNER JOIN content 				AS c 		ON c.id = ec.content_id
            INNER JOIN page 				AS p 		ON p.id = c.page_id
            WHERE start_date < NOW() 
            AND end_date > NOW() 
            AND importance = '$importance'
            ORDER BY e.start_date DESC
        ";

        $events = $bdd->select($sqlEvents);

        foreach ($events as $key => $event) {
            
            $sqlMedia = "
                SELECT name, path, title, p.meta_title FROM page p

                INNER JOIN media				AS m		ON m.pages_id = p.id
                INNER JOIN media_media_type		AS mmt		ON mmt.media_id = m.id
                INNER JOIN media_type			AS mt 		ON mt.id = mmt.media_type_id
                
                WHERE p.meta_title = '$event[meta_title]' OR p.meta_title = 'All'
            ";
            $eventArray['media'] = $bdd->select($sqlMedia);

            foreach ($eventArray['media'] as $mediaKey => $mediaValue) {

                $event['media'][$mediaValue['meta_title']][] = new MediaModel($mediaValue);

            }

            $events[$key] = $event;
        }
        
        return $events;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->start_date;
    }

    /**
     * @param string $start_date
     */
    public function setStartDate(string $start_date): void
    {
        $this->start_date = $start_date;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->end_date;
    }

    /**
     * @param string $end_date
     */
    public function setEndDate(string $end_date): void
    {
        $this->end_date = $end_date;
    }

    /**
     * @return string
     */
    public function getImportance(): string
    {
        return $this->importance;
    }

    /**
     * @param string $importance
     */
    public function setImportance(string $importance): void
    {
        $this->importance = $importance;
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
}