<?php

?>

<?php  include ("header.php")?>


<div class="container w-100">
    <!--  *-*-*-*-*-*-*-* بداية البحث   *-*-*-*-*-*-*-*-*-*-   -->
    <div class="row justify-content-center  bg-gradient  my-5  rounded-3 anmaHu" >
        <!--    start column 1  -->
        <div class="col p-4 justify-content-center ">
            <!--    start form 1  -->
            <form action="display.php" method="POST" class="row g-3 justify-content-center">

                <div class="col-md-8">
                    <label for="search_State" class="form-label  fs-5">  المنطقة:</label>
                    <select id="search_State" class="form-select  form-select-lg" name="search_State" >
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
                <div class="d-grid  col-md-8 mx-auto mx-5">
                    <button type="submit" name="box_Search" class="btn btn-outline-light btn-lg">إبحث</button>
                </div>
            </form>
        </div>
        <!--    start column 2  -->

    </div>
    <!--   *-*-*-*-*-*-*-* نهاية  مربع البحث   *-*-*-*-*-*-*-*-*-*-   -->


    <!--   *-*-*-*-*-*-*-* بداية عرض الحسابات   *-*-*-*-*-*-*-*-*-*-   -->
    <div class="row justify-content-center  text-center bg-gradient  my-5  rounded-3 anmaHu">
        <div class="col-md-7 col-sm-8  pt-5 ">
            <p class="fs-lg-2 fs-md-1 fs-sm-3 border border-light p-2 rounded-3">البنك الأهلي التجاري</p>

        </div>
        <div class="col-md-7 col-sm-8 p-2 ">
            <p class="fs-lg-2 fs-md-1 fs-sm-3 border border-light p-2 rounded-3">33447858000103</p>
        </div>
        <div class=" col-md-7 col-sm-8 p-2">

            <div class="fs-lg-2 fs-md-1 fs-sm-3 border border-light p-2  rounded-3">
                <span class="badge rounded-pill bg-warning">الايبان</span>
                SA7610000033447858000103
            </div>
        </div>
    </div>





</div>


<?php include ("footer.php");?>