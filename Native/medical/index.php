<?php require_once "app.php"; ?>


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
        $errors['name'] = "must be <= 100";
    }
    if (! isRequired($email)) {
        $errors['email'] = "required";
    } elseif (! isEmail($email)) {
        $errors['email'] = "not valid";
    } elseif (! lessThanEq($email, 100)) {
        $errors['email'] = "must be less than 100";
    }
    if (! isRequired($phone)) {
        $errors['phone'] = "required";
    } elseif (! isString($phone)) {
        $errors['phone'] = "must be string";
    } elseif (! lessThanEq($phone, 15)) {
        $errors['phone'] = "must be less than 15";
    }
    if(empty($errors)){
        $data = [
            'order_name' => $name,
            'order_email' => $email,
            'order_phone' => $phone,
            'order_city_id' => $city_id,
            'order_services_id' => $ser_id
        ];
         insert("orders", $data);
         redirect('index.php');
    }
}

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php echo CSS?>bootstrap.min.css">
        <title>Medical Services</title>
    </head>
    <body>
        <h1 class="text-center py-3 my-3 ">Reservation Form</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img src="<?php echo IMG?>5.png" alt="" style="max-width:100%">
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                    </div>
                    <form class="border p-5 my-3 " style="background-color:#4A5055;" method="POST" action="">
                        <div class="form-group">
                            <label for="name" class="text-white">Your Name <?php getError('name');?></label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name" class="text-white">Your Email <?php getError('email');?></label>
                            <input type="text" name="email" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="name" class="text-white">Your Phone <?php getError('phone');?></label>
                            <input type="text" name="phone" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="city" class="text-white">Your City</label>
                            <?php $cities = getWhere("cities", "city_is_active = '1'"); ?>
                            <select name="city_id" class="form-control" id="city">
                            <?php foreach($cities as $city): ?>
                            <option value="<?php echo $city['city_id']; ?>" > <?php echo $city['city_name']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="ser" class="text-white">Choose Service</label>
                            <?php $services = getAll("services"); ?>
                            <select name="ser_id" class="form-control" id="ser">
                            <?php foreach($services as $service): ?>
                            <option  value=" <?php echo $service['services_id']; ?> " > <?php echo $service['services_name']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>

                </div>

            </div>
        </div>
        
        </body>
</html>