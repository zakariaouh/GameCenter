<?php


class Application_Model_game extends Zend_Db_Table_Abstract {

 protected $_name = "game";
        protected  $_primary = "profilID";
    

 public function get_games(){
     $db = Zend_Db_Table_Abstract::getDefaultAdapter();

            //---------------------
            $query = $db->select()
                    ->from('game');
            return ($db->fetchAll($query));
 }
 
 public function get_game_by_id($id){
     $db = Zend_Db_Table_Abstract::getDefaultAdapter();

            //---------------------
            $query = $db->select()
                    ->from('game')
                    ->where('gameID = ?', $id);
            return ($db->fetchAll($query));
 }
 
   



}
?>