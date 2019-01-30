<?php

   try{
     $database = new PDO('mysql:host=localhost;dbname=admministration;charset=utf8','root','');
     $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e){
     die('ERROR: '.$e->getMessage());
    }

    if(!empty($_GET['id']) ) 
    {
        $id = $_GET['id'];
        $statement = $database->prepare("SELECT * FROM people where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $name = $item['Name'];
        $email = $item['Email'];
 
    

    if(!empty($_POST) && isEmail($_POST['email'])) 
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $statement = $database->prepare("UPDATE people set Name = ?, Email = ? WHERE id = ?");
        $statement->execute(array($name,$email,$id));
        header("Location: index.php");
    }
        
}


function isEmail($var)
{
   return filter_var($var,FILTER_VALIDATE_EMAIL);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">      
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="image/2.1%20favicon.png.png">
</head>
<body style="
   background-color: #24a2b7;
   text-align: center;
   margin-top: 200px;
">
    <div class="container">            
           <div class="row">
               <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" style="background-color: #fff;
    padding: 50px;
    border-radius: 10px;" method="post" action="#" role="form">
                        <h2 style=color:#24a2b7;margin-right:40px;>Update Client</h2>
                        <div class="row">
                            <div class="col-md-7 col-lg-offset-3 col-12">
                                Email:<input id="email" type="email" name="email" required class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" >
                                <p class="comments"></p>
                            </div>
                            <div class="col-md-7 col-lg-offset-3 col-12">
                                Name:<input id="name" type="text" name="name" required class="form-control" placeholder="Enter Name" value="<?php echo $name; ?>" >                             
                            </div>
                            <div class="col-md-12" style="padding:5px;">
                                <input id="submit" type="submit" class="btn btn-primary" value="Update client">                 
                            </div>
                        </div>
                    </form>
                </div>
           </div>
        </div>
</body>
</html>