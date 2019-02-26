<?php

include_once 'connection.php';


class Ticket extends Connection
{

    private $groups = [];
    private $result = null;
    private $id = null;
    private $groupNames = [];
    private $groupName = "";
    private $title = "";
    private $description = "";
    private $assignee = "";



    function set_id($id)
    {
        $this->id = $id;
    }

    function set_groups($groups)
    {
        $this->groups = $groups;
    }

    function get_title()
    {
        return $this->title;
    }

    function get_description()
    {
        return $this->description;
    }

    function get_assignee()
    {
        return $this->assignee;
    }

    function get_group_name()
    {
        return $this->groupName;
    }

    function set_ticket($title, $description, $assignee, $groupName)
    {
        $this->title = $title;
        $this->description = $description;
        $this->assignee = $assignee;
        $this->groupName =  $groupName;

    }

    function get_ticket_by_group()
    {

        $con = $this->Open();
        $in  = str_repeat('?,', count($this->groups) - 1) . '?';
        $sql = "SELECT id, title, description, group_name, assignee FROM sparrow.templates WHERE group_name IN ($in) AND visible='true'";

        $con = $con->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

//
        if($con->execute($this->groups)){
            $this->result = $con->fetchall();

        }


        $origin = "Ticket get_group_names";
        $this->mylog($origin, $sql);
        return $this->result;
    }


    function get_ticket_by_id()
    {
        $con = $this->Open();
        $sql = "SELECT title, description, group_name, assignee FROM sparrow.templates WHERE id=:id AND visible='true'";
        $con= $con->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        if($con->execute([':id'=>$this->id]))
           {
               $this->result = $con->fetch(PDO::FETCH_OBJ);
           }
        $this->title = $this->result->title;
        $this->description = $this->result->description;
        $this->assignee = $this->result->assignee;
        $this->groupName = $this->result->group_name;
        $origin = "Ticket get_ticket_by_id";
        $this->mylog($origin, $sql);
        return $this->result;
    }


//    function get_group_names()
//    {
//        $con = $this->Open();
//        $sql ="SELECT group_name FROM sparrow.templates WHERE visible='true' GROUP BY group_name";
//        $this->result = mysqli_query($this->dbconn, $sql);
//        $this->groupNames = mysqli_fetch_array($this->result, MYSQLI_ASSOC);
//        while ($group = $this->result->fetch_assoc()) {
//            $groups[] = $group;
//        }
//        foreach ($groups as $group){
//            $this->groupNames[]= $group['group_name'];
//        }
//        $origin = "Ticket get_group_names";
//        $this->mylog($origin, $sql);
//
//        return $this->groupNames;
//
//    }


    function save()
    {
        $con = $this->Open();
        $sql = "INSERT INTO sparrow.templates (`title`, `description`, `group_name`, `assignee`) VALUES (:title, :description, :groupName, :assignee)";
        $this->result = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY))->execute([':title'=> $this->title, ':description'=>$this->description, ':groupName'=>$this->groupName, ':assignee'=>$this->assignee]);
        $origin = "Ticket Save";
        $this->mylog($origin, $sql);
        return $this->result;

    }


    function update ()
    {
        $con = $this->Open();
        $sql = "UPDATE sparrow.templates SET `title` = :title, `description` = :description, `group_name`=:groupName, `assignee`= :assignee WHERE `templates`.`id` = :id";
        $con = $con->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $this->result= $con->execute([':title'=> $this->title, ':description'=>$this->description, ':groupName'=>$this->groupName, ':assignee'=>$this->assignee, ':id'=>$this->id]);
        $origin = "Ticket Update";
        $this->mylog($origin, $sql);
        return $this->result;

    }

    function delete()
    {
        $con = $this->Open();
        $sql = "UPDATE sparrow.templates SET `visible`= 'false' WHERE `templates`.`id` = :id";

        $this->result= $con->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY])->execute([':id'=>$this->id]);

        $origin = "Ticket Delete";
        $this->mylog($origin, $sql);
        return $this->result;


    }


    function mylog($origin, $sql)
    {
        $file = "../config/myDump.txt";
        $dump = $origin." at . ".time()." ------ ".$sql."\n";
        file_put_contents($file, $dump, FILE_APPEND | LOCK_EX);
    }
    function pdo_ticket()
    {



        $con = $this->Open();
        $sql ="SELECT * FROM sparrow.templates";

        $ticketGroup  = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        if($ticketGroup->execute()){

            while ($group = $ticketGroup->fetch()) {
                $groups[$group['id']] = $group['title'];

            }

        }

        $origin = "TicketGroup get_group_by_id";
        $this->mylog($origin, $sql);


        return $groups;
    }


}