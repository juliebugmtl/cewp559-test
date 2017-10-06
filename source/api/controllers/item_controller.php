<?php

class ItemController
{
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getAll(){
        $this->model->getItems();
    }

     public function getOne($id){
        $this->model->getOne($id);
    }
     public function create($json_data){
     	// parse data
     	// create a new model
     	// save the model in the database
        $this->model->save();
    }
}