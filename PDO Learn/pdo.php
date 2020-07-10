<?php 

// ------------ 2
    // check the pdo drivers in my localhost ####
    // print_r(PDO::getAvailableDrivers());

// ------------ 3
    // the connection of the pdo with the database    
    /* 
    try {        
        $pdo = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "");
        echo "Yes you are connecting with the database";
    } catch(PDOException $e) {
        // echo "Error to connect with your database";      // this is my written warning 
        die($e->getMessage());
    }
    */

// ------------ 4

    // try {
    //     $pdo = new PDO("mysql:host=localhost;dbname=pdotest", "root" , "");
    // echo "Yes you are connecting with the database";

    // for inserting        (with sqli query)
    /*
    $stmt = $pdo->query("INSERT INTO users(username,password,permission) VALUES('Ahmed' , '123' , '2')"); 
    echo "<pre>";
        var_dump($stmt);
    echo "</pre>";
    */

    // for Updating        (with sqli query)
    // $stmt = $pdo->query("UPDATE users SET username = 'Ahmed Abdo' WHERE username = 'Ahmed' ");

    // for Deletion        (with sqli query)

    /*
    $stmt = $pdo->query("DELETE FROM users WHERE username = 'Ahmed Abdo' ");
    } catch(PDOException $e) {
        die($e->getMessage);
    }
    */      

// ------------ 5
    /*  
    try {
    $pdo = new PDO("mysql:host=localhost;dbname=pdotest", "root" , "",
    [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);       
    // $stmt = $pdo->query("DELETE FROM users WHERE username = 'Ahmed Abdo' ");
    // $stmt = $pdo->query("SELECT * FROM users");

    // LIKE
    // $stmt = $pdo->query("SELECT * FROM users WHERE username LIKE '%a'");
    // $stmt = $pdo->query("SELECT * FROM users WHERE username LIKE '%'");
    // $stmt = $pdo->query("SELECT * FROM users WHERE username LIKE '%_d'");
    // $stmt = $pdo->query("SELECT * FROM users WHERE username LIKE 'm%'");

    // BETWEEN
    // $stmt = $pdo->query("SELECT * FROM users WHERE salary BETWEEN 1000 AND 2000");

    // ORDER BY 
    // $stmt = $pdo->query("SELECT * FROM users ORDER BY salary DESC");
    // $stmt = $pdo->query("SELECT * FROM users ORDER BY salary ASC");

    // IN 
    // $stmt = $pdo->query("SELECT * FROM users WHERE username IN ('Youmna' , 'Ali')");
    // $stmt = $pdo->query("SELECT * FROM users WHERE username NOT IN ('Youmna' , 'Ali')");

    foreach($stmt as $user) {
        echo "<pre>";
            print_r($user);
        echo "</pre>";
    }

    
    } catch(PDOException $e) {
        die($e->getMessage);
    }
    */
   
// ------------ 6

    // the difference between (exec - query - execute)
    /* 
    try {
        $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "");
    */
        /*
        // exec         // this return the count of columns which affected from any upodate or delete on sql statment
        $stmt = $con->exec("UPDATE users SET username='Ali Ahmed' WHERE username='Ali'");
        print_r($stmt);
        */

        /*
        // query    // return the result of the sql statment as an object
        $stmt = $con->query("UPDATE users SET username='Ali' WHERE username='Ali Ahmed'");
        echo "<pre>";
            print_r($stmt);
        echo "</pre>";
        */

        /*
        // execute    // it works in 2 main parts the first to prepare and the second to execute 
        $stmt = $con->prepare("UPDATE users SET username='Ali Ahmed' WHERE username='Ali'");
        $result = $stmt->execute();
        echo "<pre>";
            print_r($result);
        echo "</pre>";
        */
    /*
    } catch(PDOException $e) {
        die($e->getMessage());
    }
    */

