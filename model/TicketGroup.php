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
        $sql ="SELECT id, name FROM ticketGroup";
        $ticketGroup = mysqli_query($this->dbconn, $sql);

        while ($group = mysqli_fetch_assoc($ticketGroup)) {
            $groups[$group['id']] = $group['name'];

        }
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

        if($group['parentId'] != 0) {
            $sql = "SELECT id, name FROM ticketGroup WHERE id=$parentId AND visible='true'";
            $groups = mysqli_query($this->dbconn, $sql);
                  $child = mysqli_fetch_assoc($groups);
        }
        else{
            $child = null;
        }

        return $child;
    }

    function save()
    {
        $sql = "INSERT INTO ticketGroup (`name`, `parentId`) VALUES ('$this->name', '$this->parentId')";
        $result = mysqli_query($this->dbconn, $sql);
        return $result;

    }

    function get_group_by_id($id)
    {
        $sql = "SELECT id, name FROM ticketGroup WHERE id=$id AND visible='true'";
        $ticketGroup = mysqli_query($this->dbconn, $sql);
        $group = mysqli_fetch_assoc($ticketGroup);

        return $group;
    }
}