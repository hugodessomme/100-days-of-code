<div id="modal-create" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="create[taskTitle]">Tâche</label>
            <input id="create[taskTitle]" name="create[taskTitle]" type="text" class="form-control">
          </div>

          <div class="form-group">
            <label for="create[taskDate]">Date</label>
            <input id="create[taskDate]" name="create[taskDate]" type="date" class="form-control">
          </div>

          <div class="form-group">
            <label for="create[categoryId]"></label>
            <select id="create[categoryId]" name="create[categoryId]" class="form-control">
              <?php
              foreach ($categories as $category) {
                echo '<option value="' . $category['id'] . '">' . $category['categoryTitle'] . '</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>