// ------------ 7

    /*
    try {
        $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "",[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        
        $stmt = $con->prepare("SELECT * FROM users");
        $stmt->execute();
    */
        // print_r($stmt);

        /*
        $rows = $stmt->fetch();     // the first item in the database 
        echo "<pre>"; 
                print_r($rows);
        echo "</pre>";
        */

        /*
        $rows = $stmt->fetchAll();     // the first item in the database 
        echo "<pre>"; 
            print_r($rows);
        echo "</pre>";
        */
    /*
    } catch(PDOException $e) {
        die($e->getMessage());
    }
    */

// ------------ 10 

    /*
    $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "",[
        // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $stmt = $con->prepare("SELECT username,users.* FROM users");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);

    echo "<pre>";
    print_r($rows);
    echo "</pre>";
    */

// ------------ 11      // after the oop


// ------------ 12

/*$con = new PDO("mysql:host=localhost;dbname=pdotest", 'root' , '');
$stmt = $con->prepare("SELECT * FROM users WHERE users.username = :namePerson");
$stmt->execute([
    ":namePerson" => "Mohamed"
]);

// FETCH_NAMED is useful when the data in the database in more than one and want to get them
$stmt_items = $stmt->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_NAMED);

echo "<pre>";
print_r($stmt_items);
echo "</pre>";*/

// ------------ 13 

// the sql injuection
/*
try {
    $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "");
    $con->exec("SET name utf8");

} catch(PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST["submit"]) && $_POST["submit"] === "Login") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $con->query("SELECT * FROM users WHERE username = '$username' && password='$password'");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>"; 
    print_r($rows);
    echo "<br></pre>";

} else {
    echo "No";
}

?>

<!DOCTYPE html>
    <body>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            Username : <input type="text" name="username"></br>
            Password : <input type="password" name="password"></br>
            <input type="submit" value="Login" name="submit">
        </form>
    </body>
</html>
*/

// ------------ 14

/*try {
    $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "" , [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $con->exec("SET name utf8");

} catch(PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST["submit"]) && $_POST["submit"] === "Login") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $con->prepare("SELECT * FROM users WHERE username =:username && password=:password");
    
    $stmt->execute([
        ':username' => $username,
        ':password' => $password,
    ]);
     
    $rows = $stmt->fetchAll();

    echo "<pre>"; 
    print_r($rows);
    echo "<br></pre>";

} else {
    echo "No";
}

?>

<!DOCTYPE html>
    <body>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            Username : <input type="text" name="username"></br>
            Password : <input type="password" name="password"></br>
            <input type="submit" value="Login" name="submit">
        </form>
    </body>
</html>*/

// ------------ 15

/*try {
    $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "" , [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $con->exec("SET name utf8");

} catch(PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST["submit"]) && $_POST["submit"] === "Login") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $stmt = $con->prepare("SELECT * FROM users WHERE username =:username && password=:password");
    // bindParam
    // $stmt->bindParam(":username" , $username);
    // $stmt->bindParam(":password" , $password);

    // bindValue
    // $stmt->bindValue(":username" , $username);
    // $stmt->bindValue(":password" , $password);

    // ----------------------
    // $stmt = $con->prepare("SELECT * FROM users WHERE username = ? && password= ?");
    // bindParam
    // $stmt->bindParam(1 , $username);
    // $stmt->bindParam(2 , $password);

    // bindValue
    // $stmt->bindValue(1 , $username);
    // $stmt->bindValue(2 , $password);

    $stmt->execute();

     
    $rows = $stmt->fetchAll();

    echo "<pre>"; 
    print_r($rows);
    echo "<br></pre>";

} else {
    echo "No";
}

?>

<!DOCTYPE html>
    <body>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            Username : <input type="text" name="username"></br>
            Password : <input type="password" name="password"></br>
            <input type="submit" value="Login" name="submit">
        </form>
    </body>
</html>*/

// ------------ 16

