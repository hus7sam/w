<?php
require 'Connection.php';

$r=1;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" type="text/css" href="style.css">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!---->

    <title>عرض</title>
</head>
<body>

<div class="bar">
    <h2>| فينا خير  </h2>
    <a href="index.php">الرئيسية </a>
    <a href="dispaly.php"> العرض</a>
    <img class="img_logo" src="photos/logo.png">

</div>

    <div class="box_sreach">
        <form action="dispaly.php" method="post">
            <select class="list_sreach" name="search_State">
                <option value="">-- أختر المنطقة --</option>
                <option value="مكة المكرمة">مكة المكرمة</option>
                <option value="المدينة المنورة">المدينة المنورة</option>
                <option value="الرياض ">الرياض </option>
                <option value="عسير"> عسير</option>
                <option value="الحدود الشمالية">الحدود الشمالية</option>
                <option value="نجران"> نجران</option>
                <option value="حائل">حائل </option>
                <option value="القصيم">القصيم</option>
                <option value="تبوك">تبوك</option>
                <option value="جازان">جازان</option>
                <option value="الجوف">الجوف</option>
                <option value="الشرقية">الشرقية</option>
            </select>

            <select class="list_sreach" NAME="search_Category">
                <option value="">-- أختر فئة العنصر --</option>
                <option value="أجهزة طبية">أجهزة طبية</option>
                <option value="أجهزة كهربائية"> أجهزة كهربائية</option>
                <option value="أجهزة الكترونية">أجهزة الكترونية</option>
                <option value="كتب">كتب</option>
                <option value="ملابس">ملابس</option>
                <option value="أثاث">أثاث</option>
                <option value="مواد غذائية">مواد غذائية</option>
                <option value="أخر">أخر</option>
            </select>

            <select class="list_sreach" name="search_Status">
                <option value="">-- أختر حالة العنصر --</option>
                <option value="جديد">جديد</option>
                <option value="مستعمل">مستعمل</option>
            </select>

            <input class="btn_submit_sreach" type="submit" value="بحث" name="box_Search">
        </form>
    </div>

<!--  ---  sreach BOX   ---  -->


<?php if(isset($_POST["box_Search"])):
    function test_input($data) {
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
    }

    if (empty($_POST["search_State"]))
    { $DescriptionErr="الرجاء كتابة المدينة";  $_POST["search_State"]=''; }
    if(filter_has_var(INPUT_POST,'search_State')){
    $State_1=test_input(filter_var($_POST["search_State"],FILTER_SANITIZE_STRING));}


    if (empty($_POST["search_Category"]))
    {$DescriptionErr="الرجاء كتابة المدينة";  $_POST["search_Category"]=''; }
    if(filter_has_var(INPUT_POST,"search_Category")){
        $Category_1=test_input(filter_var($_POST["search_Category"],FILTER_SANITIZE_STRING));}


    if (empty($_POST["search_Status"]))
    {$DescriptionErr="الرجاء كتابة المدينة";  $_POST["search_Status"]=''; }
    if(filter_has_var(INPUT_POST,"search_Status")){
        $Status_1=test_input(filter_var($_POST["search_Status"],FILTER_SANITIZE_STRING));}


    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
    $sql = "SELECT *
            FROM item
            WHERE  Status=:Status_1 AND Category=:Category_1 AND State=:State_1 ";
    $stmt = $conn->prepare($sql);
    $select=array(
         'Status_1'   => $Status_1,
         'Category_1' => $Category_1,
         'State_1'    => $State_1,
    );
    $stmt->execute($select);

 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
   $sum=count($rows);
   if ($sum > 0){
 echo "<div class='Display_Grid-container'>";
    foreach($rows as $row){
?>

        <div class='grid-item'>

            <p class="alert_itemID"><?php echo $row['ID']. " ID"; ?> </p>
            <?php  if ($row['Status']==="جديد"):?>
                <p class="alert_newitem"><?php echo  'جديد'; ?> </p>
            <?php elseif($row['Status']==="مستعمل"):   ?>
            <p class="alert_useditem"><?php echo  'مستعمل';  endif;?> </p>

            <p class="p_item_1"><?php echo   $row['Number'].str_repeat('&nbsp;', 10) .date("y-m-d : g:I",strtotime($row['Date'])); ?></p>
            <p class="p_item_2">
                <?php
                $string = strip_tags($row['Description']);
                if (strlen($string) > 100) {
                    // truncate string
                    $stringCut = substr($string, 0, 300);
                    $endPoint = strrpos($stringCut, ' ');
                    //if the string doesn't contain any space then it will cut without word basis.
                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    echo $string . " ..." ;
                }else{ echo $string  ;} ?>

            </p>
            <p class="p_item_1">
            <?php  echo $row['State'].str_repeat('&nbsp;', 10). $row['City']; ?>
            </p>


            <a class="link_item" href="dispaly.php">تفاصيل اكثر</a>
        </div>

    <?php }
    $r=0;

       $conn = null;
   }else
       {
       echo " <div class='alert_info'>  لم يتم العثور على بحثك </div>";
       $r=1;
       }
   endif;

    echo"</div>";
    ?>

<!--  ---  sreach BOX   ---  -->

    <?php if ($r===1):   ?>
<div class="Display_Grid-container">

    <?php

    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
    $sql = "select *
            from item
            order by id DESC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $row){
        ?>
 <div class='grid-item'>

         <p class="alert_itemID"><?php echo $row['ID']. " ID"; ?> </p>
         <?php  if ($row['Status']==="جديد"):?>
         <p class="alert_newitem"><?php echo  'جديد'; ?> </p>
         <?php elseif($row['Status']==="مستعمل"):   ?>
         <p class="alert_useditem"><?php echo  'مستعمل';  endif;?> </p>

              <p class="p_number_date"><?php echo $row['Number'].str_repeat('&nbsp;', 5) .date("Y-m-d ",strtotime($row['Date'])); ?></p>
              <p class="p_item_2">
                        <?php
                        $string = strip_tags($row['Description']);
                            if (strlen($string) > 100) {
                            // truncate string
                            $stringCut = substr($string, 0, 300);
                            $endPoint = strrpos($stringCut, ' ');
                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            echo $string . " ..." ;
                        }else{ echo $string  ;} ?>

              </p>
     <p class="p_item_1">
         <?php  echo $row['State'].str_repeat('&nbsp;', 2). "=>".str_repeat('&nbsp;', 2). $row['City']; ?>
     </p>

     <a class="link_item" href="dispaly.php">تفاصيل اكثر</a>
       </div>

<?php }  endif;$conn = null;?>

</div>
</body>

</html>
