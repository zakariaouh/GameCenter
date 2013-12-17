<?php


class Application_Model_party extends Zend_Db_Table_Abstract {

 protected $_name = "party";
        protected  $_primary = "partyID";
    

 public function get_new_parties($date){
     $db = Zend_Db_Table_Abstract::getDefaultAdapter();

            //---------------------
            $query = $db->select()
                    ->from('party', 'score');
                    //->where('big = ?', $date);
            return ($db->fetchOne($query));
 }
 
   

 public function get_id_parties($idgam,$userID){
     $db = Zend_Db_Table_Abstract::getDefaultAdapter();
   $date = date('Y/m/d h:i:s', time());
            //---------------------
   if($userID!=null){
            $query = $db->select()
                    ->from('party')
                    ->where('gameID = ?', $idgam)
                    ->where('end_party>?',$date)
                     ->where('userID = ?', $userID);}
                     else{
                  $query = $db->select()
                    ->from('party')
                    ->where('gameID = ?', $idgam)
                    ->where('end_party>?',$date);       
                     }
            return ($db->fetchAll($query));
 }

}
?>