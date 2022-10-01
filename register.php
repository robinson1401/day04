<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = [];

        if (empty($_POST['userName'])) {
            $errors['userName']['required'] = "Hãy nhập tên.";
        }

        if (empty($_POST['sex'])) {
            $errors['sex']['required'] = "Hãy chọn giới tính.";
        }

        if (empty($_POST['classification'])) {
            $errors['classification']['required'] = "Hãy chọn phân khoa.";
        }

        if (empty($_POST['day'])) {
            $errors['day']['required'] = "Hãy nhập ngày sinh.";
        }
        else{
            $errors['day']['invalid'] = "Hãy nhập ngày sinh đúng định dạng.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="notification">
            <div class="message">
                <?php 
                    if(!empty($errors['userName']['required'])){
                        echo '<div style="color: red;">'.$errors['userName']['required'].'</div>';
                    }
                ?>
            </div>
            <div class="message">
                <?php 
                    if(!empty($errors['sex']['required'])){
                        echo '<div style="color: red;">'.$errors['sex']['required'].'</div>';
                    }
                ?>
            </div>
            <div class="message">
                <?php 
                    if(!empty($errors['classification']['required'])){
                        echo '<div style="color: red;">'.$errors['classification']['required'].'</div>';
                    }
                ?>
            </div>
            <div class="message">
                <?php 
                    if(!empty($errors['day']['required'])){
                        echo '<div style="color: red;">'.$errors['day']['required'].'</div>';
                    }
                ?>
            </div>
        </div>
        <form action="register.php" method="post">
        <div class="userName content">
            <label for="userName">Họ và tên <span style="color: red;">*</span></label>
            <input type="text" id="userName" name="userName" value="<?php echo (!empty($_POST['userName'])) ?$_POST['userName']:false ?>">
        </div>
        <div class="gender content">
            <label for="gender"  style="width : 80px;">Giới tính <span style="color: red;">*</span></label>
                <?php 
                    $pages_array = array(
                        array(
                            "index"=> 0,
                            "name"=> "Nam",
                        ),
                
                        array(
                            "index"=>  1,
                            "name"=>  "Nữ",
                        )
                );                 
                    for ($i=0; $i < count($pages_array) ; $i++) {   
                ?>
                            <input class="check" type="radio" id="<?= $pages_array[$i]["name"]?>" name="sex" value="<?= $pages_array[$i]["name"]?><?php echo (!empty($_POST['sex'])) ?$_POST['sex']:false ?>">
                            <p class="check" for="<?= $pages_array[$i]["name"]?>"><?= $pages_array[$i]["name"]?></p><br>
                            <?php
                    }           
                ?>
        </div>
        <div class="select content">
            <label for="select">Phân khoa <span style="color: red;">*</span></label>
            <select name="classification" id="choose">
            <?php 
                 $khoa = array(
                    array(
                        "index"=>  "",
                        "name"=>  "",
                    ),
                    array(
                        "index"=> "MAT",
                        "name"=> "kHOA HỌC MÁY TÍNH",
                    ),
               
                    array(
                        "index"=>  "KDL",
                        "name"=>  "KHOA HỌC VẬT LIỆU",
                    )
               );          
                    foreach($khoa as $key=>$value){
                       ?>
                        <option value="<?= $value['index'] ?>"><?=  $value['name'] ?><?php echo (!empty($_POST['classification'])) ?$_POST['classification']:false ?></option>
                        <?php
                    }
                    ?>
                    
                   
            </select>
        </div>
        <div class="dateOfBirth content">
            <label for="">Ngày sinh <span style="color: red;">*</span></label>
            <input type="text" id="datepicker" name="day" value="<?php echo (!empty($_POST['day'])) ?$_POST['day']:false ?>" placeholder="dd/mm/yyyy">
        </div>
        <div class="address content">
            <label for="">Địa chỉ</label>
            <input type="text" id="address" name="addresss" value="">
        </div>
        <div class="register content">
            <button type="submit" name="submit">Đăng ký</button>
        </div>
        </form>
        
    </div>
    <script>
        $( function() {
    $( "#datepicker" ).datepicker();
  } );
    </script>
</body>
</html>