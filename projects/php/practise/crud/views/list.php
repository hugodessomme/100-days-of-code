<?php include 'structure/header.php'; ?>

<?php
  if (isset($_POST['create'])) {
    $task = new Task([
      'taskTitle' => $_POST['create']['taskTitle'],
      'taskDate' => $_POST['create']['taskDate'],
      'taskCategory' => $_POST['create']['taskCategory']
    ]);
    $manager->add($task);
  }
?>

<?php
$tasks = $manager->getTasks();
$categories = $manager->getCategories();
?>

<?php
  if (isset($msg)) {
    echo $msg;
  }
?>

<div class="mb-5">
  <div class="row">
    <div class="col">
      <button class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Create</button>
    </div>
    <div class="col">
      <form class="form-inline justify-content-end">
        <div class="form-group">
          <select class="form-control">
            <?php
            foreach ($categories as $category) {
              echo '<option value="' . $category . '">' . $category . '</option>';
            }
            ?>
          </select>
        </div>
        <div class="input-group">
          <div class="input-group-prepend"><span class="input-group-text">Search</span></div>
          <input type="text" class="form-control">
        </div>
      </form>
    </div>
  </div>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Select</th>
      <th>Task</th>
      <th>Category</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($tasks as $task) {
      echo '<tr>';
      echo '<td><input type="checkbox" name="' . $task->getId() . '"></td>';
      echo '<td>' . $task->getTaskTitle() . '</td>';
      echo '<td>' . $task->getTaskCategory() . '</td>';
      echo '<td>' . $task->getTaskDate() . '</td>';
      echo '<td>';
      echo '<a href="?action=add&id=' . $task->getId() . '" class="btn btn-success">Add</a>';
      echo '<a href="?action=delete&id="' . $task->getId() . '" class="btn btn-danger ml-1">Delete</a>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>

<?php include 'components/modal-create.php'; ?>
<?php include 'structure/footer.php'; ?>


