<?php

include "Connection.php";
include "fun.php";
include "header.php";
// define variables and set to empty values
$DescriptionErr= "";
$Description_item = $name_item = $id_item = $isvalue ="";

if(isset($_POST["Description_item_F"])){

    //        vilter  Description_item_F             *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["Description_item_F"])) {
        $DescriptionErr = "الرجاء كتابة المدينة";
        $_POST["Description_item_F"] = '';
    }
    if (filter_has_var(INPUT_POST, 'Description_item_F')) {
        $Description_item = test_input(filter_var($_POST["Description_item_F"], FILTER_SANITIZE_STRING));
        $isvalue =+1;
    }

    //        vilter  Description_item_F             *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["name_new_F"])) {
        $_POST["name_new_F"] = '';
    }
    if (filter_has_var(INPUT_POST, 'name_new_F')) {
        $name_item = test_input(filter_var($_POST["name_new_F"], FILTER_SANITIZE_STRING));
        $isvalue =+1;
    }

    //        vilter  id_new_F             *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["id_new_F"])) {
        $_POST["id_item_F"] = '';
    }
    if (filter_has_var(INPUT_POST, 'id_new_F')) {
        $id_item = test_input(filter_var($_POST["id_new_F"], FILTER_SANITIZE_NUMBER_INT));
        $isvalue =+1;
    }
    //        vilter  id_new_F             *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["id_old_F"])) {
        $_POST["id_old_F"] = '';
    }
    if (filter_has_var(INPUT_POST, 'id_old_F')) {
        $id_old_F = test_input(filter_var($_POST["id_old_F"], FILTER_SANITIZE_NUMBER_INT));
        $isvalue =+1;
    }

    //        vilter  name_old_F             *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
    if (empty($_POST["name_old_F"])) {
        $_POST["name_old_F"] = '';
    }
    if (filter_has_var(INPUT_POST, 'name_old_F')) {
        $name_old_F = test_input(filter_var($_POST["name_old_F"], FILTER_SANITIZE_STRING));
        $isvalue =+1;
    }
}


$id_old = isset($_POST['id_old_F']) ? $_POST['id_old_F'] : "";
$name_old  = isset($_POST['name_old_F']) ? $_POST['name_old_F'] : "";
$Description_old  = isset($_POST['Description_old_F']) ? $_POST['Description_old_F'] : "";

if ($isvalue==5):
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

endif;

?>

<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <title>Document</title>-->
</head>
<body>


<div class="container justify-content-center">
<!--    --><?php //if (isset($_REQUEST["display"]) && $_REQUEST["display"]===1 ): ?>

        <!--    start of delete section -->
        <h1 class="h1 my-5 p-3"> نموذج طلب حذف منتج</h1>
        <!--    start of row  -->
        <div class="row justify-content-center bg-white bg-gradient m-5 py-3 rounded-3" >
            <!--    start column 1  -->
            <div class="col p-4 justify-content-center border border-3 border-secondary border-top-0 border-end-0 border-bottom-0">
                <!--    start form 1  -->
                <form action="index.php" method="post" class="row g-3 justify-content-center">
                    <div class="col-md-4">
                        <label for="id_new_F" class="form-label fs-5 ">رقم المنتج</label>
                        <input type="number" class="form-control form-control-lg" value="<?php echo $id_old ;?>" id="id_new_F" name="id_new_F" disabled>
                    </div>
                    <div class="col-md-8">
                        <label for="name_new_F" class="form-label fs-5 ">أسم المنتج</label>
                        <input type="text" class="form-control form-control-lg" value="<?php echo $name_old ;?>" id="name_new_F" name="name_new_F" disabled >
                    </div>
                    <div class="col-md-12 ">
                        <label for="Description_item_FD" class="form-label fs-5 "> وصف المنتج:</label>
                        <div class="p-3 border  border-secondary  rounded-3 bg-silver_W_HU bg-gradient bg-gradient text-dark" ><?php echo $Description_old ;?></div>

                    </div>
                    <div class="col-md-12">
                        <label for="Category_F" class="form-label  fs-5">  تصينف المخالفة</label>
                        <select id="Category_F" class="form-select mr-sm-2 form-select-lg" name="Category_F" required>
                            <option  selected value=""> أختر الفئة ...</option>
                            <?php   for ($i=0; $i<$length_violation; $i++)  {?>
                                <option value="<?php  echo $arr_list_violation[$i]; ?>">
                                    <?php echo $arr_list_violation[$i]; ?> </option>
                            <?php } ?>
                        </select>
                        <!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                    </div>
                    <div class="col-md-12 lh-lg">
                        <label for="Description_item_F" class="form-label fs-5 text-dark"> سبب طلب الحذف</label>
                        <!--                    <input type="text" class="form-control form-control-lg" id="Description_F" placeholder="أكتب وصف للمنتج لا يتعدى 200 حرف" name="Description_F"required>-->
                        <textarea class="form-control" id="Description_item_F" aria-label="وصف للمنتج"placeholder="أكتب سبب طلب الحذف" name="Description_F"></textarea>
                        <span class="badge bg-danger p-1 rounded-1"><?php echo $DescriptionErr;?></span>
                    </div>
                    <div class="d-grid  col-md-12 mx-auto m-5">
                        <button type="submit" class="btn btn-outline-primary btn-lg">إرسال طلب الحذف</button>
                    </div>
                </form>
                <!--    end form 1  -->
            </div>
            <!--    end  column 1  -->

            <!--   start  column 3  -->
            <div class="col   p-4">
                <div class="alert alert-info bg-gradient shadow-sm">الرجاء شرح السببب بشكل واضح ومختصر</div>
                <div class="alert alert-info bg-gradient shadow-sm">الرجاء التأكد من بيانات المنتج قبل ارسال الطلب</div>
                <span class="badge bg-secondary fs-6 text-white text-center my-2 py-2 shadow-sm">يعد المنتج مخالف في الحالات التالية: </span>
                <div class="alert alert-warning py-3 shadow-sm">في حال كان المنتج مخالف للشريعة الاسلامية  </div>
                <div class="alert alert-warning py-3 shadow-sm">في حال كان المنتج مخالف لقوانين المملكة العربية السعودية   </div>
                <div class="alert alert-warning py-3 shadow-sm">في حال طلب مبلغ مقابل المنتج   </div>
                <div class="alert alert-warning py-3 shadow-sm">في حال الغش والخداع   </div>
                </div>
        </div>
<!--        --><?php //endif; ?>
    <!--    end of row  -->
    <!--    end delete section -->


</div>

<?php
include "footer.php";
?>
</body>
</html>
