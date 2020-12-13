<?php
include 'Connection.php';
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$Description = $State = $City = $itemNumber= $itStatus= $itemCategory = "";

if(isset($_POST["Description_F"])){

//    if (!filter_var($_POST["itemDesc"],FILTER_SANITIZE_STRING))  { $textErr="الرجاء كتابة وصف العنصر"; }
//    if (empty($_POST["itemDesc"])) { $textErr="الرجاء كتابة وصف العنصر ";
//    }else { $itemDesc = mysqli_real_escape_string(test_input($_POST["itemDesc"])) ;}

    $Description  =$_POST["Description_F"];
    $State        =$_POST["State_F"];
    $City         =$_POST["City_F"];
    $Number       =$_POST["Number_F"];
    $Status       =$_POST["Status_F"];
    $Category     =$_POST["Category_F"];


    function test_input($data) {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }


    try {

        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
        $sql ="INSERT INTO item (iD,Description,Status,Category,State,City,Number) 
                      VALUES(:itID,:itDesc,:itStatus,:itCategory,:itState,:itCity,:itNumber";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            'itID'       => null,
            'itDesc'     => $Description,
            'itStatus'   => $itStatus,
            'itCategory' => $Category,
            'itState'    => $State,
            'itCity'     => $City,
            'itNumber'   => $Number,
    ));
        echo "<p class='alert_success'>.. لقد تم إضافة الاعلان بنجاح ..</p>";

//        print_r($r);
    }catch (PDOException $error){

        echo "<p class='alert_danger'>".$error->getMessage() ."</p>";
    }
    }

?>
<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>فينا خير</title>
</head>
<body>

<div class="bar">
    <h2>| فينا خير  </h2>
    <p>خير الناس أنفعهم للناس ..</p>
</div>

<div class="head">
<h1>  .. خير الناس أنفعهم للناس ..  </h1>

    <a href="dispaly.php">أجهزة طبية </a>
    <a href="index.php"> أجهزة الكترونية</a>
    <a href="index.php"> أجهزة كهربائية</a>
    <a href="index.php"> كتب</a>
    <a href="index.php"> مواد غذائية</a>
    <a href="index.php"> أثاث</a>
    <a href="index.php"> ملابس </a>

<!--    <a href="inedx.php"> تبرعات</a>-->
    <h2>(يَا أَيُّهَا الَّذِينَ آمَنُوا ارْكَعُوا وَاسْجُدُوا وَاعْبُدُوا رَبَّكُمْ وَافْعَلُوا الْخَيْرَ لَعَلَّكُمْ تُفْلِحُونَ) </h2>
</div>

<div class="head" style="background-color: #c1bebe;
background: linear-gradient(-180deg, #BCC5CE 0%, #929EAD 98%), radial-gradient(at top left, rgba(255,255,255,0.30) 0%, rgba(0,0,0,0.30) 100%);
 background-blend-mode: screen;">
<h1>  أهداف عمل الخير</h1>
    <ol>
        <li>تحقيق رضا الله تعالى، والحصول على الأجر والثواب.</li>
        <li>فعل الخير بما يضمن للآخرين الحياة الكريمة.</li>
        <li>نشر المعروف بين الناس، وتشجيعهم على التعاون والتواصل والبرّ.</li>
        <li>نشر القيم الإسلامية بين الناس، كالتضامن، والتسامح، والتعاون.</li>
        <li>صيانة كرامة الفقراء والمحتاجين بتقديم المساعدة إليهم دون حاجتهم لذلّ السؤال.</li>
        <li>تربية على معاني العطاء والابتكار.</li>
        <li>تربية الأجيال على معنى المواطنة الصالحة</li>
    </ol>

</div>

<div class="head">
    <h1>   التسجيل</h1>
    <div class="box_form">
        <form  class="form_insert" action="index.php" method="post">
            <textarea class="textarea_form_insert" name="Description_F" placeholder="أكتب وصف للعنصر"></textarea>

            <select class="list_insert" name="State_F">
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

            <input    class="input_form_insert" type="text" name="City_F"   placeholder="أكتب اسم المدينة">
            <input    class="input_form_insert" type="text" name="Number_F" placeholder="رقم الرقم التواصل">

            <select class="list_insert" name="Category_F">
                <option value=""> -- ختر فئة العنصر--</option>
                <option value="أجهزة طبية">أجهزة طبية</option>
                <option value="كتب">كتب</option>
                <option value="ملابس">ملابس</option>
                <option value="أثاث">أثاث</option>
                <option value="مواد غذائية">مواد غذائية</option>
                <option value="الكهربائيات">الكهربائيات</option>
                <option value="الالكترونيات">الالكترونيات</option>
                <option value="أخر">أخر</option>
            </select>

            <select class="list_insert" name="Status_F">
                <option value="">-- أختر حالة العنصر  -- </option>
                <option value="جديد">جديد</option>
                <option value="مستعمل">مستعمل</option>
            </select>

            <input class="btn_submit_sreach" type="submit" value="بحث">

        </form>
    </div>

</div>

<footer>
<!--    <ul>-->
<!--        <li> لتواصل عبر البريد الالكتوني-->
<!--            <ul>-->
<!--                <li><a href="mailto:hege@example.com">hege@example.com</a></li>-->
<!--            </ul>-->
<!--        </li>-->
<!---->
<!--        <li>  لتواصل عبر الواتس-->
<!--            <ul>-->
<!--                <li><a href="https://wa.me/+996546668820">    0546668820  </a></li>-->
<!--            </ul>-->
<!--        </li>-->
<!---->
<!--    </ul>-->
<!---->
<!--<h3> جميع الحقوق محفوظة </h3>-->


</footer>
</body>
</html>
