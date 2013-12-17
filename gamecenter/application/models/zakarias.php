<?php


class Application_Model_zakarias extends Zend_Db_Table_Abstract {

 protected $_name = "zakarias";
        protected  $_primary = "id";
    

 public function get_games(){
     $db = Zend_Db_Table_Abstract::getDefaultAdapter();

            //---------------------
            $query = $db->select()
                    ->from('zakarias');
//                    ->where('profilID = ?', $profilId);
            return ($db->fetchAll($query));
 }
 
 

}
?>