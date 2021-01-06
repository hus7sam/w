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
    <link  rel="stylesheet" type="text/css" href="css/style.css">
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.css">
<!--    <link  rel="stylesheet" type="text/css" href="css/mdb.min.css">-->
<!--    <link  rel="stylesheet" type="text/css" href="css/mdb.rtl.min.css">-->
    <title>تحكم</title>

</head>
<body>
<?php //include "header.php"; ?>

<div class="control_right_side">

    <div class="div_right_side mt-0 p-4 bg-aliceblue_HU">
        <div class="alert bg-info  text-secondary rounded-2"> <h2> تقرير رقمي</h2></div>

        <div class="container  mb-4">
            <div class="row gap-3  justify-content-center mb-2 ">
                <div class="col shadow-sm bg-white ">
                    <p class="mt-3"> عدد الزوار </p>
                    <p><?php echo  counts_visitors_Fun()   ;?> </p>
                </div>
                <div class="col  shadow-sm bg-white ">
                    <p class="mt-3"> عدد الاعلانات</p>
                    <p><?php echo counts_Item_Fun() ;?></p>
                </div>
                <div class="col   shadow-sm bg-white ">
                    <p class="mt-3">عدد طلبات الخذف </p>
                    <p><?php echo count_delete() ;?></p>
                </div>
            </div>
            <div class="row gap-3 justify-content-center mt-4 ">
                <div class="col  shadow-sm bg-white  ">
                    <p class="mt-3">عدد الطلبات المحذوفه</p>
                    <p><?php echo counts_Item_Fun() ;?></p>
                </div>

                <div class="col shadow-sm bg-white ">
                    <p class="mt-3">عدد طلبات حظر </p>
                    <p><?php echo counts_Item_Fun() ;?></p>
                </div>
                <div class="col shadow-sm bg-white ">
                    <p class="mt-3">عدد الاعلانات المحظورة</p>
                    <p><?php echo counts_Item_Fun() ;?></p>
                </div>
            </div>
        </div>


        <div class="cotainer overflow-auto ">
        <div class="alert bg-info  text-white rounded-2 "> <h2> [جدول طلبات الحذف] </h2></div>
        <table class="table  table-striped table-hover ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">إسم المنتج</th>
                <th scope="col">وصف المنتح</th>
                <th scope="col">سبب الحذف</th>
                <th scope="col"> التصنيف</th>
                <th scope="col"> رقم المنتج</th>
            </tr>
            </thead>
            <tbody>
            <?php  table_item_delete(); ?>
            </tbody>
        </table>
        </div>


        <div class="alert bg-info  text-white rounded-2"> <h2> [جدول طلبات الحظر] </h2></div>
        <div class="overflow-auto h-25 ">
        <table class="table  table-striped table-hover ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">إسم المنتج</th>
                <th scope="col">وصف المنتح</th>
                <th scope="col">سبب الحذف</th>
                <th scope="col"> التصنيف</th>
                <th scope="col"> رقم المنتج</th>
            </tr>
            </thead>
            <tbody>
            <?php  table_item_delete(); ?>
            </tbody>
        </table>
        </div>

    </div>
    </div>


<div class="control_left_side">

   <div class="div_left_side" id="control1">

       <div class="list-group">
           <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
               القائمة
           </a>
           <a href="#" class="list-group-item list-group-item-action">أحصائيات رقمية</a>
           <a href="#" class="list-group-item list-group-item-action"> طلبات الخذف</a>
           <a href="#" class="list-group-item list-group-item-action"> طلبات الخذف</a>
<!--           <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>-->
       </div>
<!--       <h4> القائمة</h4>-->
<!--       <a class="control_list link-warning" href="#control1" title="#">أحصائيات رقمية</a>-->
<!--       <a class="control_list" href="#" > طلبات الخذف </a>-->
<!--       <a class="control_list" href="control.php#C1" >ط طلبات الخذف</a>-->
<!--       <a class="control_list" href="#" >4</a>-->
<!--       <a class="control_list" href="#" >5</a>-->
<!---->
<!--   </div>-->

</div>
</body>
</html>
