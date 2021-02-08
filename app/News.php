<?php

namespace App;

class News
{

    public static function getNewsByCategorySlug($slug) {
        $id = Category::getCategoryIdBySlug($slug);
        $news = [];
        foreach (static::getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
         return $news;
    }

    public static function getNews()
    {
        return json_decode(\File::get(storage_path() . '/news.json'), true);
    }

    public static function getNewsId($id)
    {
        if (array_key_exists($id, static::getNews()))
            return static::getNews()[$id];
        else
            return [];
    }


}
