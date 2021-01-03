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
        <?php include "css/bootstrap.min.css";?>
    </style>
    <title>تحكم</title>
</head>
<body>
<?php //include "header.php"; ?>

<div class="control_right_side">

    <div class="div_right_side">
        <p> تقرير رقمي </p>
        <div class="grid-control_container">
            <div class="grid-control_item">
                <p> عدد الزوار </p>
               <?php echo  counts_visitors_Fun()   ;?>
            </div>

            <div class="grid-control_item">
                <p> عدد الاعلانات </p>
                <?php echo counts_Item_Fun() ;?>
            </div>

            <div class="grid-control_item">
                <p>عدد طلبات خذف الاعلانات  </p>
                <p>888  </p>

            </div>
            <div class="grid-control_item">
                <p>عدد طلبات خذف الاعلانات المحذوفه  </p>
                <p>888  </p>
            </div>

            <div class="grid-control_item">
                <p> عدد طلبات حظر الاعلانات </p>
                <p>888  </p>
            </div>

            <div class="grid-control_item" id="C1">
                <p> عدد الاعلانات المحظورة </p>
                <p>888  </p>
            </div>

        </div>
    </div>

    <div class="div_right_side">
        <table class="table table-striped table-hover">
            <tr>
                <th>id</th>
                <th>descrption</th>
                <th>casa</th>
            </tr>
            <?php table_item_delete();?>
        </table>
    </div>

</div>

<div class="control_left_side">

   <div class="div_left_side" id="control1">
       <h4> القائمة</h4>
       <a class="control_list" href="#control1" title="#">أحصائيات رقمية</a>
       <a class="control_list" href="#" > طلبات الخذف </a>
       <a class="control_list" href="control.php#C1" >طلبات الحظر</a>
       <a class="control_list" href="#" >4</a>
       <a class="control_list" href="#" >5</a>

   </div>

</div>
</body>
</html>
