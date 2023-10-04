<?php
include 'database.php';
$text = new Database();
$id = $_GET['id'];
$register = $text->display1('register', 'id=' . $id);
if (isset($_POST['add'])) {
    $heading = $_POST['heading'];
    $content = ($_POST['content']);
    $abc = "/" . $content . "/";
    echo $abc;
    $text->insert('data', ['acount_id' => $id, 'heading' => $heading, 'content' => $abc]);
}
if (isset($_GET['delete_id'])) {
    $id = $_GET['id'];
    $delete_id = $_GET['delete_id'];
    $text->delete('data', 'id=' . $delete_id);
    // header('location:http://localhost/googlekeep_php/text_keep/Text_Keep.php ?id='.$id);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="text.css">
    <title>Text Keep</title>
</head>

<body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">Text Keep</a>
        <?php
        if (isset($_GET['id'])) {
            foreach ($register as $row) {
        ?>
                <a class="navbar-brand" style="background: #E3F2FD" href="../login.php"><?php echo $row['name'] ?></a>
        <?php
            }
        }
        ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav d-flex p-2">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="search-wrapper">
        <div class="input-holder">
            <input type="text" class="search-input" placeholder="Type to search" />
            <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
        </div>
        <span class="close" onclick="searchToggle(this, event);"></span>
    </div>
    <div class="textspace">
        <form action="" method="post">
            <div class="input-group mb-3">
                <input name="heading" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="HEADING">
            </div>
            <div class="input-group mb-3">
                <textarea name="content" id="" cols="100" rows="5" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></textarea>
            </div>
            <div style="
            color: white;
            "><h1>OR</h1></div>
            <div><label for="myfile">Select a file:</label>
<input type="file" id="myfile" name="myfile"></div>
            <button name="add">ADD</button>
        </form>
    </div>



    <div class="abc" style="
    display: flex;
    flex-direction: column;
    gap: 2rem;
">
        <?php
        $result = $text->display1('data', 'acount_id=' . $id);
        foreach ($result as $row) {
            $current_id = $row['id'];
            $acount_id = $row['acount_id'];
            echo $current_id;
        ?>
            <div class="content" style="
    margin: 0px 5rem 0px;
    border: 2px solid #fff;
    border-radius: 1rem;
    padding:2rem;">
                <span id="spam"><?php echo $row['heading']; ?></span>
                <span><?php echo $row['content'] ?></span>
                <a href='Text_keep.php?delete_id=<?php echo $current_id ?>&id=<?php echo $acount_id ?>'><button>DELETE</button></a>
            </div>
        <?php
        }
        ?>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script><script  src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>