<?php
namespace Models;
class Model
{
    public static function cleanUpValues(array $allValues): array
    {
        foreach ($allValues as $key => $value) {
            if (is_array($value)) {
                $allValues[$key] = self::cleanUpValues($value);
            } else {
                $allValues[$key] = addslashes(htmlspecialchars(trim(strip_tags($value))));
            }
        }
        return $allValues;
    }
    public function searchMediaByType(string $type, bool $actualPage = false): false|array
    {

        $result = [];
        if ($actualPage):
            $arrayToSearch[] = $this->media[$this->meta_title];
        else:
            $arrayToSearch = $this->media;
        endif;
        foreach ($arrayToSearch as $mediaCat) :
            foreach ($mediaCat as $key => $mediaType) :

                if ($key === $type) :
                    foreach ($mediaType as $media) :
                        $result[] = $media;
                    endforeach;
                endif;
            endforeach;
        endforeach;
        if (!empty($result)) {
            return $result;
        }
        else {
            return false;
        }
    }
}