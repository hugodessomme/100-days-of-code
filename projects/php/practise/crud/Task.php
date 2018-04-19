<?php

class Task {
  protected $id;
  protected $task;
  protected $category;
  protected $date;

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
  public function setId($data)
  {
    $id = (int) $data;

    if ($id > 0) {
      $this->id = $data;
    }
  }

  /**
   * Set the task
   *
   * @param string $data
   */
  public function setTask($data)
  {
    if (is_string($data)) {
      $this->task = $data;
    }
  }

  /**
   * Set the category
   *
   * @param string $data
   */
  public function setCategory($data)
  {
    if (is_string($data)) {
      $this->category = $data;
    }
  }

  /**
   * Set the date
   *
   * @param string $data
   */
  public function setDate($data)
  {
    if (is_string($data)) {
      $this->date = $data;
    }
  }

  /**
   * Get the ID
   *
   * @return int
   */
  public function getId() { return $this->id; }

  /**
   * Get the task
   *
   * @return string
   */
  public function getTask() { return $this->task; }

  /**
   * Get the category
   *
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }

  /**
   * Get the date
   *
   * @return string
   */
  public function getDate()
  {
    return $this->date;
  }
}