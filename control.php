<?php
include "Connection.php";
include "fun.php";


?>
<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <?php include "css/style.css";?>
    </style>
    <title>تحكم</title>
</head>
<body>
<?php //include "header.php"; ?>

<div class="control_right_side">

    <div class="div_right_side">
        <h3> تقرير رقمي </h3>
        <div class="grid-control_container">
            <div class="grid-control_item">
                <h3> عدد الزوار </h3>

            </div>

            <div class="grid-control_item">
                <h3> عدد الاعلانات </h3>
                <?php echo Number_item() ;?>
            </div>

            <div class="grid-control_item">
                <h3>عدد طلبات خذف الاعلانات  </h3>

            </div>

            <div class="grid-control_item">
                <h3> عدد طلبات حظر الاعلانات </h3>

            </div>

            <div class="grid-control_item">
                <h3> عدد الاعلانات المحظورة </h3>

            </div>

        </div>
    </div>

</div>

<div class="control_left_side">

   <div class="div_left_side">

       <a class="control_list" href="#" title="#">1</a>
       <a class="control_list" href="#" title="#">2</a>
       <a class="control_list" href="#" title="#">3</a>
       <a class="control_list" href="#" title="#">4</a>
       <a class="control_list" href="#" title="#">5</a>
   </div>

</div>
</body>
</html>
