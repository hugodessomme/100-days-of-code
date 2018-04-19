<?php

class TaskManager
{
  private $db;

  /**
   * Constructor
   *
   * @param PDO $db
   */
  public function __construct(PDO $db)
  {
    $this->setDb($db);
  }

  /**
   * Set the database
   *
   * @param PDO $db
   */
  public function setDb(PDO $db)
  {
    $this->db = $db;
  }

  /**
   * Add a task
   */
  public function add()
  {

  }

  /**
   * Delete a task
   */
  public function delete()
  {

  }

  /**
   * Update a task
   */
  public function update()
  {

  }

  /**
   * Return a task
   *
   * @param int $data
   * @return Task
   */
  public function get($data)
  {
    if (is_int($data)) {
      $query = $this->db->query('SELECT * FROM practiseCRUD WHERE id = ' . $data);
      $output = $query->fetch(PDO::FETCH_ASSOC);

      return new Task($output);
    }
  }

  /**
   * Return all tasks
   *
   * @return Array
   */
  public function getTasks()
  {
    $query = $this->db->query('SELECT * FROM practiseCRUD');

    $tasks = [];

    while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
      $tasks[] = new Task($data);
    }

    return $tasks;
  }

  /**
   * Return all categories
   *
   * @return Array
   */
  public function getCategories()
  {
    $query = $this->db->query('SELECT category FROM practiseCRUD');

    $categories = [];

    while ($data = $query->fetch()) {
      $categories[] = $data['category'];
    }

    return $categories;
  }
}