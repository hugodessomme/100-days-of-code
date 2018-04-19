<?php include 'structure/header.php'; ?>

<?php
$tasks = $manager->getTasks();
$categories = $manager->getCategories();
?>

<div class="mb-5">
  <div class="row">
    <div class="col">
      <button class="btn btn-primary">Create</button>
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
      echo '<td>' . $task->getTask() . '</td>';
      echo '<td>' . $task->getCategory() . '</td>';
      echo '<td>' . $task->getDate() . '</td>';
      echo '<td>';
      echo '<a href="?action=add&id=' . $task->getId() . '" class="btn btn-success">Add</a>';
      echo '<a href="?action=delete&id="' . $task->getId() . '" class="btn btn-danger ml-1">Delete</a>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
<?php include 'structure/footer.php'; ?>


