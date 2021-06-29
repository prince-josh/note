<?php
    include "includes/autoloader.inc.php";
?>
<!doctype html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title> Notes </title>
        <style>
            *{
                margin:0;
                padding:0;
            }
            form{
                margin-top: 20px;
                width: 300px;
            }
            input[type='text']{
                padding: 10px;
                width: 300px;
                height:30px;
                margin-bottom: 15px;
            }
            textarea{
                padding: 10px;
                width: 300px;
                margin-bottom: 15px;
            }
            input[type='submit']{
                padding: 10px;
                width: 320px;
            }
            .notes{
                font-weight:900;
                margin-top:50px;
                margin-left:auto;
                margin-right:auto;
                background: yellow;
                width:290px;
                padding:10px 20px 20px 20px;
            }
            .note-title{
                margin-bottom:20px;
            }
            .delete-note a{
                color:#000;
                text-decoration: none;
                float: right;
            }
            .note-description{
                margin-bottom:20px;
            }
            .note-date{
                text-align:right;
            }
        </style>
    </head>
    <body>
        <center>
            <form action="index.php" method="post">
            <input type="text" name="title" placeholder="Note title"><br>
            <textarea name="description" placeholder="Note description" cols="30" rows="10"></textarea><br>
            <input type="submit" value="Add note" name="submit">
            </form>
            <?php
                if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];

                    $addnote = new test();
                    $addnote -> addNote($title, $description);
                    echo "added successfully";
                }
            ?>
        </center>

        <?php
            $getnotes = new test();
            $getnotes -> getNotes();
            $delete = new test();
            $delete->deleteNote();
        ?>
    </body>
</html>