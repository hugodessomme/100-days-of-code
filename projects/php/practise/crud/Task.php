<?php

class Task {
  protected $taskId;
  protected $taskTitle;
  protected $taskDate;
  protected $categoryId;

  /**
   * Constructor
   *
   * @param array $data
   */
  public function __construct(Array $data) {
    $this->hydrate($data);
  }

  /**
   * Dynamic call of each setter
   *
   * @param array $data
   */
  public function hydrate(Array $data) {
    foreach ($data as $key => $value)
    {
      $method = 'set' . ucfirst($key);

      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

  /**
   * Set the ID
   *
   * @param int $data
   */
  public function setTaskId($data)
  {
    $id = (int) $data;

    if ($id > 0) {
      $this->taskId = $id;
    }
  }

  /**
   * Set the task
   *
   * @param string $data
   */
  public function setTaskTitle($data)
  {
    if (is_string($data)) {
      $this->taskTitle = $data;
    }
  }

  /**
   * Set the date
   *
   * @param string $data
   */
  public function setTaskDate($data)
  {
    if (is_string($data)) {
      $this->taskDate = $data;
    }
  }

  /**
   * Set the category
   *
   * @param int $data
   */
  public function setCategoryId($data)
  {
    $id = (int) $data;

    if (is_int($id) && $id > 0) {
      $this->categoryId = $id;
    }
  }


  /**
   * Get the ID
   *
   * @return int
   */
  public function getId() { return $this->taskId; }

  /**
   * Get the task
   *
   * @return string
   */
  public function getTaskTitle() { return $this->taskTitle; }

  /**
   * Get the date
   *
   * @return string
   */
  public function getTaskDate() { return $this->taskDate; }

    /**
   * Get the category
   *
   * @return string
   */
  public function getCategoryId() { return $this->categoryId; }
}