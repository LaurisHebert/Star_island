<?php
namespace Models;
class Model
{
    public function getArray(): array
    {
        return get_object_vars($this);
    }
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

}