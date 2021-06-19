<?php
 echo ' <link  rel="stylesheet"    type="text/css"   href="node_modules/bootstrap-icons/font/bootstrap-icons.css">';
 // filter all input
function test_input($data) {
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}


//  array Category   *-*-*-*-*-*-*-*-*-*-*-*-*
$arra_list_Category=array(

    "أجهزة كهربائية",    "أجهزة الكترونية",    "مستلزمات صحية",
    "مستلزمات طبية",     "مستلزمات رجالية",    "مستلزمات نسائية",
    "كتب",               "خردوات",             "مواد غذائية",
    "أثاث",              "أدوات سباكة",        "حيونات اليفه",
    "قطع غيار",

);

 $length_Category=count($arra_list_Category);


//  array State   *-*-*-*-*-*-*-*-*-*-*-*-*
$arra_list_State=array(
    "مكة المكرمة", "المدينة المنورة",  "الرياض",
    "الشرقية",     "القصيم",           "حائل",
    "تبوك",        "جازان",            "الجوف",
    "نجران",       "عسير",             "الحدود الشمالية",
);

$length_State=count($arra_list_State);


//  array Status   *-*-*-*-*-*-*-*-*-*-*-*-*
$arr_list_Status=array(
    "جديد",    "مستعمل",
);

$length_Status=count($arr_list_Status);



//  array account number   *-*-*-*-*-*-*-*-*-*-*-*-*
$arr_list_account=array(
    "1"=> "",    "مستعمل",
);

$length_account=count($arr_list_account);

//  array Classification of the violation    *-*-*-*-*-*-*-*-*-*-*-*-*
$arr_list_violation=array(
     "مخالف للشريعة الاسلامية",    "مخالف لقوانين المملكة العربية السعودية",
    "غش وخداع ",                 "طلب مبلغ مقابل المنتج",
    "اخر",
);

$length_violation=count($arr_list_violation);


//  DELETE  ITEM    *-*-*-*-*-*-*-*-*-*-*-*-*

//delete($id);
 function delete($id){

     try
     {

         include ("Connection.php");
         if (!empty($dbhost)) {   if (!empty($dbname)) {   if (!empty($dbusername)) {    if (!empty($dbpassword)) { if (!empty($options)) {
                             $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
                         }        }    }        }         }
         $sql ="DELETE FROM  item  WHERE ID=:ITID";
         $stmt = $conn->prepare($sql);
         $stmt->execute(array('ITID'=>$id));


      }catch (PDOException $error)
     {
         $messgage=$error->getMessage() ;
         return $messgage;
     }

}


//  DELETE  ITEM    *-*-*-*-*-*-*-*-*-*-*-*-*

//delete($id);
function delete_from_table_delet($id){

    try
    {

        include ("Connection.php");
        if (!empty($dbhost)) { if (!empty($dbname)) { if (!empty($dbusername)) {  if (!empty($dbpassword)) {  if (!empty($options)) {
                            $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
                        }                    }                }            }        }
        $sql ="DELETE FROM  delete_item  WHERE id_d=:ITID";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array('ITID'=>$id));


    }catch (PDOException $error)
    {
        $messgage=$error->getMessage() ;
        return $messgage;
    }

}



//delete($id);
/**
 * @param $id
 * @return string
 */


function serachByName(){
//    SELECT * FROM item WHERE name like '%طابعة%'
//    select * from delete_item  order by id DESC
    try
    {
        include("Connection.php");
            if (!empty($dbhost)){
            if (!empty($dbname)){
            if (!empty($dbusername)){
            if (!empty($dbpassword)){
            if (!empty($options)){
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword, $options);  }
            }        }        }        }

        $sql = "select * from delete_item  order by id DESC ";
        $stmt = $conn->prepare($sql); $stmt->execute();        $Rows= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count_D=count($Rows);        return $count_D;
    } catch (PDOException $error) {     $messgage = $error->getMessage();    return $messgage;    }

}

