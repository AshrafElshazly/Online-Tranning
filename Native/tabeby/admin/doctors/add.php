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
    if (! isRequired($img)) {
        $errors['img'] = "required";
    }

    if(empty($errors)){
$data = [
    'doctor_name' => $name,
    'doctor_address' => $address,
    'doctor_department_id' => $department,
    'doctor_phone' => $phone,
    'doctor_img' => $img,
];

 insert("doctors", $data);
 aredirect('doctors/add.php');

}
}
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
                        <input type="text" name="name"  class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="address"  class="text-dark "> Address<?php getError('address') ?></label>
                        <input type="text" name="address" class="form-control" id="address">
                    </div>
                    <div class="form-group">
                        <label for="department"  class="text-dark "> Department</label>
                        <select name="department" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">

<?php
$dapartments =  getwhere('departments',"department_status ='Available'") ;
print_r($dapartments);
foreach($dapartments as $department):
?>
                        <option value="<?php echo $department['department_id'] ; ?>"><?php echo $department['department_name'] ; ?></option>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="phone"  class="text-dark "> Phone<?php getError('phone') ?></label>
                        <input type="text" name="phone"  class="form-control" id="phone">
                    </div>

                    <div class="form-group">
                            <div class="custom-file">
                                <input name="img" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Picture<?php getError('img') ?></label>
                            </div>
                        </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>



    </div>
    </div>

    <?php require_once ADMIN . "inc/footer.php"; 
    ?> 
