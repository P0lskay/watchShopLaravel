<?php

namespace App\Repositories;

use App\Models\ShopWatches as Model;

class ShopWatchRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getShow($id)
    {
        return $this->startCondition()->find($id);
    }

    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'category_id',
            'producer',
            'image_URI'
        ];

        $result = $this
            ->startCondition()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with([
                'category:id,title',
            ])
            ->paginate(25);

        return $result;
    }
}
