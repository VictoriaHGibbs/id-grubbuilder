<?php

class Ingredient extends DatabaseObject {

  static public $table_name = 'ingredient';
  static public $primary_key = 'ingredient_id';
  static public $db_columns = ['ingredient_id', 'recipe_id', 'ingredient_line_item', 'quantity', 'ingredient_name', 'measurement_id', 'sort_order'];

  public $ingredient_id;
  public $recipe_id;
  public $ingredient_line_item;
  public $quantity;
  public $ingredient_name;
  public $measurement_id;
  public $sort_order;

  // public function __construct($args = []) {
  //   $this->recipe_id = $args['recipe_id'] ?? '';
  //   $this->ingredient_line_item = $args['ingredient_line_item'] ?? '';
  //   $this->quantity = $args['quantity'] ?? '';
  //   $this->ingredient_name = $args['ingredient_name'] ?? '';
  //   $this->measurement_id = $args['measurement_id'] ?? '';
  //   $this->sort_order = $args['sort_order'] ?? '';
  // }

  
}
