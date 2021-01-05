<?php

include "Connection.php";
include "fun.php";
include "header.php";
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
        <h1 class="h1 my-5 p-3"> نموذج طلب [حذف] منتج</h1>
        <!--    start of row  -->
        <div class="row justify-content-center bg-white bg-gradient my-5 " >
            <!--    start column 1  -->
            <div class="col  border border-5 border-secondary border-top-0 border-end-0 border-bottom-0">
                <!--    start form 1  -->
                <form action="index.php" method="post" class="row g-3 p-4 justify-content-center">
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label fs-5 text-dark">رقم المنتج</label>
                        <input type="text" class="form-control form-control-lg" value="5" id="inputPassword4"  name="name_F" disabled>
                        <!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label fs-5 text-dark">أسم المنتج</label>
                        <input type="text" class="form-control form-control-lg" value="5" id="inputPassword4"  name="name_F" disabled >
                        <!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                    </div>

                    <div class="col-md-12 lh-lg">
                        <label for="Description_F" class="form-label fs-5 text-dark"> سبب طلب الحذف</label>
                        <!--                    <input type="text" class="form-control form-control-lg" id="Description_F" placeholder="أكتب وصف للمنتج لا يتعدى 200 حرف" name="Description_F"required>-->
                        <textarea class="form-control" id="Description_F" aria-label="وصف للمنتج"placeholder="أكتب سبب طلب الحذف" name="Description_F"required></textarea>
                        <!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                    </div>
                    <div class="d-grid  col-md-12 mx-auto m-5">
                        <button type="submit" class="btn btn-outline-primary btn-lg">إرسال طلب الحذف</button>
                    </div>
                </form>
                <!--    end form 1  -->
            </div>
            <!--    end  column 1  -->

            <!--   start  column 3  -->
            <div class="col  p-5">
                <div class="alert alert-danger bg-gradient">الرجاء كتابة سبب وجيه للحذف ومخنصر</div>
                <div class="alert alert-secondary">الرجاء كتابة سبب وجيه للحذف ومخنصر</div>
                <div class="alert alert-secondary">الرجاء كتابة سبب وجيه للحذف ومخنصر</div>
                </div>
        </div>
<!--        --><?php //endif; ?>
    <!--    end of row  -->
    <!--    end delete section -->


    <!--    start of block section -->
    <!--    --><?php //if (isset($_REQUEST["display"]) && $_REQUEST["display"]===1 ): ?>

    <!--    start of delete section -->
    <h1 class="h1 my-5 p-3"> نموذج طلب [حظر] منتج</h1>
    <!--    start of row  -->
    <div class="row justify-content-center bg-white bg-gradient my-5 " >
        <!--    start column 1  -->
        <div class="col  border border-5 border-secondary border-top-0 border-end-0 border-bottom-0  ">
            <!--    start form 1  -->
            <form action="index.php" method="post" class="row g-3 p-4 justify-content-center">
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label fs-5 text-dark">رقم المنتج</label>
                    <input type="text" class="form-control form-control-lg" value="5" id="inputPassword4"  name="name_F" disabled>
                    <!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label fs-5 text-dark">أسم المنتج</label>
                    <input type="text" class="form-control form-control-lg" value="5" id="inputPassword4"  name="name_F" disabled >
                    <!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>

                <div class="col-md-12 lh-lg ">
                    <label for="Description_F" class="form-label fs-5 text-dark"> سبب طلب الحذف</label>
                    <!--                    <input type="text" class="form-control form-control-lg" id="Description_F" placeholder="أكتب وصف للمنتج لا يتعدى 200 حرف" name="Description_F"required>-->
                    <textarea class="form-control" id="Description_F" aria-label="وصف للمنتج"placeholder="أكتب سبب طلب الحذف" name="Description_F"required></textarea>
                    <!--                    <span class="badge bg-danger p-1 rounded-1">الرجاء كتابة الاسم</span>-->
                </div>
                <div class="d-grid  col-md-12 mx-auto m-5">
                    <button type="submit" class="btn btn-outline-primary btn-lg">إرسال طلب الحذف</button>
                </div>
            </form>
            <!--    end form 1  -->
        </div>
        <!--    end  column 1  -->

        <!--   start  column 3  -->
        <div class="col  p-5 ">
            <div class="alert alert-danger bg-gradient">الرجاء كتابة سبب وجيه للحذف ومخنصر</div>
            <div class="alert alert-secondary">الرجاء كتابة سبب وجيه للحذف ومخنصر</div>
            <div class="alert alert-secondary">الرجاء كتابة سبب وجيه للحذف ومخنصر</div>
        </div>
    </div>
    <!--        --><?php //endif; ?>
</div>

<?php
include "footer.php";
?>
</body>
</html>