function insert_Communication ($id){

    try
    {
        include ("Connection.php");
        if (!empty($dbhost)) {if (!empty($dbname)) { if (!empty($dbusername)) { if (!empty($dbpassword)) { if (!empty($options)) {
                            $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
                        }                    }                }            }        }
        $sql ="INSERT INTO item (ID,name,Description,Status,Category,State,City,Number) 
                      VALUES(:itID,:itname,:itDesc,:itStatus,:itCategory,:itState,:itCity,:itNumber)";
        $stmt = $conn->prepare($sql);
        if (!empty($name)) {  if (!empty($Description)) { if (!empty($Status)) {  if (!empty($Category)) {if (!empty($State)) {
                            if (!empty($City)) {
                                if (!empty($Number)) {
                                    $stmt->execute($R=array(
                                        'itID'       => null,     'itname'     => $name,      'itDesc'     => $Description,
                                        'itStatus'   => $Status,  'itCategory' => $Category,  'itState'    => $State,
                                        'itCity'     => $City,    'itNumber'   => $Number,
                                    ));
                                }             }             }           }     }            }        }


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
        if (!empty($dbhost)) {            if (!empty($dbname)) {                if (!empty($dbusername)) {
                    if (!empty($dbpassword)) {                        if (!empty($options)) {
                            $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
                        }
                    }
                }
            }
        }
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

        if (!empty($dbhost)) {            if (!empty($dbname)) {                if (!empty($dbusername)) {
                    if (!empty($dbpassword)) {                        if (!empty($options)) {
                            $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);
                        }
                    }
                }
            }
        }
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
        $stmt = $conn->prepare($sql);    $stmt->execute();   $total_visitor=count($stmt->fetchAll(PDO::FETCH_ASSOC));


    }catch (PDOException $error)    {       $messgage=$error->getMessage() ;        return $messgage;    }
 return $total_visitor;
}

function table_item_delete()
{
    try {
        include("Connection.php");
        if (!empty($dbhost)) {            if (!empty($dbname)) {                if (!empty($dbusername)) {
                    if (!empty($dbpassword)) {                        if (!empty($options)) {
                            $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword, $options);
                        }                    }                }            }        }
        $sql = "select *
            from delete_item
            order by id DESC ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $Rows= $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ( $Rows as $item) {
            $id_Dlelete=$item['id'];
            echo "                        
                <tr>
                <th scope='row'>".$item['id']."</th>      <td>".$item['name']."</td>
                <td>".$item['Description_old']."</td>     <td>".$item['Description_new']."</td>
                <td>".$item['Classification']."</td>
                
                <td><a href='control.php?Delete_id=".$item['id_d']." '> <i class='bi bi-trash text-danger m-5 fs-4 '></i></a></td>
                </tr>
            ";
        }
    } catch (PDOException $error) {     $messgage = $error->getMessage();        return $messgage;    }
}



//        count_delete()           *-*-*-*-*-*-*-*--*-*-*-*-*-*-*--*-*
function count_delete()
{
    try {
        include("Connection.php");
        if (!empty($dbhost)) {            if (!empty($dbname)) {                if (!empty($dbusername)) {
            if (!empty($dbpassword)) {                        if (!empty($options)) {
                            $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword, $options);
                        }
                    }
                }
            }
        }
        $sql = "select * from delete_item  order by id DESC ";
        $stmt = $conn->prepare($sql);        $stmt->execute();        $Rows= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count_D=count($Rows);        return $count_D;
    } catch (PDOException $error) {     $messgage = $error->getMessage();    return $messgage;    }
}


// مصفوفة حسابات البنوك

//$marks = array(
//    "بنك الأهلي" => array (
//        "1" => 33447858000103,
//        "2" => SA7610000033447858000103,
//    ),
//
//    "بنك الجزيرة" => array (
//        "1" => 011433507001,
//        "2" => SA4160000000011433507001,
//    ),
//
//    "بنك الرياض" => array (
//        "1" => 1010737199940,
//        "2" => SA7620000001010737199940
//    ),
//
//    "بنك الانماء" => array (
//        "1" => 68202658973000,
//        "2" => SA8805000068202658973000
//    ),
//
//    "بنك البلاد" => array (
//        "1" => 726117455580009,
//        "2" => SA7415000726117455580009
//    ),
//
//    "بنك السعودي للاستثمار" => array (
//        "1" => 5555754819001,
//        "2" => SA7565000005555754819001
//    ),
//
//    "بنك الفرنسي" => array (
//        "1" => 0072500167,
//        "2" => SA82550000000J0072500167
//    ),
//
//    "البنك العربي" => array (
//        "1" => 108068777060017,
//        "2" => SA9630000108068777060017
//    )
//);


?>







