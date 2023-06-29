<?php

namespace Models;

use Utils\Database\PdoDb;

class TeamModel extends Model
{
    public int $id;
    public string $meta_title;
    public string $meta_description;
    public array $content;
    public array $media;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->meta_title = $data['meta_title'];
        $this->meta_description = $data['meta_description'];
        $this->content = $data['content'];
        $this->media = $data['media'];
    }

    static function getTeam($teamRole = null): array
    {

        $bdd = PdoDb::getInstance();

        $sqlPage ="
        SELECT *
        
        From page
        
        where meta_title = 'Team';
        ";
        $teamArray = $bdd->select($sqlPage, "fetch");
        $sqlAllMedias ="
        SELECT m.name,
               m.path,
               mt.type,
               p.meta_title
        
        From media m
        
        INNER JOIN page p on m.pages_id = p.id
        INNER JOIN media_type mt on mt.id = m.media_type_id
        
        where p.meta_title = 'All';
        ";
        $teamArray["media"] = $bdd->select($sqlAllMedias);
        foreach ($teamArray['media'] as $media) :
            $teamArray['media'][$media['meta_title']][$media['type']][$media['name']] = new MediaModel($media);
        endforeach;
        $where = null;
        if ($teamRole !== null)
        {
            $where = "WHERE role = '$teamRole'";
        }
        $sqlTeam = "
        SELECT *
        
        FROM team
        
        $where";
        $teamArray['content'] = $bdd->select($sqlTeam);
        
        foreach ($teamArray['content'] as $key => $team) {

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
        
        WHERE tm.team_id=$team[id]
        ";

        $teamMedias = $bdd->select($sqlTeamMedia);

        foreach ($teamMedias as $teamMedia) :

            $teamArray['content'][$key]['medias'][] = new MediaModel($teamMedia);

        endforeach;
        }
        foreach ($teamArray['content'] as $key => $team) :
            $teamArray['content'][$key] = new MemberModel($team);
        endforeach;

        return $teamArray;
    }
}