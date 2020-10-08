<?php require_once "../../app.php"; ?>

<?php
if (!isset($_SESSION['admin_id'])){
    redirect('auth/Alogin.php');
}
require_once ADMIN . "inc/header.php"; 

?>
 

 <?php 
if(isset($_POST['submit'])){

    foreach($_POST as $key => $value){
        $$key = prepareInput($_POST[$key]);
    }

    if (! isRequired($name)) {
        $errors['name'] = "required";
    } elseif (! isString($name)) {
        $errors['name'] = "must be string";
    } elseif (! lessThanEq($name, 100)) {
        $errors['name'] = "must be less than 100";
    }

    if (! isRequired($description)) {
        $errors['description'] = "required";
    } elseif (! isString($description)){
        $errors['description'] = "must be string";
    }

    if(empty($errors)){
        $data = [
            'department_name' => $name,
            'department_description' => $description,
            'department_status' => $status,
        ];
        
         insert("departments", $data);
         aredirect('departments/add.php');
        
        }
        }

?>


 <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Add New Department</h3>
            <div>
                <?php require ADMIN . "inc/messages.php"; ?>

                <form class="border p-5 my-3 " method="POST" action="">
                    <div class="form-group">
                        <label for="name"  class="text-dark ">Department Name <?php getError('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Department Discription<?php getError('description'); ?></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status"  class="text-dark "> Department Status</label>
                        <select name="status" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>


    </div>
    </div>






<?php
include ADMIN . "inc/footer.php"; 
?>