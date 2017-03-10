<?php

namespace App\Repositories\Contracts;

interface BaseRepository
{
  /**
   * Get all of the models from the data source.
   *
   * @param array $related
   * @return \Illuminate\Support\Collection
   */
  public function all();

  /**
   * Get the paginated models from the data source.
   *
   * @param  int $perPage
   * @return \Illuminate\Pagination\LengthAwarePaginator
   */
  public function paginate($perPage = 15);

  /**
   * Get a model by its primary key.
   *
   * @param int $id
   * @param array $related
   * @return \Illuminate\Database\Eloquent\Model
   *
   * @throws \App\Exceptions\ModelNotFoundException
   */
  public function get($id, array $related = null);

  /**
   * Get the model data by adding the given where query.
   *
   * @param  string     $column
   * @param  mixed      $value
   * @param  array|null $related
   * @return \Illuminate\Database\Eloquent\Collection
   *
   * @throws \App\Exceptions\ModelNotFoundException
   */
  public function getWhere($related = []);

  /**
   * Save a new model and return the instance.
   *
   * @param array $attributes
   * @return \Illuminate\Database\Eloquent\Model
   */
  public function create(array $data);

  /**
   * Get the first record matching the attributes or instantiate it.
   *
   * @param array $attributes
   * @return \Illuminate\Database\Eloquent\Model
   */
  public function firstOrNew(array $attributes);

  /**
   * Get the first record matching the attributes or create it.
   *
   * @param array $attributes
   * @return \Illuminate\Database\Eloquent\Model
   */
  public function firstOrCreate(array $attributes);

  /**
   * Update the model by the given attributes.
   *
   * @return \Illuminate\Database\Eloquent\Model $model
   * @return bool|int
   */
  public function update($model, array $data);

  /**
   * Delete the model from the data source.
   *
   * @return \Illuminate\Database\Eloquent\Model $model
   * @return bool|null
   *
   * @throws \Exception
   */
  public function delete($id);
}
