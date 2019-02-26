<?php

include_once 'connection.php';

class TicketGroup extends Connection
{
    private $name = "";
    private $parentId = 0;
    private $id = 0;
    private $result = null;






    function get_id()
    {
        return $this->id;
    }


    function get_all_groups()
    {
        $con = $this->Open();
        $sql ="SELECT id, name FROM sparrow.ticketGroup";

        $ticketGroup  = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        if($ticketGroup->execute()){

            while ($group = $ticketGroup->fetch()) {
                $groups[$group['id']] = $group['name'];

            }

        }

        $origin = "TicketGroup get_group_by_id";
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




        if($group['parentId'] != null) {
            $parentId = $group['parentId'];
            $con = $this->Open();
            $sql = "SELECT id, name FROM sparrow.ticketGroup WHERE id=:parentId AND visible='true'";
            $con = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            if ($con->execute([':parentId' => $parentId])){
                $child= $con->fetch(PDO::FETCH_ASSOC);
            }
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
        $con = $this->Open();
        if ($parentId === null){
            $sql = "INSERT INTO sparrow.ticketGroup (`name`) VALUES (:name)";
            $this->result = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY))->execute([':name'=> $name]);


        }
        else {
            $sql = "INSERT INTO sparrow.ticketGroup (`name`, `parentId`) VALUES (:name, :parentId)";
            $this->result = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY))->execute([':name' => $name, 'parentId' => $parentId]);
            }
        $origin = "TicketGroup get_group_by_id";
        $this->mylog($origin, $sql);
        $this->id = $con->lastInsertId();
        return $this->result;

    }

    function get_group_by_id($id)
    {
        $con= $this->Open();
        $sql = "SELECT id, name, parentId FROM sparrow.ticketGroup WHERE id=:id AND visible='true'";
        $con = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        if ($con->execute([':id' => $id])){
            $group = $con->fetch();
        }
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
    function pdo_get_all_groups()
    {



        $con = $this->Open();
        $sql ="SELECT id, name FROM sparrow.ticketGroup";

        $ticketGroup  = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        if($ticketGroup->execute()){

            while ($group = $ticketGroup->fetch()) {
                $groups[$group['id']] = $group['name'];

            }

        }

        $origin = "TicketGroup get_group_by_id";
        $this->mylog($origin, $sql);


        return $groups;
    }
}