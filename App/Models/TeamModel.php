<?php

namespace Models;

use Utils\Database\PdoDb;

class TeamModel extends Model
{
    public int $id;
    public string $meta_title;
    public string $meta_description;
    public array $content;

    public function __construct()
    {
        $this->content = [];
    }

    static function getTeam($teamRole = null): array
    {
        $bdd = PdoDb::getInstance();
        $where = null;

        if (!$teamRole === null){
            $where = "WHERE role = '$teamRole'";
        }
        $sqlTeam = "
        SELECT *
        
        FROM team
        
        $where";

        $teamArray = $bdd->select($sqlTeam);

        foreach ($teamArray as $key => $team) {
        $sqlTeamMedia = "
        SELECT m.name,
               m.path,
               mt.type,
               p.meta_title
               
        
        FROM media m 
            
        INNER JOIN team_media           AS tm       ON tm.media_id = m.id
        INNER JOIN team                 AS t        ON t.id = tm.team_id
        INNER JOIN media_type           AS mt       ON mt.id = m.media_type_id
        INNER JOIN page                 AS p        ON p.id = m.pages_id
        
        WHERE tm.team_id='$team[id]'
        ";

        $teamMedias = $bdd->select($sqlTeamMedia);
        foreach ($teamMedias as $teamMedia) :

            $teamArray[$key]['media'][] = new MediaModel($teamMedia);

        endforeach;

        }

        return $teamArray;
    }
}