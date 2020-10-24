<?

namespace App\Repositories;

use App\Models\ShopCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class ShopCategoryRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startCondition()->find($id);
    }

    public function getForComboBox()
    {
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);
        
        $result[] = $this
            ->startCondition()
            ->selectRaw($columns)
            ->toBase()
            ->get();
        return $result;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startCondition()
            ->select($columns)
            ->paginate($perPage);
        
        return $result;
    }
}