<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

	protected $table = "news";

	public static $availableFields = ['id', 'title', 'author', 'status', 'description', 'created_at'];

	protected $fillable = [
		'title',
		'slug',
		'author',
		'status',
		'description'
	];

	/*protected $guarded = [
	  'id'
	];*/

	public function getTitleAttribute($value)
	{
		return mb_strtoupper($value);
	}

	protected $casts = [
		'isImage' => 'boolean'
	];

	public function categories(): BelongsToMany
	{
		return $this->belongsToMany(Category::class, 'categories_has_news',
			'news_id', 'category_id');
	}
}
