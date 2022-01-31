<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;


class NewsQueryBuilder
{
   public function getModel(): Builder
   {
	   return News::query();
   }

   public function getOtherNews(int $id)
   {
	   return $this->getModel()->find($id);
   }
}