<?php
require 'Connection.php';
require ("fun.php");

counts_visitors_Fun();
$r=1;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" type="text/css" href="css/style.css">

    <title>عرض</title>
</head>

<body>

<!--<div class="HUSSAM"> تصميم م.حسام الصاعدي</div>-->
<?php
if(isset($messgage)):
    echo "<div class='alert_success'> ";

    echo $messgage; " </div>" ; endif; ?>


<?php  include ("header.php")?>
<?php // include ("AD.php")?>


<!--        <div class="alert_danger"> احتاج ما لا تحتاجة </div>-->
<div class="cont">
    <div class="div_box_sreach">
        <form action="display.php" method="post">
            <select class="list_sreach" name="search_State">
                <option value="">-- أختر المنطقة --</option>
                <?php   for ($i=0; $i<$length_State; $i++)  {?>
                <option value="<?php  echo $arra_list_State[$i]; ?>">
                <?php echo $arra_list_State[$i]; ?> </option>
                <?php } ?>
            </select>

            <select class="list_sreach" NAME="search_Category">
                <option value="">-- أختر فئة العنصر --</option>
                <?php   for ($i=0; $i<$length_Category; $i++)  {?>
                <option value="<?php  echo $arra_list_Category[$i]; ?>">
                <?php echo $arra_list_Category[$i]; ?> </option>
                <?php } ?>
            </select>

            <select class="list_sreach" name="search_Status">
                <option value="">-- أختر حالة العنصر --</option>
                <?php   for ($i=0; $i<$length_Status; $i++)  {?>
                <option value="<?php  echo $arr_list_Status[$i]; ?>">
                <?php echo $arr_list_Status[$i]; ?> </option>
                <?php } ?>
            </select>

            <input class="btn_submit_sreach" type="submit" value="بحث" name="box_Search">
        </form>
    </div>

<!--    <div class="div_box_sreach" >-->
<!---->
<!--      <form method="post" action="display.php" >-->
<!--         <input class="list_sreach" type="text" name="delete" placeholder="اكتب رقم العنصر">-->
<!--         <input class="btn_submit_sreach" type="submit" value="أحذف">-->
<!--      </form>-->
<!--        --><?php
//        if (isset($_POST["delete"]))
//        {
//            if (empty($_POST["delete"]))
//            {
//                $DescriptionErr="الرجاء كتابة";  $_POST["delete"]='';
//            }
//            if(filter_has_var(INPUT_POST,'delete'))
//            {
//                $id=test_input(filter_var($_POST["delete"],FILTER_SANITIZE_NUMBER_INT));
//                delete($id);
////                $page = $_SERVER['PHP_SELF'];
////                $sec = "10";
//////                header("Refresh: $sec; url=$page");
// $messgage=' لقد تم حذف الاعلان بنجاح';
//            }
//        }
//
//
//        ?>
<!--    </div>-->

</div>

  <HR>

<!--  ---  sreach BOX   ---  -->


