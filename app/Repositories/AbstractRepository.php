<?php

namespace App\Repositories;

use Illuminate\Http\Request;

abstract class AbstractRepository {

  protected $model;
  public function __construct() {
    $this->model = app($this->model);
  }
  public function all() {
    return $this->model->all();
  }
  public function first() {
    return $this->model->first();
  }
  public function update($id) {
    $object = $this->model::findOrFail($id);
    return tap($object)->update(request()->except('_token'));
  }
  public function store() {
    return $this->model::create(request()->except('_token'));
  }
  public function delete($id) {
    $object = $this->model::findOrFail($id);
    return $object->delete();
  }
  public function get($id) {
    return $this->model::findOrFail($id);
  }
  public function add($data) {
    return $this->model::create($data);
  }
  public function new() {
    return new $this->model();
  }
}
?>