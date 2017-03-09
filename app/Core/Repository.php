<?php
namespace App\Core;

use Illuminate\Database\Eloquent\Collection;

/**
 * Repository 抽象核心
 */
abstract class Repository
{
    /**
    * @var Illuminate\Database\Eloquent\Model
    */
    protected $model;
    protected $lastInstance;
    /**
    *  建構子依賴注入.
    *
    *  @param EloquentRepository:class
    */
    public function __construct(Model $model)
    {
        return $this->model = $model;
    }
    public function setModel(Model $model)
    {
        return $this->model = $model;
    }
    public function getModel()
    {
        return $this->model;
    }
    /*------------------------------------------------------------------------**
    ** 自訂抽象核心方法                                                          **
    **------------------------------------------------------------------------*/
    /**
    *  new一個實例，並回傳這個實例.
    *
    *  @param array
    */
    public function getNew($attributes)
    {
        return $this->model->newInstance($attributes);
    }
    /**
    *  new一個實例，並寫入資料庫，同時回傳這個實例.
    *
    *  @param array
    */
    public function create($data)
    {
        return $this->model->create($data);
    }
    /**
    *  如果傳進來的值是Model，將Model寫入資料庫
    *  如果傳進來的值是Array，new一個實例，內容是Array，並寫入資料庫.
    *
    *  @param array
    */
    public function save($data)
    {
        if ($data instanceof Model) {
            return $this->storeEloquentModel($data);
        } elseif (is_array($data)) {
            return $this->storeArray($data);
        }
    }
    /**
    *  回傳所有Model.
    *
    *  @return array|Builder
    */
    public function getAll()
    {
        return $this->model->orderBy('id', 'DESC');
    }

    /**
     * 回傳find的結果
     */
    public function find($key)
    {
        return $this->model->find($key);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
    * 將傳入的集合，依序刪除
    *
    * @param Illuminate\Database\Eloquent\Collection
    */
    public function deleteMany($collection)
    {
        if(!$collection instanceof Collection) return;

        foreach ($collection as $model) {
            $model->delete();
        }
    }
    /*------------------------------------------------------------------------**
    ** protected 輔助方法                                                      **
    **------------------------------------------------------------------------*/
    protected function storeEloquentModel($model)
    {
        if ($model->getDirty()) {
            return $model->save();
        } else {
            return $model->touch();
        }
    }
    protected function storeArray($data)
    {
        $model = $this->getNew($data);
        return $this->storeEloquentModel($model);
    }
}
