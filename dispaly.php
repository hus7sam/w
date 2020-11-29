<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" type="text/css" href="style.css">

    <title>عرض</title>
</head>
<body class="Display_Body">
<div class="bar">
    <h2>| فينا خير  </h2>
    <p>خير الناس أنفعهم للناس ..</p>

</div>
<div class="DisplayHead">


    <div class="diHead">
        <select name="formGender">
            <option value="">-- أختر المنطقة -- </option>
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
    </div>

    <div class="diHead">
        <select name="formGender">
            <option value="">-- أختر فئة العنصر  -- </option>
            <option value="أجهزة طبية">أجهزة طبية</option>
            <option value="أجهزة كهربائية"> أجهزة كهربائية</option>
            <option value="أجهزة الكترونية">أجهزة الكترونية</option>
            <option value="كتب">كتب</option>
            <option value="ملابس">ملابس</option>
            <option value="أثاث">أثاث</option>
            <option value="مواد غذائية">مواد غذائية</option>
            <option value="أخر">أخر</option>
        </select>
    </div>
    <div class="diHead">
        <select name="formGender">
            <option value="">-- أختر حالة العنصر  -- </option>
            <option value="جديد">جديد</option>
            <option value="مستعمل">مستعمل</option>
        </select>
    </div>
    <div class="diHead">
        <input type="submit" value="أبحث">
    </div>










</div>

<div class="Display_Grid-container">



    <?php
    require 'Connection.php';
$stmt = $conn->prepare("select itemDesc,itemState,itemCity,itemNumber from items order by itemDate DESC ");
if(!$stmt){
    printf("Query Prep Failed: %s
\n", $conn->error);
        exit;
    }

    $stmt->execute();

    $stmt->bind_result($itemDesc, $itemState,	$itemCity,$itemNumber);


    while($stmt->fetch()){
 echo "<div class='grid-item'>

        <table>
                <tr>
                    <td COLSPAN='3'>  $itemDesc  </td>
                </tr>

                <tr ALIGN='CENTER'>
                    <td>$itemState</td>
                    <td>$itemCity</td>
                    <td>$itemNumber </td>
                </tr>
                
            </table>
            <img src='' class='imh_grid'>
       </div>";

    }


    $stmt->close();
    ?>






</body>
</html>
