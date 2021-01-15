<?php
include ("header.php");

if (!empty($dbhost)) {
    if (!empty($dbname)) {
        if (!empty($dbusername)) {
            if (!empty($dbpassword)) {
                if (!empty($options)) {
                    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
                }
            }
        }
    }
}
$sql = "select *
            from bank_accounts
            order by id ASC ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>    <link rel="shortcut icon" type="image/png" href="img/logo3.png" />

    </head>
    <body>



<div class="container">
    <!--  *-*-*-*-*-*-*-* بداية البحث   *-*-*-*-*-*-*-*-*-*-   -->
    <div class="row justify-content-center text-white  bg-gradient  m-2 p-2  my-5 rounded-3 anmaHu shadow-lg" >
        <!--    start column 1  -->
        <div class="col p-4 justify-content-center ">
            <!--    start form 1  -->
            <form action="donation.php" method="POST" class="row g-3 justify-content-center ">

                <div class="col-md-8">
                    <label for="search_State" class="form-label  fs-5">  البنك:</label>
                    <select id="search_State" class="form-select  form-select-lg" name="select_bank" >
                        <option selected value="">-- أختر البنك --</option>
                        <?php
                        foreach ($rows as $row) {
                            echo " <option value='".$row['id']."'> ".$row['name'] ."</option>";
                        }
                        ?>
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
    <?php
    if (isset($_POST['select_bank'])){

         if (empty($_POST['select_bank'])){
             $DescriptionErr='الرجاء كتابة المدينة';  $_POST['select_bank']='';
         }
         if(filter_has_var(INPUT_POST,'select_bank')){
             $AccountNum=test_input(filter_var($_POST['select_bank'],FILTER_SANITIZE_NUMBER_INT));
         }

        $sql = "SELECT *
            FROM bank_accounts
            WHERE  id=:idnum";
        $stmt = $conn->prepare($sql);
        $select=array(
            'idnum'   => $AccountNum,
                    );
        $stmt->execute($select);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $coutn=count($rows);
        foreach ($rows as $item) {


        if ($coutn>0) {
?>
        <div class="row justify-content-center text-white text-center bg-gradient shadow-lg m-2  my-5 p-2  rounded-3 anmaHu">
            <div class="col-md-7 col-sm-8 py    -2">
                <img class="p-0 shadow rounded-3" width="200" height="100" src="img/<?php echo $item['id'];?>.png" alt="">
            </div>
            <div class="col-md-7 col-sm-8 p-2">
                <p class="fs-lg-2 fs-md-1 fs-sm-3 border border-light py-2 rounded-3"><?php if (isset($item)) {
                        echo  $item['name'];
                    } ?></p>
            </div>
            <div class="col-md-7 col-sm-8 p-2">
                <p class="fs-lg-2 fs-md-1 fs-sm-3  border border-light py-2 rounded-3"><?php if (isset($item)) {
                        echo  $item['number'];
                    } ?></p>
            </div>
            <div class="col-md-7 col-sm-8 p-2 ">
                    <p class="fs-lg-2 fs-md-1 fs-sm-3 border border-light py-2 rounded-3">
                    <span class="badge rounded-circle bg-white text-dark shadow-sm fs-lg-4 fs-md-3 fs-sm-1">الايبان</span> <?php echo $item['IBAN']; ?></p>
            </div>
        </div>

    <?php }}} ?>




</div>

<?php include ("footer.php"); ?>