<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mod_contact extends CI_Model {
public function __construct() {
parent::__construct();;
}
function insert($data)
{
    $this->db->insert('contact',$data);
    return true;
}
}