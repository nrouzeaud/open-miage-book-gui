<?php
Import::php("OpenM-Services.api.Impl.DAO.OpenM_DAO");
/**
 * Description of OpenM_Book_KeepInformDAO
 * 
 * @author nicolas rouzeaud
 */
class OpenM_Book_KeepInformDAO extends OpenM_DAO  {
    
    const DAO_CONFIG_FILE_NAME = "OpenM_Book_KeepInform.DAO.config.file.path";
    const DAO_PREFIX = "OpenM_Book_KeepInform.DAO.prefix";
    
    const OpenM_Book_KEEPINFORM_Table_NAME = "OpenM_BOOK_KEEPINFORM";
    const EMAIL = "email";
    const DATE = "date";
    
    
    public function __construct() {
        parent::__construct();
    }

    public function getDaoConfigFileName() {
        return self::DAO_CONFIG_FILE_NAME;
    }

    public function getPrefixPropertyName() {
        return self::DAO_PREFIX;
    }
    
    
    public function insert($mail){
        $date = time();
        self::$db->request(OpenM_DB::insert(self::OpenM_Book_KEEPINFORM_Table_NAME, array(
            self::EMAIL => $mail,
            self::DATE => $date
        )));
    }
    
    public function alreadyExist($mail){
        $retour = self::$db->request_fetch_HashtableString(OpenM_DB::select(self::OpenM_Book_KEEPINFORM_Table_NAME, array(
            self::EMAIL => $mail
        )));
        return ($retour !== null); 
    }
 
    
}
?>
