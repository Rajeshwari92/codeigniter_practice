<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Edit Data - Codeigniter 4 Crud Application</title>
    <!--  -->
</head>
<body>
    <div class="container">
        
        <?php 

        $validation = \Config\Services::validation();


        ?>
        <h2 class="text-center mt-4 mb-4">Edit Data - Codeigniter 4 Crud Application</h2>
        
        <div class="card">
            <div class="card-header">Edit Data</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('crud/edit_validation'); ?>">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $user_data['name']; ?>">

                        <!-- Error -->
                        <?php 
                        if($validation->getError('name'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('name')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" value="<?php echo $user_data['location']; ?>">

                        <?php 
                        if($validation->getError('location'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('location')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $user_data["id"]; ?>" />
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
 
</body>
</html>
