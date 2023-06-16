<?php

namespace Models;

use Utils\Database\PdoDb;

class TeamModel extends Model
{
    private int $id;
    private string $role;
    private string $nickname;
    private array $media;

    public function __construct($who)
    {
        $bdd = PdoDb::getInstance();
        $sql = "SELECT DISTINCT m.*, m_t.* FROM team t 
            INNER JOIN team_media t_m ON t.id = t_m.team_id 
            INNER JOIN media m on t_m.media_id = m.id 
            INNER JOIN media_media_type m_m_t ON m.id = m_m_t.media_id 
            INNER JOIN media_type m_t ON m_m_t.media_type_id = m_t.id
            WHERE t.nickname = '$who'";
        $bdd->select($sql);
    }
}