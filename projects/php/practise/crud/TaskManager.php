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
   */
  public function get()
  {

  }

  /**
   * Return all tasks
   */
  public function getAll()
  {

  }
}