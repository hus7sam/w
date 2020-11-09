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

        <div class="grid-item">
            <table>
                <tr>
                    <td COLSPAN="3">هناك الكثير من الحكم المنتشرة والشائعة بين الناس؛ حيث إنّها تُقال بعد المرور بعدّة مواقف قد يتعرّض لها الإنسان فيأخذ العظة والعبرة منها، وسنذكر في هذا المقال أجمل الحكم الشائعة بين الناس
                    </td>
                </tr>
<!--                <tr>-->
<!--                    <td> المدينة</td>-->
<!--                    <td> الحي</td>-->
<!--                    <td> رقم الجوال</td>-->
<!--                </tr>-->
                <tr ALIGN="CENTER">
                    <td>الرياض </td>
                    <td>حي النسيم</td>
                    <td>0123456789 </td>
                </tr>
            </table>

        </div>


    <?php
    require 'Connection.php';

    $stmt = $conn->prepare("select itemDesc,itemState,itemCity,itemNumber from items order by itemDate ASC");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $conn->error);
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
       </div>";

    }


    $stmt->close();
    ?>






</body>
</html>
