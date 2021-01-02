<?php

 // filter all input
function test_input($data) {
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}


//  array Category   *-*-*-*-*-*-*-*-*-*-*-*-*
$arra_list_Category=array(

    "أجهزة كهربائية",
    "أجهزة الكترونية",
    "مستلزمات صحية",
    "مستلزمات طبية",
    "مستلزمات نسائية",
    "مستلزمات رجالية",
    "كتب",
    "خردوات",
    "مواد غذائية",
    "أثاث",
    "أدوات سباكة",
);

 $length_Category=count($arra_list_Category);


//  array State   *-*-*-*-*-*-*-*-*-*-*-*-*
$arra_list_State=array(
    "مكة المكرمة",
    "المدينة المنورة",
    "الرياض",
    "الشرقية",
    "القصيم",
    "حائل",
    "تبوك",
    "جازان",
    "الجوف",
    "نجران",
    "عسير",
    "الحدود الشمالية",
);

$length_State=count($arra_list_State);


//  array Status   *-*-*-*-*-*-*-*-*-*-*-*-*
$arr_list_Status=array(
    "جديد",
    "مستعمل",
);

$length_Status=count($arr_list_Status);



//  array account number   *-*-*-*-*-*-*-*-*-*-*-*-*
$arr_list_account=array(
    "1"=> "",
    "مستعمل",
);

$length_account=count($arr_list_account);


//  DELETE  ITEM    *-*-*-*-*-*-*-*-*-*-*-*-*

//delete($id);
 function delete ($id){

     try
     {

         include ("Connection.php");
         $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
         $sql ="DELETE FROM  item  WHERE ID=:ITID";
         $stmt = $conn->prepare($sql);
         $stmt->execute(array('ITID'=>$id));


      }catch (PDOException $error)
     {
         $messgage=$error->getMessage() ;
         return $messgage;
     }

}



//delete($id);
function insert_Communication ($id){

    try
    {

        include ("Connection.php");
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


    }catch (PDOException $error)
    {
        $messgage=$error->getMessage() ;
        return $messgage;
    }

}



//NumberVisitors();
function Number_item (){

    try
    {

        include ("Connection.php");
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
        $sql = "select *
            from item
            order by id DESC ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $Rows_item = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $COUNTVisitors=count($Rows_item);

    }catch (PDOException $error)
    {
        $messgage=$error->getMessage() ;
        return $messgage;
    }
 return $COUNTVisitors;
}

?>







