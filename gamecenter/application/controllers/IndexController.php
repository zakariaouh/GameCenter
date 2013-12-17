<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $this->_redirect("index/authentification");
    }

    public function authentificationAction() {
//       $authAdapter=new Zend_Auth_Adapter_DbTable(Zend_Db_Table_Abstract::getDefaultAdapter());
//       $authAdapter->setTableName('user')
//               ->setIdentityColumn("email")
//               ->setCredential('password')
//               ->setCredentialTreatment(crypt($form->getValue('password'), 'password') == 'password');
//        
        
        /*
         $hashed_password = crypt('zakaria'); 
          $user_input='zakaria';

          if (crypt($user_input, $hashed_password) == $hashed_password) {
          echo "Password verified!";
          }

         */
        $sess = new Zend_Session_Namespace('User');
        $user = new Application_Model_user();
        $form = new Application_Form_authentification();


        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();

            if ($form->isValid($data)) {
                $email = $form->getValue('email');
                $password = $form->getValue('password');

                $valid = $user->user_auth($email, $password);
                if ($valid == true) {
                    $sess->userID = $user->get_user_id($email);
                    $this->_redirect('/index/accueil');
                } else {
                    $this->view->errors = array(0 => array('err' => 'Combinaison Email/Mot de passe non valid'));
                }
//              
            } else {
                $this->view->errors = $form->getMessages();
            }
        }
        $this->view->form = $form;
    }

    public function accueilAction() {
        $user = new Application_Model_user();
        $sess = new Zend_Session_Namespace('User');

        $this->view->nameplayer = $user->get_user_name($sess->userID);

        $games = new Application_Model_game();
        $selectedGames = $games->get_games();

        //  var_dump($selectedGames);

        $this->view->games = $selectedGames;
    }

    public function gameinfoAction() {

        $game = new Application_Model_game();
        $this->view->allgames = $game->get_games();

//$z=new Application_Model_zakarias();
//$j=$z->get_games();
//die(var_dump($j));
        $idgame = $_GET["idgame"];
        if ($idgame != null) {

            $this->view->game = $game->get_game_by_id($idgame);
        } else {
            $this->view->game = null;
        }
    }

    public function playgameAction() {
//        $sess = new Zend_Session_Namespace('User');
//        $userid = $sess->userID;
//        $party = new Application_Model_party();
//        $idgame = $_GET["idgame"];
//        if ($idgame != null) {
//
//
//            $partysarray = $party->get_id_parties($idgame, $userid);
//            if (empty($partysarray)) {
//                $partysarray = $party->get_id_parties($idgame, null);
//                if (empty($partysarray)) {
//                    $date = date('Y/m/d h:i:s', time());
//                    $datefin = $date = date('Y/m/d h:i:s', time() + 86400);
//                    $data = array(
//                        'beginning_party' => $date,
//                        'end_party' => $datefin,
//                        'duration_party' => 54,
//                        'gameID' => $idgame,
//                        'userID' => $userid,
//                    );
//                    $party->insert($data);
//                }
//            } else {
//                
//            }
//            var_dump($partysarray);
//
//            echo $date;
//        }

//         $this->_redirect("index/authentification");
    }
  
        public function logout() {
        
    }     public function aboutAction() {
        
    }
    
}

