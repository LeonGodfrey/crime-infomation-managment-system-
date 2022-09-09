<!-- Delete -->
<div class="modal fade" id="delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Delete</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="user_delete.php">
          <input type="hidden" class="userId" name="id">
          <div class="text-center">
            <p>DELETE USER</p>
            <h2 class="bold name"></h2>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Edit User</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">


        <!-- START CARD -->

        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Edit User details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form class="form-horizontal" method="POST" action="user_edit.php">
              <input type="text" class="userId" name="id" hidden>

              <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"  id="edit_name">
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>User Code</label>
                    <input type="text" class="form-control" name="userCode" id="edit_userCode">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>User type</label>
                    <select class="form-control" name="type" id="edit_type">                      
                      <option value='do'>Desk Officer</option>
                      <option value="io">Investigating Officer</option>
                      <option value="oc">Officer in Charge</option>
                      <option value="rsa">Resident state Attorney</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Officer Id</label>
                    <input type="text" class="form-control" name="offId" id="edit_offId">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Court Name</label>
                    <input type="text" class="form-control" name="courtName" id="edit_courtName">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Police Station</label>
                    <select name="pId" class="form-control" id="edit_station">
                      <option>Select Station</option>
                      <?php
                      $stmt = $conn->prepare("SELECT * from policeStation");
                      $stmt->execute([]);
                      foreach ($stmt as $row) {
                        echo '<option value="' . $row['pId'] . '" >' . $row['pName'] . ' located at ' . $row['pAddress'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>


          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>