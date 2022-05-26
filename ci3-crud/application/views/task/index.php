<!DOCTYPE html>
<html>
<head>
    <title>Basic Crud operation in Codeigniter 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Codeigniter 3 CRUD </h2>
          </div>
          
      </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th width="220px">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($tasks as $task) { ?>
            <tr>
                <td><?php echo $task->name; ?></td>
                <td><?php echo $task->location; ?></td>
            <td>
              <form method="DELETE" action="<?php echo base_url('index.php/task/delete/'.$task->id);?>">
                <a class="btn btn-info" href="<?php echo base_url('index.php/task/show/'.$task->id) ?>"> show</a>
               <a class="btn btn-primary" href="<?php echo base_url('index.php/task/edit/'.$task->id) ?>"> Edit</a>
                <button type="submit" class="btn btn-danger"> Delete</button>
              </form>
            </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
    <div class="text-center">
              <a class="btn btn-success" href="task/create"> Create New Item</a>
          </div>
  </div>
</body>
</html>