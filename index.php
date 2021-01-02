<?php


include 'Connection.php';
include ("fun.php");
$DescriptionErr = $emailErr = $genderErr = $websiteErr = "";
//$Description = $State = $City = $itemNumber= $itStatus= $itemCategory = "";

if(isset($_POST["Description_F"])){

//        vilter  name_F             *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["name_F"]))
    {  $DescriptionErr="الرجاء كتابة المدينة";  $_POST["name_F"]=''; }
    if(filter_has_var(INPUT_POST,'name_F'))
    { $name=test_input(filter_var($_POST["name_F"],FILTER_SANITIZE_STRING)); }

//        vilter  Description_F    *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["Description_F"]))
    { $DescriptionErr="الرجاء كتابة المدينة";  $_POST["Description_F"]=''; }
    if(filter_has_var(INPUT_POST,'Description_F'))
    { $Description=test_input(filter_var($_POST["Description_F"],FILTER_SANITIZE_STRING)); }

//        vilter  State_F           *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["State_F"]))
    { $DescriptionErr="الرجاء كتابة المدينة";  $_POST["State_F"]=''; }
    if(filter_has_var(INPUT_POST,'State_F'))
    {   $State=test_input(filter_var($_POST["State_F"],FILTER_SANITIZE_STRING));   }

    //        vilter  City_F        *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["City_F"]))
    { $DescriptionErr="الرجاء كتابة المدينة";  $_POST["City_F"]=''; }
    if(filter_has_var(INPUT_POST,'City_F'))
    { $City=test_input(filter_var($_POST["City_F"],FILTER_SANITIZE_STRING));}

    //        vilter  Number_F        *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["Number_F"]))
    { $DescriptionErr="الرجاء كتابة المدينة";  $_POST["Number_F"]=''; }
    if(filter_has_var(INPUT_POST,'Number_F'))
    { $Number=test_input(filter_var($_POST["Number_F"],FILTER_SANITIZE_STRING));}

    //        vilter  Status_F        *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["Status_F"]))
    { $DescriptionErr="الرجاء كتابة المدينة";  $_POST["Status_F"]=''; }
    if(filter_has_var(INPUT_POST,'Status_F'))
    { $Status=test_input(filter_var($_POST["Status_F"],FILTER_SANITIZE_STRING));}

    //        vilter  Category_F        *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["Category_F"]))
    { $DescriptionErr="الرجاء كتابة المدينة";  $_POST["Category_F"]=''; }
    if(filter_has_var(INPUT_POST,'Category_F')){
        $Category=test_input(filter_var($_POST["Category_F"],FILTER_SANITIZE_STRING));}



    try {

        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
        $sql ="INSERT INTO item (ID,name,Description,Status,Category,State,City,Number) 
                      VALUES(:itID,:itname,:itDesc,:itStatus,:itCategory,:itState,:itCity,:itNumber)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($R=array(
            'itID'       => null,
            'itname'     => $name,
            'itDesc'     => $Description,
            'itStatus'   => $Status,
            'itCategory' => $Category,
            'itState'    => $State,
            'itCity'     => $City,
            'itNumber'   => $Number,
        ));
        echo "<p class='alert_success'>.. لقد تم إضافة الاعلان بنجاح ..</p>";

    }catch (PDOException $error){

        echo "<p class='alert_danger'>".$error->getMessage() ."</p>";
    }
     $conn=null;
    header("Location: display.php");
}

?>
<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
<!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->

    <title>فينا خير</title>
</head>
<body>

<?php include ("header.php") ?>


<div class="head">


    <h1 class="h1">   خير الناس أنفعهم للناس   </h1>


    <?php   for ($i=0; $i<$length_Category; $i++)  {?>
    <a href="display.php">
                <?php echo $arra_list_Category[$i]; ?>
      </a>   <?php } ?>



<!--    <h2>(يَا أَيُّهَا الَّذِينَ آمَنُوا ارْكَعُوا وَاسْجُدُوا وَاعْبُدُوا رَبَّكُمْ وَافْعَلُوا الْخَيْرَ لَعَلَّكُمْ تُفْلِحُونَ) </h2>-->
</div>


<div id="C4" class="head_2">
    <h1 class="h1">  أهداف عمل الخير</h1>

    <p class="p_list"><img class="img_list" src="img/icons8-number-1-100.png">
        تحقيق رضا الله تعالى، والحصول على الأجر والثواب.
    </p>
    <p class="p_list"><img class="img_list" src="img/icons8-number-2-100.png">
        فعل الخير بما يضمن للآخرين الحياة الكريمة.
    </p>
    <p class="p_list"> <img class="img_list" src="img/icons8-3-100.png">
        نشر المعروف بين الناس، وتشجيعهم على التعاون والتواصل والبرّ.
    </p>
    <p class="p_list"> <img class="img_list" src="img/icons8-number-4-100.png">
        نشر القيم الإسلامية بين الناس، كالتضامن، والتسامح، والتعاون.
    </p>
    <p class="p_list"> <img class="img_list" src="img/icons8-5-c-100.png">
        صيانة كرامة الفقراء والمحتاجين بتقديم المساعدة إليهم دون حاجتهم لذلّ السؤال.
    </p>
    <p class="p_list"> <img class="img_list" src="img/icons8-number-6-100.png">
        تربية على معاني العطاء والابتكار.
    </p>
    <p class="p_list"> <img class="img_list" src="img/icons8-7-c-100.png">
        تربية الأجيال على معنى المواطنة الصالحة
    </p>


</div>

<div id="C10" class="head_3">
    <h1 class="h1">   نموذج تسجيل إعلان</h1>
    <div class="box_form">
        <form  class="form_insert" action="index.php" method="post">

            <input    class="input_form_insert" type="text" name="name_F"   placeholder="أكتب اسم العنصر" required/>

            <textarea class="textarea_form_insert" name="Description_F" placeholder="أكتب وصف للعنصر لا يتعدى 200 حرف" required></textarea>

            <input    class="input_form_insert" type="text" name="City_F"   placeholder="أكتب اسم المدينة / المحافطة / القرية" required>
            <input    class="input_form_insert" type="text" name="Number_F" placeholder="أكتب رقم الجوال " required/>

            <select class="list_insert" name="State_F" required/>
                <option value="">-- أختر المنطقة --</option>
                <?php   for ($i=0; $i<$length_State; $i++)  {?>
                <option value="<?php  echo $arra_list_State[$i]; ?>">
                <?php echo $arra_list_State[$i]; ?> </option>
                <?php } ?>
            </select>

            <select class="list_insert" name="Category_F" required/>
                <option value="">-- أختر فئة العنصر --</option>
                <?php   for ($i=0; $i<$length_Category; $i++)  {?>
                <option value="<?php  echo $arra_list_Category[$i]; ?>">
                <?php echo $arra_list_Category[$i]; ?> </option>
                <?php } ?>
            </select>


            <select class="list_insert" name="Status_F" required/>
                <option value=""> -- أختر حالة العنصر  -- </option>
                <?php   for ($i=0; $i<$length_Status; $i++)  {?>
                <option value="<?php  echo $arr_list_Status[$i]; ?>">
                <?php echo $arr_list_Status[$i];?> </option>
                <?php } ?>
            </select>

            <input class="btn_submit_insert" type="submit" value="بحث" hidden>

        </form>
    </div>
</div>

<?php include ("footer.php")?>



</div>
</body>
</html>
