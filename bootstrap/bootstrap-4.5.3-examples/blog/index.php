<?php

/*config database*/

define('DBHOST','localhost');
define('DBUSER','kimia');
define('DBPASS','12345');
define('DBNAME','phpblog');
/* database */
class database
{
    public $host = DBHOST;
    public $user = DBUSER;
    public $pass = DBPASS;
    public $dbname = DBNAME;

    public $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {

        $this->link = new mysqli($this->host , $this->user , $this->pass , $this->dbname);
    }

    public function select($query)
    {
        $result = $this->link->query($query);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }

    }

    public function insert($query)
    {
        $insert = $this->link->query($query);

        if ($insert) {
            echo "inserted successfully";
        } else {
            echo "inserted didnt successfully";
        }

    }

    public function update($query)
    {
        $update = $this->link->query($query);

        if ($update) {
            echo "updated successfully";
        } else {
            echo "updated didnt successfully";
        }

    }

    public function delete($query)
    {
        $delete = $this->link->query($query);

        if ($delete) {
            echo "deleted successfully";
        } else {
            echo "deleted didnt successfully";
        }

    }
}


$db = new database();
 $query = "SELECT * FROM posts order by id DESC ";

 $posts = $db->select($query);

 // link to categoroy

$query2 = "SELECT * FROM categories ";

$cats = $db->select($query2);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Blog Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-static/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
    <link href="navbar-top.css" rel="stylesheet">
</head>
<body>





<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">#">
                <a class="nav-link" href="#"> </a>
            </li>#">
            <li class="nav-item">
                <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">All Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
        </ul>

    </div>
</nav>

<div class="container">




    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">


                <h1 class="pb-4 mb-4 font-italic border-bottom">
                    PHP Tutorial Blog
                </h1>
                <?php while ($row = $posts->fetch_array()) :?>
                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo  $row['title'];?></h2>
                    <p class="blog-post-meta">ON <?php echo $row['date'];?> BY <a href="#"><?php echo  $row['author'];?></a></p>
                    <img style="width: 200px ; height: 200px; float: left;margin-right: 20px; margin-bottom: 10px" src='images/<?php echo  $row['image'];?> '>
                    <p style="text-align: justify"><?php echo  substr($row['content'],0,200);?></p>
                    <a href="singlepage.php?id<?php echo $row['id'];?>">read more</a>
                    <?php endwhile;?>

                </div><!-- /.blog-post -->
            </div>



            <aside class="col-md-4 blog-sidebar" style="margin-top: 10%">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em>
                        mollis euismod. Cras mattis consectetur purus sit amet fermentum.
                        Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>

                <div class="p-4">
                    <h4 class="font-italic">Categories</h4>
                    <ol class="list-unstyled mb-0">
                        <?php while ($row = $cats->fetch_array()) : ?>
                        <li><a href="category.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
                        <?php endwhile; ?>

                    </ol>
                </div>

                <div class="p-4">
                    <h4 class="font-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->



        </div><!-- /.row -->
</main><!-- /.container -->


    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
</body>
</html>
