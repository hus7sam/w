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

        if (!empty($dbhost)) {
            if (isset($dbname)) {
                if (!empty($dbusername)) {
                    if (!empty($dbpassword)) {
                        if (!empty($options)) {
                            $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
                        }
                    }
                }
            }
        }
        $sql ="INSERT INTO item (ID,name,Description,Status,Category,State,City,Number) 
                      VALUES(:itID,:itname,:itDesc,:itStatus,:itCategory,:itState,:itCity,:itNumber)";
        if (isset($conn)) {
            $stmt = $conn->prepare($sql);
        }
        if (!empty($stmt)) {
            if (!empty($name)) {
                if (!empty($Description)) {
                    if (!empty($Status)) {
                        if (!empty($Category)) {
                            if (!empty($State)) {
                                if (!empty($City)) {
                                    if (!empty($Number)) {
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
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
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

<div class="head my-5">


    <h1 class="h1 my-5 py-3">   خير الناس أنفعهم للناس   </h1>

    <div class="container">
        <div class="row g-3 row-cols-md-4 justify-content-center text-center text-white py-5 ">

            <?php if (isset($length_Category)) {
                for ($i=0; $i<$length_Category; $i++)  {?>
                <div class="col-lg-3 col-md-4 col-sm-4 ">
                    <div class="p-3  fs-lg-2 fs-md-1 fs-sm-6 bg-gradient rounded-pill border border-light shadow-lg " >
                        <a href="display.php " class="link-light text-decoration-none fs-3">
                        <?php if (isset($arra_list_Category)) {
                            echo $arra_list_Category[$i];
                        } ?>
                    </a> </div> </div>
                 <?php }
            } ?>

</div>
</div>
</div>



<div id="C4" class="head_2">
    <h1 class="h1 my-5 py-3 shadow-lg">  أهدافنا</h1>
        <div class="container">
            <div class="row g-3 row-cols-md-4 justify-content-center text-center text-white py-5 ">
                <div class="col-md-3">
                    <div class="p-3  fs-2  bg-gradient rounded-pill border border-light shadow-lg">فعل الخير </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3  fs-2  bg-gradient rounded-pill border border-light shadow-lg">نفع الغير</div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 fs-2  bg-gradient rounded-pill border border-light shadow-lg">التعاون  </div>
                 </div>
                <div class="col-md-3">
                    <div class="p-3  fs-2  bg-gradient rounded-pill border border-light shadow-lg">العطاء</div>
                </div>
            </div>
    </div>
</div>

<div id="C10" class="head_3">
    <div class="container">
    <h1 class="h1 my-5 py-3 shadow-lg"> نموذج تسجيل إعلان</h1>
    <div class="row  justify-content-center my-5  rounded-3 shadow-lg"  >
        <!--    start column 1  -->
        <div class="col p-4 justify-content-center bg-gradient">
            <form action="index.php" method="post" class="row g-3 justify-content-center">
                <div class="col-md-4 ">
                    <label for="inputPassword4" class="form-label fs-5 ">أسم المنتج</label>
                    <input type="text" class="form-control form-control-lg" id="inputPassword4" placeholder="أكتب إسم المنتج" name="name_F" required>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-md-4">
                    <label for="Status_F" class="form-label fs-5  ">حالة المنتج</label>
                    <select id="Status_F" class="form-select form-select-lg" name="Status_F" required>
                        <option selected value=""> أختر الحالة ...</option>
                        <?php if (isset($length_Status)) {
                            for ($i=0; $i<$length_Status; $i++)  {?>
                                <option value="<?php if (!empty($arr_list_Status)) {
                                    echo $arr_list_Status[$i];
                                } ?>">
                                    <?php if (!empty($arr_list_Status)) {
                                        echo $arr_list_Status[$i];
                                    } ?> </option>
                            <?php }
                        } ?>
                    </select>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-md-4">
                    <label for="Category_F" class="form-label fs-5 "> فئة المنتج</label>
                    <select id="Category_F" class="form-select form-select-lg" name="Category_F" required>
                        <option  selected value=""> أختر الفئة ...</option>
                        <?php if (!empty($length_Category)) {
                            for ($i=0; $i<$length_Category; $i++)  {?>
                                <option value="<?php if (!empty($arra_list_Category)) {
                                    echo $arra_list_Category[$i];
                                } ?>">
                                    <?php if (!empty($arra_list_Category)) {
                                        echo $arra_list_Category[$i];
                                    } ?> </option>
                            <?php }
                        } ?>
                    </select>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-12 lh-lg">
                    <label for="Description_F" class="form-label fs-5 "> وصف للمنتج</label>
<!--                    <input type="text" class="form-control form-control-lg" id="Description_F" placeholder="أكتب وصف للمنتج لا يتعدى 200 حرف" name="Description_F"required>-->
                    <textarea class="form-control" id="Description_F" aria-label="وصف للمنتج" placeholder="أكتب وصف للمنتج لا يتعدى 200 حرف" name="Description_F" required></textarea>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>

                <div class="col-md-4">
                    <label for="State_F" class="form-label fs-5 ">إسم المنطقة</label>
                    <select id="State_F" class="form-select form-select-lg" name="State_F" required>
                        <option selected value=""> أختر المنطقة ...</option>
                        <?php if (isset($length_State)) {
                            for ($i=0; $i<$length_State; $i++)  {?>
                                <option value="<?php if (isset($arra_list_State)) {
                                    echo $arra_list_State[$i];
                                } ?>">
                                    <?php if (isset($arra_list_State)) {
                                        echo $arra_list_State[$i];
                                    } ?> </option>
                            <?php }
                        } ?>
                    </select>
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-md-4">
                    <label for="City_F" class="form-label fs-5"> إسم المدينة</label>
                    <input type="text"  class="form-control form-control-lg" id="City_F"  placeholder="أكتب إسم المدينة" name="City_F" required >
<!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-md-4">
                    <label for="Number_F" class="form-label fs-5 ">رقم الجوال</label>
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
    </div>

</div>
    <?php include ("footer.php")?>
</body>
</html>
