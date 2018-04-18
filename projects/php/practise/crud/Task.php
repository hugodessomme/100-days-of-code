<?php

class Task {
  protected $id;
  protected $title;
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
   * Set the title
   *
   * @param string $data
   */
  public function setTitle($data)
  {
    if (is_string($data)) {
      $this->title = $data;
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
   * Get the title
   *
   * @return string
   */
  public function getTitle() { return $this->title; }

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

$a = new Task([
  'id' => 1,
  'title' => 'Hello World!',
  'category' => 'food',
  'date' => '2 juin 2017'
]);
echo $a->getId();
echo $a->getTitle();
echo $a->getCategory();
echo $a->getDate();