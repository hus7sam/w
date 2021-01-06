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

//  array Classification of the violation    *-*-*-*-*-*-*-*-*-*-*-*-*
$arr_list_violation=array(
     "مخالف للشريعة الاسلامية",
    "مخالف لقوانين المملكة العربية السعودية",
    "غش وخداع ",
    "طلب مبلغ مقابل المنتج",
    "اخر",
);

$length_violation=count($arr_list_violation);


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
function counts_Item_Fun(){

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
        $counts_Item=count($Rows_item);

    }catch (PDOException $error)
    {
        $messgage=$error->getMessage() ;
        return $messgage;
    }
 return $counts_Item;



}

//NumberVisitors();
function counts_visitors_Fun(){

    try
    {

        include ("Connection.php");

        $visitor_ip = $_SERVER["REMOTE_ADDR"];

        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
        $sql = "SELECT *
            from countsusers WHERE ip_address=:ip_address";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue("ip_address",$visitor_ip);
        $stmt->execute();
        $total_visitor=count($stmt->fetchAll(PDO::FETCH_ASSOC));

        if ($total_visitor==0) {

            $sql = "INSERT INTO countsusers (ip_address) VALUES(:count)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array('count' => $visitor_ip,));
        }

        $sql = "SELECT *
            from countsusers ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $total_visitor=count($stmt->fetchAll(PDO::FETCH_ASSOC));


    }catch (PDOException $error)
    {
        $messgage=$error->getMessage() ;
        return $messgage;
    }
 return $total_visitor;
}

function table_item_delete()
{
    try {
        include("Connection.php");
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword, $options);
        $sql = "select *
            from delete_item
            order by id DESC ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $Rows= $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ( $Rows as $item) {
            echo "                        
                <tr>
                <th scope='row'>".$item['id']."</th>
                <td>".$item['name']."</td>
                <td>".$item['Description_old']."</td>
                <td>".$item['Description_new']."</td>
                <td>".$item['Classification']."</td>
                <td>".$item['id_d']."</td>
            </tr>
            ";
        }
    } catch (PDOException $error) {
        $messgage = $error->getMessage();
        return $messgage;
    }
}

//        count_delete()           *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
function count_delete()
{
    try {
        include("Connection.php");
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword, $options);
        $sql = "select *
            from delete_item
            order by id DESC ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $Rows= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count_D=count($Rows);
        return $count_D;
    } catch (PDOException $error) {
        $messgage = $error->getMessage();
        return $messgage;
    }
}



?>







