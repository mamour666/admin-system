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
<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                     </button>
                </div>
                <div class="collapse navbar-collapse" id="mynavbar"> 
                     <ul class="nav navbar-nav">
                        <li><a href="#">Navbar</a></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="create.php">Create person</a></li>
                     </ul>
                </div>
            </div>

        </nav>
    <body style="background-color:#24a2b7;">
        <div class="container admin">
        <div class="row">
            <h1><strong>All People</strong><a></a></h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try{
                        $database = new PDO('mysql:host=localhost;dbname=admministration;charset=utf8','root','');
                        $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    }
                    catch(Exception $e){
                        die('ERROR: '.$e->getMessage());
                    }
                    $statement = $database->query('SELECT people.id,people.Name,people.Email FROM people ORDER BY people.id');
                    while($people = $statement->fetch())
                    {
                        echo '<tr>';
                        echo'<td>' . $people['id'] . '</td>';
                        echo '<td>' . $people['Name'] . '</td>';
                        echo '<td>' . $people['Email'] . '</td>';
                        echo '<td width=300>';
                       
                        echo  '<a class="btn btn-primary" href="update.php?id=' . $people['id'] . '"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                        echo " ";
                        echo  '<a class="btn btn-danger" href="delete.php?id=' . $people['id'] . '"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                        echo '</td>';
                        echo '</tr>';                       
                    }                   
                    ?>
                    
                </tbody>
            </table>
        </div>   
            
        </div>    
        
    </body>
    
</html>