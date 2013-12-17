<?php

class Application_Form_authentification extends Zend_Form {

    public function init() {


        
        // Numero de l'etudiant;
        $password = new Zend_Form_Element_Password("password");
        $password->setRequired(true);
        $password->addValidator('NotEmpty', true, array('messages' => 'Ce champs est obligatoire'))
                ->addValidator('StringLength', false, array('min' => 8,
                    'messages' => 'Le mot de passe doit être de plus 8 caractéres'));
       $password->style = "width: 250px;";
        $password->setAttrib("placeholder", "Secret Password");
        $password->setOptions(array('class'=>'text-input'));
        //email
        $emailvalid = new Application_Form_EmailAddress();
      $mail = new Zend_Form_Element_Text("email");
        $mail->setRequired(true);
        $mail->addValidator('NotEmpty', true, array('messages' => 'Ce champs est obligatoire'));
        $mail->style = "width: 250px;";
        $mail->addValidator($emailvalid);
$mail->setAttrib("placeholder", "yourname@email.com");
   $mail->setOptions(array('class'=>'text-input'));
$connexion = new Zend_Form_Element_Submit("connexion");
        $connexion->setLabel("connexion");


//-------------------------------------------------------------------------------------------
        // pour l'affichage de tous les attributs;
        $this->addElements(array($mail,$password,$connexion));
    }

}

?>