// sql injucetion with prepare statment 
/*try {
    $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "" , [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

    $con->query("SET NAMES gbk");       // this help the sql injucetion 
    $con->query("SET SQL_MODE 'NO_BACKSLASH_ESCAPES'");
    echo "Yes match";

} catch(PDOException $e) {
    die($e->getMessage());
    echo "No Matches data";
}

// $userName = "Youmna";
$userName = "\xbf\x27 OR 1=1;--";
$stmt = $con->prepare("SELECT * FROM users WHERE username=:nameUser");
$stmt->execute([
    ":nameUser" => $userName
]);

echo "<pre>";
print_r($stmt->fetchAll());
echo "</pre>";*/

// ------------ 17

// bindColumn
/*
try {
    $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "" , [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

    $con->query("SET NAMES gbk");       // this help the sql injucetion 
    $con->query("SET SQL_MODE 'NO_BACKSLASH_ESCAPES'");
    echo "Yes match";

} catch(PDOException $e) {
    die($e->getMessage());
    echo "No Matches data";
}

$stmt = $con->prepare("SELECT * FROM users");
$stmt->execute();
$stmt->bindColumn(2 , $usernameColumn);
$stmt->bindColumn(3 , $passwordColumn);

// this is for all the data of all records in the database
// while($stmt->fetch(PDO::FETCH_BOUND)) {
//     echo "</br>Your username is : " . $usernameColumn . " and Your password is : " . $passwordColumn;
// }

// this is for the data of the last record in the database
while($stmt->fetchAll(PDO::FETCH_BOUND)) {
    echo "</br>Your username is : " . $usernameColumn . " and Your password is : " . $passwordColumn;
}
*/

// ------------ 18 

// rowCount && columnCount
/*try {
    $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "" , [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch(PDOException $e) {
    die($e->getMessage());
}

$userName = "Youmna";
$stmt = $con->prepare("SELECT * FROM users WHERE username=:username");
$stmt->execute([
    "username" => $userName
]);

echo $stmt->rowCount() . "</br>";
echo $stmt->columnCount();

$rows = $stmt->fetchAll();
if($stmt->rowCount()) {
    foreach($rows as $row){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
} else {
    echo "No user Found";
}*/

// ------------ 19

// lastInsertId

// ------------ 20

// Errors handeling

// ------------ 21
// transaction

/*try {
    $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "" , [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch(PDOException $e) {
    die($e->getMessage());
}

try {
    $con->beginTransaction();
    $stmt = $con->prepare("SELECT * FROM users");
    $stmt->execute();
    $rows = $stmt->fetchAll();

    foreach($rows as $row){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
    // var_dump($con->inTransaction());
    
    $stmt = $con->prepare("INSERT INTO users (username) VALUES(:myName)");
    $stmt->execute([':myName' => "Ali"]);
    
    $con->commit();
} catch(PDOException $e) {
    $con->rollBack();
    die($e->getMessage());
}*/

// ------------ 22
    // this is a large practical

// ------------ 23
    // setAttribute()
    // getAttribute()
/*
try{

    $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "" , [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

    // print_r($con->getAttribute(PDO::ATTR_DEFAULT_FETCH_MODE));
    $con->setAttribute(PDO::ATTR_EMULATE_PREPARES , true);
    print_r($con->getAttribute(PDO::ATTR_EMULATE_PREPARES));

} catch(PDOException $e){
    die($e->getMessage());
}*/


// ------------ 24

// close the connection of the pdo database

/*
try{

    $con = new PDO("mysql:host=localhost;dbname=pdotest" , "root" , "" , [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

    // $con = null;         // this is the code to finish the pdo statments 

    $stmt = $con->prepare("SELECT * FROM users");
    $stmt->execute();
    foreach($stmt->fetchAll() as $row){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }


} catch(PDOException $e){
    die($e->getMessage());
}*/

// ------------ 25
// the beginning of the practical videos on pdo