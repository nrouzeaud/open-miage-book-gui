<?php
Import::php("OpenM-Book.gui.OpenM_BookView");
Import::php("OpenM-Controller.gui.OpenM_URLViewController");
Import::php("OpenM-Book.gui.DAO.OpenM_Book_KeepInformDAO");

/**
 * 
 * @package OpenM  
 * @subpackage OpenM\OpenM-Book\gui
 * @license http://www.apache.org/licenses/LICENSE-2.0 Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * @link http://www.open-miage.org
 * @author Nicolas Rouzeaud
 */
class OpenM_KeepInformView extends OpenM_BookView {
    
    const EMAIL = "email";
    
    const MENTION_FORM = "mention";
    
    public function _default() {
        $this->view();
    }
    
    public function view() {
        
        $param = HashtableString::from($_POST);
        if ($param->containsKey("submit")) {            
            $mail = $param->get(self::EMAIL);
            if ($mail != "") {
                if (!RegExp::preg("/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/",$mail)){
                    $this->showAlert("Votre email n'est pas dans un format valide", null, self::ALERT_TYPE_DISPLAY_ERROR);
                }else
                {
                    //OK                  
                    try{  
                        $table = new OpenM_Book_KeepInformDAO();
                        if($table->alreadyExist($mail))
                        {
                            $this->showAlert("vous étes déja sur notre liste d'alerte pour la sortie du service ;)", "Email déja enregistré", self::ALERT_TYPE_DISPLAY_ERROR);
                        }else{
                           $table->insert($mail);
                           $this->showAlert("Votre email à été enregistré", "Succès", self::ALERT_TYPE_DISPLAY_SUCCES);   
                        }  
                    }  catch (Exception $e){
                           $this->showAlert("Toutes nos excuses, une erreur est survenue lors de l'enregistrement de votre email", "Erreur interne", self::ALERT_TYPE_DISPLAY_ERROR);                                             
                    }  
                } 
                $this->smarty->assign(self::EMAIL,$mail);                                
            }else{
                $this->showAlert("veuillez renseigner votre email", 'Information absentee', self::ALERT_TYPE_DISPLAY_ERROR);
            } 
        }
        
        
        //"registration" => OpenM_URLViewController::from(OpenM_RegistrationView::getClass(), OpenM_RegistrationView::REGISTER_FORM)->getURL()
        $this->smarty->assign("keepInform",OpenM_URLViewController::from(self::getClass())->getURL()); 
        $this->smarty->assign("mention", OpenM_URLViewController::from(self::getClass(),  self::MENTION_FORM)->getURL());
        $this->setDirs();
        $this->addLinks();
        $this->addNavBarItems();         
        $this->smarty->display('keepInform.tpl');
    }
    
    
    public function mention(){
        
        $this->setDirs();
        $this->addLinks();
        $this->addNavBarItems();         
        $this->smarty->display('mentionLegale.tpl');
        
    }
    
    
    protected function addNavBarItems() {
        $this->smarty->assign("nav_bar", array(        
            array(
                "label" => "Info",
                "items" => array(
                    array(
                        "label" => "Open-MIAGE",
                        "link" => "http://www.open-miage.org",
                        "blank" => true
                    ),
                    array(
                        "label" => "Team Open-MIAGE",
                        "link" => "http://www.open-miage.org/team.html",
                        "blank" => true
                    )
            )),
            array(
                "label" => "Social",
                "items" => array(
                    array(
                        "label" => "FaceBook",
                        "link" => "https://www.facebook.com/OpenMIAGE",
                        "blank" => true
                    ),
                    array(
                        "label" => "Google+",
                        "link" => "https://plus.google.com/u/0/110647730531285167406",
                        "blank" => true
                    ),
                    array(
                        "label" => "Twitter",
                        "link" => "https://twitter.com/OpenMiage",
                        "blank" => true
                    )
                )
            ),
            array(
                "label" => "?",
                "items" => array(
                    array(
                        "label" => "Mention Legale",
                        "link" => OpenM_URLViewController::from(self::getClass(),  self::MENTION_FORM)->getURL(),
                        "blank" => TRUE
                    )                    
                ) 
            )
        ));
    }
    
}

?>
