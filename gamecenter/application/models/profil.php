<?php


class Application_Model_profil extends Zend_Db_Table_Abstract {

 protected $_name = "profil";
        protected  $_primary = "profilID";
    

 public function get_profile_by_id($profilId){
     $db = Zend_Db_Table_Abstract::getDefaultAdapter();

            //---------------------
            $query = $db->select()
                    ->from('profil', 'name_profil')
                    ->where('profilID = ?', $profilId);
            return ($db->fetchOne($query));
 }
 
   



}
?>