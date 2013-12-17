<?php

class Application_Model_user extends Zend_Db_Table_Abstract {

    protected $_name = "user";
    protected $_primary = "userID";

    public function get_user($userid) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $query = $db->select()
                ->from('user')
                ->where('userID = ?', $userid);

        return ($db->fetchAll($query));
    }

    public function user_auth($login, $password) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        /* $query = $db->select()
          ->from('user','count(userID)')
          ->where('pwd_user = ?',$password)
          ->where('mail_user= ?',$login);

          $count= ($db->fetchOne($query));


          if ($count == 1) {
          return true;}
          else {
          return false;
          }
         */

        $query = $db->select()
                ->from('user', 'pwd_user')
                ->where('mail_user= ?', $login);

        $passDB = ($db->fetchOne($query));
        if (crypt($password, $passDB) == $passDB) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user_id($login) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $query = $db->select()
                ->from('user', 'userID')
              //  ->where('pwd_user = ?', $password)
                ->where('mail_user= ?', $login);



        return $db->fetchOne($query);
    }

    public function get_user_name($userid) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $query = $db->select()
                ->from('user', 'login_user')
                ->where('userID = ?', $userid)
//                    ->orWhere("userID",$email)
        ;

        return ($db->fetchOne($query));
    }

}

?>