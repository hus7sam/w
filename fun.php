<?php

 // filter all input
function test_input($data) {
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}


//  array Category   *-*-*-*-*-*-*-*-*-*-*-*-*
$arra_list_Category=array(

    "أجهزة كهربائية",
    "أجهزة الكترونية",
    "مستلزمات صحية",
    "مستلزمات طبية",
    "مستلزمات نسائية",
    "مستلزمات رجالية",
    "كتب",
    "خردوات",
    "مواد غذائية",
    "أثاث",
    "أدوات سباكة",
);

 $length_Category=count($arra_list_Category);


//  array State   *-*-*-*-*-*-*-*-*-*-*-*-*
$arra_list_State=array(
    "مكة المكرمة",
    "المدينة المنورة",
    "الرياض",
    "الشرقية",
    "القصيم",
    "حائل",
    "تبوك",
    "جازان",
    "الجوف",
    "نجران",
    "عسير",
    "الحدود الشمالية",
);

$length_State=count($arra_list_State);


//  array Status   *-*-*-*-*-*-*-*-*-*-*-*-*
$arr_list_Status=array(
    "جديد",
    "مستعمل",
);

$length_Status=count($arr_list_Status);



//  array account number   *-*-*-*-*-*-*-*-*-*-*-*-*
$arr_list_account=array(
    "1"=> "",
    "مستعمل",
);

$length_account=count($arr_list_account);


//  DELETE  ITEM    *-*-*-*-*-*-*-*-*-*-*-*-*

//delete($id);
 function delete ($id){

     try
     {
         include ("Connection.php");
         $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
         $sql ="DELETE FROM  item  WHERE ID=:ITID";
         $stmt = $conn->prepare($sql);
         $stmt->execute(array('ITID'=>$id));
         echo "<p class='alert_success'>.. لقد تم حذف الاعلان بنجاح ..</p>";

      }catch (PDOException $error)
     {
         echo "<p class='alert_danger'>".$error->getMessage() ."</p>";
     }

}


?>

























<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!---->
<!--</head>-->
<!--<body>-->
<!---->
<!---->
<!--    <form>-->
<!---->
<!--        <select>-->
<!--            --><?php //  for ($i=0;$i<$arrlength;$i++)  {?>
<!--            <option value="--><?php // echo $list_cits[$i];   ?><!--">--><?php //echo $list_cits[$i] ;  ?><!-- </option>-->
<!--            --><?php //  } ?>
<!--        </select>-->
<!-- </php>-->
<!--    </form>-->
<!--</body>-->
<!--</html>-->
