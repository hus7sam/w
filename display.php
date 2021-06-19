<?php

$is_display=0;
$is_display_se=0;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>عرض</title>   <link rel="shortcut icon" type="image/png" href="img/logo3.png" />

</head>

<body>

<?php  include ("header.php")?>
<div class="container  container-fluid ">




    <!--  *-*-*-*-*-*-*-* بداية البحث   *-*-*-*-*-*-*-*-*-*-   -->
    <div class="accordion bg-white my-5 rounded-3" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    بحث بالمنطقة أو فئة المنتج أو حالة المنتج
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row   bg-transparent  mx-1 rounded-3 anmaHu shadow-lg text-dark w-auto" >
                        <!--    start column 1  -->
                        <div class="col p-4 justify-content-center ">
                            <!--    start form 1  -->
                            <form action="test.php"
                                  method="POST"
                                  class="row g-3 justify-content-center">

                                <div class="col-md-4">  <label for="search_State" class="form-label  fs-5">  المنطقة:</label>
                                    <select id="search_State" class="form-select  form-select-lg" name="search_State" >
                                        <option selected value="">-- أختر المنطقة --</option>
                                        <?php if (!empty($length_State))
                                        { for ($i=0; $i<$length_State; $i++)  {?>
                                            <option value="<?php if (!empty($arra_list_State)) {
                                                echo $arra_list_State[$i];
                                            } ?>">
                                                <?php if (!empty($arra_list_State)) {
                                                    echo $arra_list_State[$i];
                                                } ?> </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="search_Category" class="form-label fs-5">     فئة المنتج:  </label>
                                    <select id="search_Category" class="form-select form-select-lg" name="search_Category" >
                                        <option selected value="">-- أختر فئة العنصر --</option>
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
                                </div>
                                <div class="col-md-4">
                                    <label for="search_Status"
                                           class="form-label  fs-5">
                                        حالة المنتج:
                                    </label>
                                    <select id="search_Status"
                                            class="form-select  form-select-lg"
                                            name="search_Status" >
                                        <option  selected value="">-- أختر حالة العنصر --</option>
                                        <?php if (!empty($length_Status)) {
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
                                </div>

                                <div class="d-grid  col-md-4 mx-auto mx-5">
                                    <button type="submit"
                                            name="box_Search"
                                            class="btn btn-outline-primary btn-lg">
                                        إبحث
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>                </div>
            </div>
        </div>



        <!--    ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++    -->




        <!-- \\\\   -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    البحث بالمنطقة و الاسم
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row   bg-body   mx-1 rounded-3 anmaHu shadow-lg text-dark w-auto" >
                        <!--    start column 1  -->
                        <div class="col p-4 justify-content-center ">
                            <!--    start form 1  -->
                            <form action="test.php"
                                  method="POST"
                                  class="row g-3 justify-content-center">

                                <div class="col-md-4">
                                    <label for="search_State_ser"
                                           class="form-label  fs-5">  المنطقة:</label>
                                    <select id="search_State_ser"
                                            class="form-select  form-select-lg"
                                            name="search_State_ser" >
                                        <option selected value="">-- أختر المنطقة --</option>
                                        <?php if (!empty($length_State)) {
                                            for ($i=0; $i<$length_State; $i++)  {?>
                                                <option value="<?php if (!empty($arra_list_State)) {
                                                    echo $arra_list_State[$i];
                                                } ?>">
                                                    <?php if (!empty($arra_list_State)) {
                                                        echo $arra_list_State[$i];
                                                    } ?> </option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="byname"
                                           class="form-label  fs-5">اسم المنتج</label>
                                    <input type="text"  class="form-control form-control-lg"
                                           id="byname"  placeholder="اسم المنتج"
                                           name="byname" required >
                                </div>

                                <div class="d-grid  col-md-4 ">
                                    <button type="submit" name="boxSearchByName"
                                            class="btn btn-outline-dark btn-lg">
                                        إبحث
                                    </button>
                                </div>         </div>       </div>       </div>          </div>        </div>
    </div>
    <!--    ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++    -->



    <!--  *-*-*-*-*-*-*-**-*-*-*-*-*-*-**-*-*-*-*-*-*-**-*-*-*-*-*-*-*    بداية البحث   *-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-**-*-*-*-*-*-   -->
    <div class="alert bg-gradient  text-white text-center fs-4 mb-4 rounded-bottom shadow-lg "> يمكن حذف اعلانك بالضغط على الايقونه
        <a href="https://api.whatsapp.com/send?phone=966530423063" class="btn btn-outline-light  py-0 my-1 mx-1 ">
            <i class="bi- bi-whatsapp   font_icon1 fs-5 py-1"></i>
        </a></div>

    <!--   *-*-*-*-*-*-*-* بداية الحصول على بيانات البحث  *-*-*-*-*-*-*-*-*-*-   -->
    <?php if(isset($_POST["box_Search"])):


    //        <!--   *-*-*-*-*-*-*-*   بداية استقبال قيمة المنطقة من الفور  وفلترتها *-*-*-*-*-*-*-*-*-*-   -->
    if (empty($_POST["search_State"])){        $DescriptionErr="مطلوب";
        $_POST["search_State"]='';            $is_display=0;
    }
    if(filter_has_var(INPUT_POST,'search_State')){        $State_1=test_input(filter_var($_POST["search_State"],
        FILTER_SANITIZE_STRING));        $is_display=+1;
    }
    //        <!--   *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*   نهاية    *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*   -->


    //        <!--   *-*-*-*-*-*-*-*   بداية استقبال قيمة فئة المنتج من الفور  وفلترتها *-*-*-*-*-*-*-*-*-*-   -->
    if (empty($_POST["search_Category"])) {        $DescriptionErr="الرجاء كتابة المدينة";
        $_POST["search_Category"]='';              $is_display=0;
    }
    if(filter_has_var(INPUT_POST,"search_Category")){
        $Category_1=test_input(filter_var($_POST["search_Category"],
            FILTER_SANITIZE_STRING));        $is_display=+1;
    }
    //        <!--   *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*   نهاية    *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*   -->


    //        <!--   *-*-*-*-*-*-*-*   بداية استقبال قيمة حالة المنتج من الفور  وفلترتها *-*-*-*-*-*-*-*-*-*-   -->
    if (empty($_POST["search_Status"])){        $DescriptionErr="الرجاء كتابة المدينة";
        $_POST["search_Status"]='';             $is_display=0;
    }
    if(filter_has_var(INPUT_POST,"search_Status")){
        $Status_1=test_input(filter_var($_POST["search_Status"],FILTER_SANITIZE_STRING));$is_display=+1;
    }
    //        <!--   *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*   نهاية    *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*   -->



    //        <!--   *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*   نهاية    *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*   -->


    //            <!--   *-*-*-*-*-*-*-* نهاية الحصول على بيانات البحظث  *-*-*-*-*-*-*-*-*-*-   -->


    //            <!--   *-*-*-*-*-*-*-* بداية عملية جلب البيانات من قاعدة البيانات  *-*-*-*-*-*-*-*-*-*-   -->
    if ($is_display >= 1)
    {
    if (!empty($dbhost)){
        if (!empty($dbname)){
            if (!empty($dbusername)){
                if (!empty($dbpassword)){
                    if (!empty($options)){
                        $conn = new PDO("mysql:host=$dbhost; dbname=$dbname",   $dbusername,  $dbpassword,   $options);
                    }        }         }       }    }
    $sql = "SELECT *  FROM item    WHERE  Status=:Status_1 or  Category=:Category_1 or State=:State_1 ORDER BY ID DESC";
    $stmt = $conn->prepare($sql);
    $select=array( 'Status_1' => $Status_1, 'Category_1' => $Category_1,'State_1'    => $State_1 , );
    $stmt->execute($select);
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $sum=count($rows);
    if ($sum===0)
    {
        $is_display=0;
    }

    echo "<div class='alert bg-gradient  text-white text-center fs-4 mb-4 rounded-bottom shadow-lg'>
 عدد المنتجات المتطابقه لبحثك ".$sum."</div>";
    echo "<div class='row g-2 m-0 p-0 anmaHu  row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4  row-cols-xxl-6 justify-content-center'>";
    //        <!--   *-*-*-*-*-*-*-*     بداية عرض  البحث   *-*-*-*-*-*-*-*-*-*-   -->
    foreach($rows as $row){  ?>
        <div class="col">
            <div class="card pb-2 shadow-sm border-0" >
                <div class="card-header fs-lg-4  fs-md-3 fs-sm-1  m-0 bg-aliceblue_HU bg-gradient  text-center">
                    <?php echo  $row['name']; ?>  </div>
                <img class="card-img-top mg-top mt-0 rounded-0 p-3 pb-1 m-0"
                     width="300"         height="250"
                    <?php if ($row['Img']==''){ ?>
                        src="img/logo3.png"
                    <?php   }else{ ?>
                     src="img/<?php echo $row['Img'];} ?>"
                     alt="صورة الاعلان">
                <div class="card-body p-0 pb-1 text-center ">
                    <h5 class="card-title d-inline-flex m-0">
                        <?php  if ($row['Status']==="جديد"):?>
                            <div class="btn btn-outline-success py-0 m-2 ">
                                <?php echo  'جديد'; ?>
                            </div>
                        <?php elseif($row['Status']==="مستعمل"): ?>
                            <div class="btn btn-outline-warning py-0 m-2 ">
                                <?php echo  'مستعمل'; ?>
                            </div>
                        <?php  endif;?>
                        <div class="btn btn-outline-danger py-0 m-2 mx-1 ">
                            <?php  echo $row['ID']."#"; ?>
                        </div>
                        <form action="delete.php" method="POST">
                            <input type="number" name="id_old_F"      value="<?php  echo $row['ID']; ?>"     hidden>
                            <input type="text"   name="name_old_F"    value="<?php  echo $row['name']; ?>"   hidden>
                            <input type="text"   name="Description_old_F" value="<?php  echo $row['Description']; ?>"                               hidden>
                            <input type="submit"   value="حذف"  name="submit"  alt="Submit"  class="btn btn-outline-primary py-0 m-2" />
                        </form>
                    </h5>

                    <p class="card-text  bg-silver_W_HU text-dark  p-2 m-0"
                       readonly="True"
                       style="height: 5rem;" >
                        <?php
                        $string = strip_tags($row['Description']);
                        if (strlen($string) > 100) {
                            // truncate string
                            $stringCut = substr($string, 0, 150);
                            $endPoint = strrpos($stringCut, ' ');
                            // if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            echo $string . " ..." ;
                        }else{ echo $string  ;} ?></p>

                    <div class="btn btn-outline-dark py-0 m-2">
                        <?php  echo $row['State'].str_repeat('&nbsp;', 1).
                            "-".str_repeat('&nbsp;', 1). $row['City']; ?>
                    </div>
                    <br>
                    <a href="tel:+966<?php  echo $row['Number']; ?>" class="btn btn-outline-primary py-0 my-1 ">
                        <i class="bi bi-telephone font_icon1"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=966
                    <?php  echo $row['Number']; ?>
                    " class="btn btn-outline-success py-0 my-1 mx-1 ">
                        <i class="bi- bi-whatsapp font_icon1"></i>
                    </a>
                    <div  class="card-link  btn btn-outline-danger py-0 my-1">
                        <?php echo date("Y-m-d ",strtotime($row['Date'])); ?>
                    </div>
                </div>

            </div>
        </div> <?php }?>

</div>

<?php   }

//               *-*-*-*-*-*-*-*    نهاية شرط تحقق القيمة للمتغير  $is_display   *-*-*-*-*-*-*-*-*-*-
endif;


if(isset($_POST["boxSearchByName"])):

    //        <!--   *-*-*-*-*-*-*-*   بداية استقبال قيمة البحث بااسم  من الفور  وفلترتها *-*-*-*-*-*-*-*-*-*-   -->
    if (empty($_POST["byname"]))
    {
        $DescriptionErr="الرجاء كتابة المدينة";
        $_POST["byname"]='';

    }
    if(filter_has_var(INPUT_POST,"byname")){
        $byname=test_input(filter_var($_POST["byname"],FILTER_SANITIZE_STRING));$is_display_se=+1;
    }
    //        <!--   *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*   نهاية    *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*   -->

    //        <!--   *-*-*-*-*-*-*-*   بداية استقبال قيمة البحث المنطقة   من الفور  وفلترتها *-*-*-*-*-*-*-*-*-*-   -->
    if (empty($_POST["search_State_ser"]))
    {
        $DescriptionErr="الرجاء كتابة المدينة";
        $_POST["search_State_ser"]='';
    }
    if(filter_has_var(INPUT_POST,"search_State_ser")){
        $city_s=test_input(filter_var($_POST["search_State_ser"],FILTER_SANITIZE_STRING));$is_display_se=+1;
    }
//               *-*-*-*-*-*-*-*    بداية البحث بالاسم     *-*-*-*-*-*-*-*-*-*-

//    if ($is_display_se ==2 )
//    {
    {  if (!empty($dbhost)){
        if (!empty($dbname)){
            if (!empty($dbusername)){
                if (!empty($dbpassword)){
                    if (!empty($options)){
                        $conn = new PDO("mysql:host=$dbhost; dbname=$dbname",   $dbusername,  $dbpassword,   $options);
                    }        }         }       }    }
        $sql = "SELECT * 
                    FROM item  
                    WHERE   State=:State_11 and name like :byname_1 
                    ORDER BY ID DESC";
        $stmt = $conn->prepare($sql);
        $select=array( 'State_11' => $city_s,
            'byname_1' => '%'.$byname.'%' );
        $stmt->execute($select);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $sum=count($rows);
        if ($sum===0)
        {
            $is_display=0;
        }
        $is_display=-1;
        echo "<div class='alert bg-gradient  text-white text-center fs-4 mb-4 rounded-bottom shadow-lg'>
 عدد المنتجات المتطابقه لبحثك ".$sum."</div>";
        echo "<div class='row g-2 m-0 p-0 anmaHu  row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4  row-cols-xxl-6 justify-content-center'>";
        //        <!--   *-*-*-*-*-*-*-*     بداية عرض  البحث   *-*-*-*-*-*-*-*-*-*-   -->
        foreach($rows as $row){  ?>
            <div class="col">
                <div class="card pb-2 shadow-sm border-0" >
                    <div class="card-header fs-lg-4  fs-md-3 fs-sm-1  m-0 bg-aliceblue_HU bg-gradient  text-center">
                        <?php echo  $row['name']; ?>  </div>
                    <img class="card-img-top mg-top mt-0 rounded-0 p-3 pb-1 m-0"
                         width="300"
                         height="250"
                        <?php if ($row['Img']==''){ ?>
                            src="img/logo3.png"
                        <?php   }else{ ?>
                         src="img/<?php echo $row['Img'];} ?>"
                         alt="صورة الاعلان">
                    <div class="card-body p-0 pb-1 text-center ">
                        <h5 class="card-title d-inline-flex m-0">
                            <?php  if ($row['Status']==="جديد"):?>
                                <div class="btn btn-outline-success py-0 m-2 ">
                                    <?php echo  'جديد'; ?></div>
                            <?php elseif($row['Status']==="مستعمل"): ?>
                                <div class="btn btn-outline-warning py-0 m-2 ">
                                    <?php echo  'مستعمل'; ?></div>
                            <?php  endif;?>
                            <div class="btn btn-outline-danger py-0 m-2 mx-1 "><?php  echo $row['ID']."#"; ?></div>
                            <form action="delete.php" method="POST">
                                <input type="number" name="id_old_F"      value="<?php  echo $row['ID']; ?>"     hidden>
                                <input type="text"   name="name_old_F"    value="<?php  echo $row['name']; ?>"   hidden>
                                <input type="text"   name="Description_old_F" value="<?php  echo $row['Description']; ?>"                               hidden>
                                <input type="submit"   value="حذف"  name="submit"  alt="Submit"  class="btn btn-outline-primary py-0 m-2" />
                            </form>
                        </h5>

                        <p class="card-text  bg-silver_W_HU text-dark  p-2 m-0"
                           readonly="True"
                           style="height: 5rem;" >
                            <?php
                            $string = strip_tags($row['Description']);
                            if (strlen($string) > 100) {
                                // truncate string
                                $stringCut = substr($string, 0, 150);
                                $endPoint = strrpos($stringCut, ' ');
                                // if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                echo $string . " ..." ;
                            }else{ echo $string  ;} ?></p>

                        <div class="btn btn-outline-dark py-0 m-2">
                            <?php  echo $row['State'].str_repeat('&nbsp;', 1).
                                "-".str_repeat('&nbsp;', 1). $row['City']; ?>
                        </div>
                        <br>
                        <a href="tel:+966<?php  echo $row['Number']; ?>" class="btn btn-outline-primary py-0 my-1 ">
                            <i class="bi bi-telephone font_icon1"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=966
                    <?php  echo $row['Number']; ?>
                    " class="btn btn-outline-success py-0 my-1 mx-1 ">
                            <i class="bi- bi-whatsapp font_icon1"></i>
                        </a>
                        <div  class="card-link  btn btn-outline-danger py-0 my-1">
                            <?php echo date("Y-m-d ",strtotime($row['Date'])); ?>
                        </div>
                    </div>

                </div>
            </div> <?php }?>

        </div>

    <?php   }

//    }}
//               *-*-*-*-*-*-*-*    نهاية البحث بالاسم     *-*-*-*-*-*-*-*-*-*-

endif;?>
<!--    //           *-*-*-*-*-*-*-*     نهاية شرط جلب البيانات  $_POST["box_Search"]   *-*-*-*-ظ*-*-*-*-*-*--->


<!--   *-*-*-*-*-*-*-*      نهاية البحث        *-*-*-*-*-*-*-*-*-*-   -->

<?php  echo ""?>
<!--   *-*-*-*-*-*-*-*     بداية عرض  البيانات    *-*-*-*-*-*-*-*-*-*-   -->

<?php
if ($is_display===0){
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
    $sql = "select *
            from item
            order by id DESC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<div class='row g-2 m-0 p-0 anmaHu  row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4  row-cols-xxl-6 justify-content-center'>";

    foreach($rows as $row){
        ?>
        <div class="col">
            <div class="card pb-2 shadow-sm border-0" >
                <div class="card-header fs-lg-4  fs-md-3 fs-sm-1  m-0 bg-aliceblue_HU bg-gradient  text-center">
                    <?php echo  $row['name']; ?>
                </div>
                <img class="card-img-top mg-top mt-0 rounded-0 p-3 pb-1 m-0"
                     width="300"
                     height="250"
                    <?php if ($row['Img']==''){ ?>
                        src="img/logo3.png"
                    <?php   }else{ ?>
                     src="img/<?php echo $row['Img'];} ?>"
                     alt="صورة الاعلان">

                <!--                --><?php //   if ($row['ID'] %2 == 0 ):?>

                <div  class="card-body p-0 pb-1 text-center">
                    <img class="w-100" HEIGHT="70" src="img/هinvestmen.jpg"  >
                </div>
                <!--            --><?php //    endif; ?>
                <div class="card-body p-0 pb-1 text-center ">
                    <h5 class="card-title d-inline-flex m-0">
                        <?php  if ($row['Status']==="جديد"):?>
                            <div class="btn btn-outline-success py-0 m-2 ">
                                <?php echo  'جديد'; ?>
                            </div>
                        <?php elseif($row['Status']==="مستعمل"): ?>
                            <div class="btn btn-outline-warning py-0 m-2 ">
                                <?php echo  'مستعمل'; ?>
                            </div>
                        <?php  endif;?>
                        <div class="btn btn-outline-danger py-0 m-2 mx-1 ">
                            <?php  echo $row['ID']; ?>
                        </div>
                        <form action="delete.php" method="POST">
                            <input type="number"
                                   name="id_old_F"            v
                                   value="<?php  echo $row['ID']; ?>"
                                   hidden>
                            <input type="text"
                                   name="name_old_F"
                                   value="<?php  echo $row['name']; ?>"
                                   hidden>
                            <input type="text"
                                   name="Description_old_F"
                                   value="<?php  echo $row['Description']; ?>"
                                   hidden>
                            <input type="submit"
                                   value="منتج مخالف"
                                   name="submit"
                                   alt="Submit"
                                   class="btn btn-outline-primary py-0 m-2" />
                        </form>
                    </h5>

                    <p class="card-text  bg-silver_W_HU text-dark  p-2 m-0"
                       readonly="True"
                       style="height: 5rem;" >
                        <?php
                        $string = strip_tags($row['Description']);
                        if (strlen($string) > 100) {
                            // truncate string
                            $stringCut = substr($string, 0, 148);
                            $endPoint = strrpos($stringCut, ' ');
                            // if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            echo $string . " ..." ;
                        }else{ echo $string  ;} ?></p>


                    <div class="btn btn-outline-dark py-0 m-2">
                        <?php  echo $row['State'].str_repeat('&nbsp;', 1).
                            "-".str_repeat('&nbsp;', 1). $row['City']; ?>
                    </div>
                    <br>
                    <a href="tel:+966<?php  echo $row['Number']; ?>"
                       class="btn btn-outline-primary py-0 my-1">
                        <i class="bi bi-telephone font_icon1"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=966
                    <?php  echo $row['Number']; ?>
                    " class="btn btn-outline-success py-0 my-1 mx-1">
                        <i class="bi- bi-whatsapp font_icon1"></i>
                    </a>
                    <div  class="card-link  btn btn-outline-danger py-0 my-1 ">
                        <?php echo date("Y-m-d ",strtotime($row['Date'])); ?>
                    </div>
                </div>

            </div>
        </div>
    <?php }
}
?>
<!--   *-*-*-*-*-*-*-*     نهاية عرض  البيانات    *-*-*-*-*-*-*-*-*-*-   -->


</div>
</div>




<?php include ("footer.php")?>

</body>

</html>
