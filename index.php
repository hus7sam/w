<?php
include 'Connection.php';
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$itemDesc = $itemState = $itemCity = $itemNumber= $itemStatus= $itemCategory = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

//    if (!filter_var($_POST["itemDesc"],FILTER_SANITIZE_STRING))  { $textErr="الرجاء كتابة وصف العنصر"; }
//    if (empty($_POST["itemDesc"])) { $textErr="الرجاء كتابة وصف العنصر ";
//    }else { $itemDesc = mysqli_real_escape_string(test_input($_POST["itemDesc"])) ;}
    $itemID     = null;
    $itemDesc     = $_POST["itemDesc"];
    $itemState    = $_POST["itemState"];
    $itemCity     = $_POST["itemCity"];
    $itemNumber   = $_POST["itemNumber"];
    $itemStatus   = $_POST["itemStatus"];
    $itemCategory = $_POST["itemCategory"];


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $stmt = $conn->prepare('INSERT INTO items (itemID,itemDesc,itemStatus,itemCategory,itemState,itemCity,itemNumber) 
            VALUES (?,?,?,?,?,?,?) ');
//    if(!$stmt){
//        printf("Query Prep Failed: %s\n", $conn->error);
//        exit;
//    }
    $stmt->bind_param('isssssi', $itemID,$itemDesc,$itemStatus,$itemCategory,$itemState,$itemCity,$itemNumber);
    $stmt->execute();
    echo "New records created successfully";



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
<h1>  .. خير الناس أنفعهم للناس ..
    </h1>

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

<div class="head" style="background-color: #c1bebe;">
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

        <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <textarea cols="50" rows="3" placeholder="أكتب وصف العنصر هنا..." id="text" name="itemDesc"></textarea>

            <select name="itemState">
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

            <input type="text" id="itemCity" name="itemCity" placeholder="المدينة">

            <input type="number" id="itemNumber" name="itemNumber" placeholder="رقم الجوال">

                <select name="itemCategory">
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

            <select name="itemStatus">
                <option value="">-- أختر حالة العنصر  -- </option>
                <option value="جديد">جديد</option>
                <option value="مستعمل">مستعمل</option>
            </select>
            <span class="error">* <?php echo $nameErr;?></span>

            <input type="submit" value="أرسل">
        </form>


</div>


<footer>
    <ul>

        <li> لتواصل عبر البريد الالكتوني
            <ul>
                <li><a href="mailto:hege@example.com">hege@example.com</a></li>

            </ul>
        </li>

        <li>  لتواصل عبر الواتس
            <ul>
                <li><a href="https://wa.me/+996546668820">    0546668820  </a></li>
            </ul>
        </li>

    </ul>

<h3> جميع الحقوق محفوظة </h3>


</footer>
</body>
</html>