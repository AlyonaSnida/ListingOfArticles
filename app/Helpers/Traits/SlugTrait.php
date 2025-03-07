<?php

namespace App\Helpers\Traits;

trait SlugTrait
{
    public static function makeSlug($string)
    {
        $string = mb_strtolower(trim($string));

        $string = preg_replace('/[^a-zа-яё\s]/u', '', $string);

        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya', ' ' => '-',
        );

        $string = strtr($string, $converter);

        $string = preg_replace('/-+/', '-', $string);

        $string = trim($string, '-');

        return $string;
    }
}
