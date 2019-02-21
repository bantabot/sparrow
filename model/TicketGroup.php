<?php

class TicketGroup
{
    private $name = "";
    private $parentId = 0;
    private $id = 0;
    private $result = null;
    private $dbconn = null;

    function get_id()
    {
        return $this->id;
    }


    function set_dbconn($dbconn){
        $this->dbconn = $dbconn;
    }

    function get_all_groups()
    {
        $sql ="SELECT id, name FROM ticketGroup";
        $ticketGroup = mysqli_query($this->dbconn, $sql);

        while ($group = mysqli_fetch_assoc($ticketGroup)) {
            $groups[$group['id']] = $group['name'];

        }
        $origin = "TicketGroup get_all_groups";
        $this->mylog($origin, $sql);
        return $groups;
    }

    function set_group_family($id)
    {
        //set initial group
        $child = $this->get_group_by_id($id);
        $family[$child['id']] = $child['name'];

        //find if the group from the first id has a parent
        $parent = $this->get_group_parent($id);

        //if that group has a parent add to array and find the next one
        if ($parent != null){
          do {
              $family[$parent['id']] = $parent['name'];
              $parent = $this->get_group_parent($parent['id']);
          } while ($parent != null);

        }

        return $family;

    }

    function get_group_parent($id)
    {
       $group = $this->get_group_by_id($id);


        $parentId = $group['parentId'];

        if($group['parentId'] != null) {
            $sql = "SELECT id, name FROM ticketGroup WHERE id=$parentId AND visible='true'";
            $groups = mysqli_query($this->dbconn, $sql);
                  $child = mysqli_fetch_assoc($groups);
            $origin = "TicketGroup get_group_parent";
            $this->mylog($origin, $sql);
        }
        else{
            $child = null;
        }


        return $child;
    }

    function save($name, $parentId)
    {
        $sql = "INSERT INTO ticketGroup (`name`, `parentId`) VALUES ('$name', '$parentId')";
        var_dump($sql);
        $this->result = mysqli_query($this->dbconn, $sql);
        $this->id = mysqli_insert_id($this->dbconn);
        $myerror = mysqli_error($this->dbconn);
        $origin = "TicketGroup get_group_by_id";
        $this->mylog($origin, $sql);
        return $this->result;

    }

    function get_group_by_id($id)
    {
        $sql = "SELECT id, name FROM ticketGroup WHERE id=$id AND visible='true'";
        $ticketGroup = mysqli_query($this->dbconn, $sql);
        $group = mysqli_fetch_assoc($ticketGroup);
        $origin = "TicketGroup get_group_by_id";
        $this->mylog($origin, $sql);

        return $group;
    }
    function mylog($origin, $sql)
    {
        $file = "../config/myDump.txt";
        $dump = $origin." at . ".time()." ------ ".$sql."\n";
        file_put_contents($file, $dump, FILE_APPEND | LOCK_EX);
    }
}