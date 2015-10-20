<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     *
     */
    public function __construct() {
        parent::__construct();

    }

    /**
     * writes a file with your models as properties to enable autocomplete in netbeans
     * takes File_name and adds as @'property File_name $file_name
     *
     * @return void
     */
    public function populateMyModels() {

      define ("YOURMODELPATH", "/models/"); // mostly application/models
      define ("PATHTOCIAUTOCOMPLETE", "/../ci_autocomplete/"); // where your file with properties is located
      define ("CIAUTOCOMPLETEFILENAME", "my_models.php"); // name of your file for autocompletion

        $myModelsHead = '<?php die();
            /**
            * Add you custom models here that you are loading in your controllers
            * ---------------------- Models to Load ----------------------
            *';
        $myModelsFooter = '*
            */
            class my_models
            {
            }

            // End my_models.php';

        $fileHandleMyModels = fopen(APPPATH . PATHTOCIAUTOCOMPLETE. CIAUTOCOMPLETEFILENAME, 'w');
        fwrite($fileHandleMyModels, $myModelsHead);
        $directoryHandle = opendir(APPPATH . YOURMODELPATH);
        while (false !== ($entry = readdir($directoryHandle))) {
            if (strpos($entry, ".php")) {
                if (file_exists(APPPATH . YOURMODELPATH . $entry)) {
                    fwrite($fileHandleMyModels, '@property ' . substr($entry, 0, -4) . ' $' . strtolower(substr($entry, 0, -4)). PHP_EOL);
                }
            }
        }
        fwrite($fileHandleMyModels, $myModelsFooter);
        closedir($directoryHandle);
    }

}
