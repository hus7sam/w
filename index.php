<?php


include 'Connection.php';
include ("fun.php");
counts_visitors_Fun();

$_countVisiters = "";
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
        echo "<p class='alert alert-success text-center fs-5'>.. لقد تم إضافة الاعلان بنجاح ..</p>";

    }catch (PDOException $error){

        echo "<p class='alert-danger text-center fs-5'>".$error->getMessage() ."</p>";
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>فينا خير</title>
</head>
<body>

<?php include ("header.php") ?>

</div>

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
    <h1 class="h1"> نموذج تسجيل إعلان</h1>
            <form action="index.php" method="post" class="row g-3 bg-gradient justify-content-center m-auto p-5 mt-5 col rounded-2">
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label fs-5 text-light">أسم المنتج</label>
                    <input type="text" class="form-control form-control-lg" id="inputPassword4" placeholder="أكتب إسم المنتج" name="name_F" required>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-md-4">
                    <label for="Status_F" class="form-label fs-5  text-light">حالة المنتج</label>
                    <select id="Status_F" class="form-select form-select-lg" name="Status_F" required>
                        <option selected value=""> أختر الحالة ...</option>
                        <?php   for ($i=0; $i<$length_Status; $i++)  {?>
                            <option value="<?php  echo $arr_list_Status[$i]; ?>">
                                <?php echo $arr_list_Status[$i];?> </option>
                        <?php } ?>
                    </select>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-md-4">
                    <label for="Category_F" class="form-label fs-5 text-light"> فئة المنتج</label>
                    <select id="Category_F" class="form-select form-select-lg" name="Category_F" required>
                        <option  selected value=""> أختر الفئة ...</option>
                        <?php   for ($i=0; $i<$length_Category; $i++)  {?>
                            <option value="<?php  echo $arra_list_Category[$i]; ?>">
                                <?php echo $arra_list_Category[$i]; ?> </option>
                        <?php } ?>
                    </select>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-12 lh-lg">
                    <label for="Description_F" class="form-label fs-5 text-light"> وصف للمنتج</label>
<!--                    <input type="text" class="form-control form-control-lg" id="Description_F" placeholder="أكتب وصف للمنتج لا يتعدى 200 حرف" name="Description_F"required>-->
                    <textarea class="form-control" id="Description_F" aria-label="وصف للمنتج"placeholder="أكتب وصف للمنتج لا يتعدى 200 حرف" name="Description_F"required></textarea>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>

                <div class="col-md-4">
                    <label for="State_F" class="form-label fs-5 text-light">إسم المنطقة</label>
                    <select id="State_F" class="form-select form-select-lg" name="State_F" required>
                        <option selected value=""> أختر المنطقة ...</option>
                        <?php   for ($i=0; $i<$length_State; $i++)  {?>
                            <option value="<?php  echo $arra_list_State[$i]; ?>">
                                <?php echo $arra_list_State[$i]; ?> </option>
                        <?php } ?>
                    </select>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-md-4">
                    <label for="City_F" class="form-label fs-5 text-light"> إسم المدينة</label>
                    <input type="text"  class="form-control form-control-lg" id="City_F"  placeholder="أكتب إسم المدينة" name="City_F" required >
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-md-4">
                    <label for="Number_F" class="form-label fs-5 text-light">رقم الجوال</label>
                    <input type="number" class="form-control form-control-lg" id="Number_F" placeholder="أكتب رقم الجوال" name="Number_F" required>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <!--        <div class="col-12">-->
                <!--            <div class="form-check">-->
                <!--                <input class="form-check-input" type="checkbox" id="gridCheck">-->
                <!--                <label class="form-check-label" for="gridCheck">-->
                <!--                    Check me out-->
                <!--                </label>-->
                <!--            </div>-->
                <!--        </div>-->
                <div class="d-grid  col-md-12 mx-auto m-5">
                    <button type="submit" class="btn btn-outline-light btn-lg">إضافة الاعلان</button>
                </div>
            </form>

</div>





<?php include ("footer.php")?>



</div>
</body>
</html>
