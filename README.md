# CodeIgniter3-Autocomplete-Models
A controller for CodeIgniter 3 that sets up your models for autocompletion in PHPStorm and Netbeans.
This way you circumvent updating your model file by hand every time you write a new model.

It uses the basic structure provided by Jeff Behnke
https://github.com/topdown/phpStorm-CC-Helpers

Setup up a cronjob, to refresh your model file. Or start it by hand using your browser (http://yourmachine.dev/autocomplete/populatemymodels)

The script does not check wether you have priviliges to write a file, nor does it contain any exception or error handling.
