<?php

class test extends Dbh{

    public function addNote($title, $description){
        $insert = "insert into notes(title, description, date_created) values(?, ?, NOW())";
        $stmt = $this->connect()->prepare($insert);
        $stmt->execute([$title, $description]);
    }

    public function getNotes(){
        $sql = "select * from notes order by note_id desc";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $notes = $stmt->fetchAll();

        foreach ($notes as $note) {
            $note_id = $note['note_id'];
            $title = ucfirst($note['title']);
            $description = ucfirst($note['description']);
            $date_created = $note['date_created'];

            echo "<div class='notes'>
            <form action='index.php' method='get'>
            <span title='Delete' class='delete-note'><a href='index.php?id=$note_id'>X</a></span>
            </form>
            <div class='note-title'> <u> $title </u>
            </div>
            <div class='note-description'>$description</div>
            <div class='note-date'>$date_created</div>
        </div>";
        }
    }
    public function deleteNote(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $del = "delete from notes where note_id='$id'";
            $stmt= $this->connect()->prepare($del);
            $stmt -> execute();
            echo "<script> alert('deleted successfully')</script>";
            echo "<script> window.open('index.php', '_self')</script>";
        }
    }
}
