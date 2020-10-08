<?php require_once "../../app.php"; ?>

<?php 

if(isset($_GET['doctor_id']) and is_numeric($_GET['doctor_id'])) {
    $doctor_id = $_GET['doctor_id'];

    $doctor = getOne("doctors", "doctor_id = '$doctor_id'");
    
    if(empty($doctor)) {
        aredirect("doctors/view.php");
    }
     
} else {
    aredirect("doctors/view.php");
}
?>
<?php require_once ADMIN . "inc/header.php"; ?>
    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Edit Info About Doctor</h3>
            <div>

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
  if (! isRequired($address)) {
      $errors['address'] = "required";
  } elseif (! lessThanEq($address, 200)) {
      $errors['address'] = "must be less than 200";
  }
  if (! isRequired($phone)) {
      $errors['phone'] = "required";
  } elseif (! lessThanEq($phone, 200)) {
      $errors['phone'] = "must be less than 15";
  }

  if(empty($errors)){
$data = [
  'doctor_name' => $name,
  'doctor_address' => $address,
  'doctor_department_id' => $department,
  'doctor_phone' => $phone,
];

        $is_updated = update("doctors", $data, "doctor_id = '$doctor_id'");

        if($is_updated) { 
            $doctor = getOne("doctors", "doctor_id = '$doctor_id'");

            $success = "updated successfully";
        } else {
            $query_error = "error while updating";
        }
    }
}

require ADMIN . "inc/messages.php"; 
?>

<div class="container">
    <div class="row">
    <div class="col-8 mx-auto my-5">
        <div class="card-header">
            <h3 class="text-center">Add New Doctor</h3>
            <div>
                <form class="border p-5 my-3 " method="POST" action="">
                    <div class="form-group">
                        <label for="name"  class="text-dark "> Name<?php getError('name') ?></label>
                        <input type="text" name="name"  class="form-control" id="name" value="<?php echo $doctor['doctor_name'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="address"  class="text-dark "> Address<?php getError('address') ?></label>
                        <input type="text" name="address" class="form-control" id="address" value="<?php echo $doctor['doctor_address'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="department"  class="text-dark "> Department</label>
                        <select name="department" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">

<?php
$dapartments =  getall('departments') ;
foreach($dapartments as $department):
?>
                        <option value="<?php echo $department['department_id'] ; ?>"><?php echo $department['department_name'] ; ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="phone"  class="text-dark "> Phone<?php getError('phone') ?></label>
                        <input type="text" name="phone"  class="form-control" id="phone" value="<?php echo $doctor['doctor_phone'] ?>">
                    </div>
        


                        
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>


<?php require_once ADMIN . "inc/footer.php"; ?>