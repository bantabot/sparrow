<?php

class TicketGroup
{
    private $name = "";
    private $parentId = 0;
    private $dbconn = null;

    function set_dbconn($dbconn){
        $this->dbconn = $dbconn;
    }

    function get_all_groups()
    {
        $sql ="SELECT * FROM ticketGroup";
        $ticketGroup = mysqli_query($this->dbconn, $sql);

        while ($group = mysqli_fetch_assoc($ticketGroup)) {
            $groups[$group['id']] = $group['name'];

        }
        return $groups;
    }

    function save()
    {
        $sql = "INSERT INTO ticketGroup (`name`, `parentId`) VALUES ('$this->name', '$this->parentId')";
        $result = mysqli_query($this->dbconn, $sql);
        return $result;

    }
}