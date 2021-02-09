<?php

namespace App\Models;

use App\Rules\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class News extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['title', 'text', 'isPrivate', 'image', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public static function rules() {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => ['required', 'min:10', 'max:20', new Admin()],
            'text' => 'required',
            'category_id' => "required|exists:{$tableNameCategory},id",
            'image' => 'mimes:jpeg,png,bmp|max:1000',
            'isPrivate' => 'sometimes|in:1'
        ];
    }

    public static function attributeNames() {
        return [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category_id' => "Категория новости",
            'image' => "Изображение"
        ];
    }
}

