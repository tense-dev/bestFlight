<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_train_details_euroup extends CI_Model {
public function __construct() {
parent::__construct();;
}
public $ObjectID;
public $Name;
public $Validity;
public $Adult_1st;
public $Adult_2st;
public $Youth_1st;
public $Youth_2st;
public $Senior_1st;
public $Senior_2st;
public $Saver_1st;
public $Saver_2st;
public $Country;
public $Train_code;
public $IsFirst;

public function DatatoObj($data)
{
$this->ObjectID=$data->ObjectID;
$this->Name=$data->Name;
$this->Validity=$data->Validity;
$this->Adult_1st=$data->Adult_1st;
$this->Adult_2st=$data->Adult_2st;
$this->Youth_1st=$data->Youth_1st;
$this->Youth_2st=$data->Youth_2st;
$this->Senior_1st=$data->Senior_1st;
$this->Senior_2st=$data->Senior_2st;
$this->Saver_1st=$data->Saver_1st;
$this->Saver_2st=$data->Saver_2st;
$this->Country=$data->Country;
$this->Train_code=$data->Train_code;
$this->IsFirst=$data->IsFirst;
}

public function ObjData()
{
$obj = array(
'ObjectID'=>$this->ObjectID,
'Name'=>$this->Name,
'Adult_1st'=>$this->Adult_1st,
'Adult_2st'=>$this->Adult_2st,
'Youth_1st'=>$this->Youth_1st,
'Youth_2st'=>$this->Youth_2st,
'Senior_1st'=>$this->Senior_1st,
'Senior_2st'=>$this->Senior_2st,
'Saver_1st'=>$this->Saver_1st,
'Saver_2st'=>$this->Saver_2st,
'Country'=>$this->Country,
'Train_code'=>$this->Train_code,
'IsFirst'=>$this->IsFirst,
);
return $obj;
}
    public function getListtrain_details_euroup($train_code){
        $sql = "
        SELECT
            *
        FROM
        train_detail_europe t1
        WHERE t1.Train_code = '".$train_code."'
        AND  t1.IsFirst = 1
        ORDER BY t1.Name ASC
        ";
        $query = $this->db->query($sql);
        $result = $query->result();          
        return $result;      
    }

    public function getListtrain_details_euroup_GroupCountry($train_code){
        $sql = "
            SELECT
                Country
            FROM
            train_detail_europe t1
            WHERE Train_code = '".$train_code."'
            GROUP BY Country
            ORDER BY t1.Country ASC
        ";
        $data = $this->db->query($sql);
        $result = $data->result();
        return $result;
    }

    public function getListtrain_details_euroup_byCountry($train_code,$Country){
        $sql = "
            SELECT
                *
            FROM
            train_detail_europe t1
            WHERE Train_code = '".$train_code."'
            AND  Country = '".$Country."'
            ORDER BY IsFirst asc ,t1.Name ASC
        ";
        $data = $this->db->query($sql);
        $result = $data->result();
        return $result;
    }
}