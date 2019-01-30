<?php 
try{
     $database = new PDO('mysql:host=localhost;dbname=admministration;charset=utf8','root','');
     $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e){
     die('ERROR: '.$e->getMessage());
    }
     
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
}


if(!empty($_POST))
{

    $id = $_POST['id'];
    $statement = $database->prepare("DELETE FROM people WHERE id = ?");
    $statement->execute(array($id));
    header("Location: index.php");
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
    <link rel="icon" type="image/png" href="image/favicon.png">
</head>
    <body>
        <h1></h1>
        <div class="container admin">
        <div class="row">
               <h1><strong>Supprimer une personne  </strong></h1>
                <br>
                <form class="form" role="form" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <p class="alert alert-warning">Etes-vous sur de vouloir supprimer</p>    
                <br>
                <div class="form-actions">
                    <button type="submit" class="btn btn-warning">OUI</button>
                    <a class="btn btn-default" href="index.php">Non</a>
                </div>
                </form>
        </div>   
        </div>         
    </body>   
</html>
