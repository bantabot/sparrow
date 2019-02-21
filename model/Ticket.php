<?php


class Ticket
{
    private $dbconn = null;
    private $groups = null;
    private $result = null;
    private $id = null;
    private $groupNames = [];
    private $groupName = "";
    private $title = "";
    private $description = "";
    private $assignee = "";

    function set_dbconn($dbconn)
    {
        $this->dbconn = $dbconn;

    }

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
        $this->title = mysqli_real_escape_string($this->dbconn, $title);
        $this->description = mysqli_real_escape_string($this->dbconn, $description);
        $this->assignee = mysqli_real_escape_string($this->dbconn, $assignee);
        $this->groupName = mysqli_real_escape_string($this->dbconn, $groupName);

    }

    function get_ticket_by_group()
    {
        $sql = "SELECT title, description, group_name, assignee FROM templates WHERE group_name IN ('$this->groups') AND visible='true'";
        $this->result = mysqli_query($this->dbconn, $sql);
        $origin = "Ticket get_group_names";
        $this->mylog($origin, $sql);
        return $this->result;
    }


    function get_ticket_by_id()
    {
        $sql = "SELECT title, description, group_name, assignee FROM templates WHERE id=$this->id AND visible='true'";
        $this->result = mysqli_query($this->dbconn, $sql);
        $this->result = mysqli_fetch_object($this->result);
        $this->title = $this->result->title;
        $this->description = $this->result->description;
        $this->assignee = $this->result->assignee;
        $this->groupName = $this->result->group_name;
        $origin = "Ticket get_ticket_by_id";
        $this->mylog($origin, $sql);
        return $this->result;
    }


    function get_group_names()
    {
        $sql ="SELECT group_name FROM templates WHERE visible='true' GROUP BY group_name";
        $this->result = mysqli_query($this->dbconn, $sql);
        $this->groupNames = mysqli_fetch_array($this->result, MYSQLI_ASSOC);
        while ($group = $this->result->fetch_assoc()) {
            $groups[] = $group;
        }
        foreach ($groups as $group){
            $this->groupNames[]= $group['group_name'];
        }
        $origin = "Ticket get_group_names";
        $this->mylog($origin, $sql);

        return $this->groupNames;

    }


    function save()
    {
        $sql = "INSERT INTO templates (`title`, `description`, `group_name`, `assignee`) VALUES ('$this->title', '$this->description', '$this->groupName', '$this->assignee')";
        $this->result = mysqli_query($this->dbconn, $sql);
        $origin = "Ticket Save";
        $this->mylog($origin, $sql);
        return $this->result;

    }


    function update ()
    {
        $sql = "UPDATE `templates` SET `title` = '$this->title', `description` = '$this->description', `group_name`='$this->groupName', `assignee`= '$this->assignee' WHERE `templates`.`id` = $this->id";
        $this->result = mysqli_query($this->dbconn, $sql);
        $origin = "Ticket Update";
        $this->mylog($origin, $sql);
        return $this->result;

    }

    function delete()
    {
        $sql = "UPDATE `templates` SET `visible`= 'false' WHERE `templates`.`id` = $this->id";

        $this->result= mysqli_query($this->dbconn, $sql);
        $this->result = mysqli_error($this->dbconn);
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


}