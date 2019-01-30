
<?php

if(isset($_POST['name']) && isEmail($_POST['email']))

{

try{
    $database = new PDO('mysql:host=localhost;dbname=admministration;charset=utf8','root','');
    $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
    die('ERROR: '.$e->getMessage());
}

$sql = $database->prepare('INSERT INTO people(Name, Email) VALUES (?,?)');
$sql->execute(array($_POST['name'],$_POST['email']));
echo 'ligne inserer avec succes';
header('Location: index.php');    
    
}

function isEmail($var)
{
    return filter_var(FILTER_VALIDATE_EMAIL);
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
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css"/>
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
            <div class="divider"></div>
            <div class="heading">                
            </div>               
           <div class="row">
               <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" style="background-color: #fff;
    padding: 50px;
    border-radius: 10px;" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
                        <h2 style=color:#24a2b7;margin-right:40px;>Add Client</h2>
                        <div class="row">
                            <div class="col-md-7 col-lg-offset-3 col-12">
                                Email:<input id="email" type="email" name="email" required class="form-control" placeholder="Enter Email" >
                                <p class="comments"></p>
                            </div>
                            <div class="col-md-7 col-lg-offset-3 col-12">
                                Name:<input id="name" type="text" name="name" required class="form-control" placeholder="Enter Name" >                             
                            </div>
                            <div class="col-md-12" style=padding:5px;>
                                <input id="submit" type="submit" class="btn btn-primary" value="Add client">               
                            </div>
                        </div>
                    </form>
                </div>
           </div>
        </div>
</body>
</html>

