<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_train_details extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $tag_html;
public $note;
public $tag_Description;
public $train_id;
public $Group;
public $IsFirst;

public function DatatoObj($data)
{
$this->ObjectID=$data->ObjectID;
$this->tag_html=$data->tag_html;
$this->note=$data->note;
$this->tag_Description=$data->tag_Description;
$this->train_id=$data->train_id;
$this->Group=$data->Group;
$this->IsFirst=$data->IsFirst;
}

public function ObjData()
{
$obj = array(
'ObjectID'=>$this->ObjectID,
'tag_html'=>$this->tag_html,
'note'=>$this->note,
'tag_Description'=>$this->tag_Description,
'train_id'=>$this->train_id,
'Group'=>$this->Group,
'IsFirst'=>$this->IsFirst,
);
return $obj;
}
    public function getListtrain_details($train_id){
        $sql = "
        SELECT
            *
        FROM
        train_detail t1
        WHERE t1.train_id = '".$train_id."'
        AND  t1.IsFirst = 1
        ";
        $query = $this->db->query($sql);
        $result = $query->result();          
        return $result;      
    }

    public function getListtrain_details_bytrainid($train_id){
        $sql = "
        SELECT
            *
        FROM
        train_detail t1
        WHERE t1.train_id = '".$train_id."'
        ";
        $query = $this->db->query($sql);
        $result = $query->result();          
        return $result;      
    }

    public function getListtrain_details_euroup_Group($train_id){
        $sql = "
            SELECT
            t1.Group
            FROM
            train_detail t1
            WHERE train_id = '".$train_id."'
            GROUP BY t1.Group
            ORDER BY t1.Group ASC
        ";
        $data = $this->db->query($sql);
        $result = $data->result();
        return $result;
    }

    public function getListtrain_details_byGroup($train_id,$Group){
        $sql = "
            SELECT
                *
            FROM
            train_detail t1
            WHERE train_id = '".$train_id."'
            AND  t1.Group = '".$Group."'
        ";
        $data = $this->db->query($sql);
        $result = $data->result();
        return $result;
    }
}