<?php if(isset($_POST["box_Search"])):


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
            WHERE  Status=:Status_1 or Category=:Category_1 or State=:State_1 ";
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

            <div class="div_item_id">
                <p> <?php echo " م : ". $row['ID'] ; ?> </p>
            </div>

            <div class="div_item_Name">
                <p>  <?php echo  $row['name']; ?> </p>
            </div>

            <?php  if ($row['Status']==="جديد"):?>
                <div  class="div_item_new">
                    <p> <?php echo  'جديد'; ?></p>
                </div>

            <?php elseif($row['Status']==="مستعمل"):   ?>
                <div class="div_item_used">
                    <p> <?php echo  'مستعمل'; ?></p>
                </div> <?php  endif;?>

            <div class="div_item_number">
                <img class="img_item_icon" src="img/phone-call.png">
                <p> <?php echo $row['Number'] ; ?></p>
            </div>

            <div class="div_item_date">
                <img class="img_item_icon" src="img/calendar.png">
                <p> <?php echo date("Y-m-d ",strtotime($row['Date'])); ?></p>
            </div>

            <div class="div_item_description">
                <p>  <?php
                    $string = strip_tags($row['Description']);
                    if (strlen($string) > 100) {
                        // truncate string
                        $stringCut = substr($string, 0, 300);
                        $endPoint = strrpos($stringCut, ' ');
                        // if the string doesn't contain any space then it will cut without word basis.
                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        echo $string . " ..." ;
                    }else{ echo $string  ;} ?></p>
            </div>

            <!--          <img class="img_Ads_img" src="img/ww.jpg">-->
            <!--          <img class="img_Ads_img" src="img/xxxx.jpg">-->
            <!--          <img class="img_Ads_img" src="img/ppp.png">-->
            <!--          <img class="img_Ads_img" src="img/qqq.jpg">-->
            <img class="img_item_img1" src="img/logo3.png">

            <div class="div_item_delete">
                <a href="#" title="يقوم هذا الزر بحذف العنصر">
                    <img class="img_item_icon" src="img/delete.png" >
                </a>
                <!--         <p> خذف</p>-->
            </div>

            <div class="div_item_place">
                <img class="img_item_icon" src="img/location.png">
                <p><?php  echo $row['State'].str_repeat('&nbsp;', 1). "-".str_repeat('&nbsp;', 1). $row['City']; ?></p>
            </div>

            <div class="div_item_complaint">
                <a href="#" title="يقوم هذا الزر بتقديم بلاغ ">
                    <img class="img_item_icon" src="img/block%20.png">
                </a>
                <!--              <p>    تبليغ </p>-->
            </div>
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

         <div class="div_item_id">
             <p> <?php echo " م : ". $row['ID'] ; ?> </p>
         </div>

         <div class="div_item_Name">
             <p>  <?php echo  $row['name']; ?> </p>
         </div>

         <?php  if ($row['Status']==="جديد"):?>
         <div  class="div_item_new">
            <p> <?php echo  'جديد'; ?></p>
         </div>

         <?php elseif($row['Status']==="مستعمل"):   ?>
         <div class="div_item_used">
            <p> <?php echo  'مستعمل'; ?></p>
         </div> <?php  endif;?>

          <div class="div_item_number">
              <img class="img_item_icon" src="img/phone-call.png">
             <p> <?php echo $row['Number'] ; ?></p>
          </div>

          <div class="div_item_date">
              <img class="img_item_icon" src="img/calendar.png">
             <p> <?php echo date("Y-m-d ",strtotime($row['Date'])); ?></p>
          </div>

          <div class="div_item_description">
              <p>  <?php
                        $string = strip_tags($row['Description']);
                            if (strlen($string) > 100) {
                            // truncate string
                            $stringCut = substr($string, 0, 300);
                            $endPoint = strrpos($stringCut, ' ');
                            // if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            echo $string . " ..." ;
                        }else{ echo $string  ;} ?></p>
          </div>

<!--          <img class="img_Ads_img" src="img/ww.jpg">-->
<!--          <img class="img_Ads_img" src="img/xxxx.jpg">-->
<!--          <img class="img_Ads_img" src="img/ppp.png">-->
<!--          <img class="img_Ads_img" src="img/qqq.jpg">-->
          <img class="img_item_img1" src="img/logo3.png">

         <div class="div_item_delete">
             <a href="#" title="يقوم هذا الزر بحذف الاعلان">
                 <img class="img_item_icon" src="img/delete.png" >
             </a>
<!--         <p> خذف</p>-->
         </div>

           <div class="div_item_place">
              <img class="img_item_icon" src="img/place.png">
              <p><?php  echo $row['State'].str_repeat('&nbsp;', 1). "-".str_repeat('&nbsp;', 1). $row['City']; ?></p>
          </div>

          <div class="div_item_complaint">
              <a href="#" title="يقوم هذا الزر بحظر الاعلان ">
                <img class="img_item_icon" src="img/block%20.png">
              </a>
<!--              <p>    تبليغ </p>-->
          </div>
<!--          <a class="link_item" href="display.php">تفاصيل اكثر</a>-->
 </div>

<?php }  endif;$conn = null;?>

</div>

<?php include ("footer.php")?>
</body>

</html>
