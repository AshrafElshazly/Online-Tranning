<?php require_once "../../app.php"; ?>

<?php require_once ADMIN . "inc/header.php"; ?>

<?php
if(isset($_GET['services_id']) and is_numeric($_GET['services_id'])) {
    $services_id = $_GET['services_id'];

    $services = getOne("services", "services_id = '$services_id'");

    if(empty($services)) {
        aredirect("service/view.php");
    }
     
} else {
   aredirect("service/view.php");
}
?>

<div class="container">
    <div class="row">
    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Edit Info About Service</h3>
        <?php 
            if(isset($_POST['submit'])) {
                foreach ($_POST as $key => $value) {
                    $$key = prepareInput($_POST[$key]);
                }

                if (! isRequired($name)) {
                    $errors['name'] = "required";
                } elseif (! isString($name)) {
                    $errors['name'] = "must be string";
                } elseif (! lessThanEq($name, 100)) {
                    $errors['name'] = "must be <= 100";
                }

                // if all data is valid, store service in db
                if(empty($errors)) {
                    $data = [
                        'services_name' => $name
                    ];
                    
                    $is_updated = update("services", $data, "services_id = '$services_id'");

                    if($is_updated) { 
                        $services = getOne("services", "services_id = '$services_id'");
                        // display success message
                        $success = "updated successfully";

                    } else {
                        // an 
                        $query_error = "error while updating";
                    }
                }


            }
        ?>
            <div>
                <?php require ADMIN . "inc/messages.php"; ?>
                <form class="border p-5 my-3 " method="POST" action="">
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Name <?php getError('name'); ?></label>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $services['services_name'] ?>">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>



    </div>
    </div>

<?php require_once ADMIN . "inc/footer.php"; ?>