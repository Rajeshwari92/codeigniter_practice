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
                <h2>Create Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo base_url('index.php/task')?>"> Back</a>
            </div>
        </div>
    </div>
    <form method="post" action="<?php echo base_url('index.php/task/store')?>">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control">
                    <?php
                      if (isset($this->session->flashdata('errors')['name'])){
                          echo '<div class="alert alert-danger mt-2">';
                          echo $this->session->flashdata('errors')['name'];
                          echo "</div>";
                      }
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location:</strong>
                    <textarea name="location" class="form-control"></textarea>
                    <?php
                      if (isset($this->session->flashdata('errors')['location'])){
                          echo '<div class="alert alert-danger mt-2">';
                          echo $this->session->flashdata('errors')['location'];
                          echo "</div>";
                      }
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

  </div>
</body>
</html>