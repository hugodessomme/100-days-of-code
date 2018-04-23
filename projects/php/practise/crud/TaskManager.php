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
  public function add(Task $data)
  {
    $query = $this->db->prepare('
      INSERT INTO crud_task(taskTitle, taskDate, categoryId)
      VALUES(:taskTitle, :taskDate, :categoryId)
    ');
    $query->bindValue(':taskTitle', $data->getTaskTitle());
    $query->bindValue(':taskDate', $data->getTaskDate());
    $query->bindValue(':categoryId', $data->getCategoryId());

    $query->execute();
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
      $query = $this->db->query('SELECT id, taskTitle, taskDate, categoryId FROM crud_task WHERE id = ' . $data);
      $output = $query->fetch(PDO::FETCH_ASSOC);

      return new Task($output);
    }
  }

  /**
   * Return all tasks
   *
   * @return array
   */
  public function getTasks()
  {
    $query = $this->db->query('SELECT id, taskTitle, taskDate, categoryId FROM crud_task');

    $tasks = [];

    while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
      $tasks[] = new Task($data);
    }

    return $tasks;
  }

  /**
   * Return the category title
   *
   * @param int
   * @return string
   */
  public function getCategory($data)
  {
    $id = (int) $data;

    if ($id > 0) {
      $query = $this->db->query('SELECT categoryTitle FROM crud_category WHERE id = ' . $id);
      $output = $query->fetch(PDO::FETCH_ASSOC);

      return $output['categoryTitle'];
    }
  }

  /**
   * Return all categories
   *
   * @return array
   */
  public function getCategories()
  {
    $query = $this->db->query('SELECT id, categoryTitle FROM crud_category');

    $categories = [];

    while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
      $categories[] = ['id' => $data['id'], 'categoryTitle' => $data['categoryTitle']];
    }

    return $categories;
  }
}