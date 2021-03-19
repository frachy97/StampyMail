<?php 
namespace config;

     class Request {

          private $controller;
          private $method;
          private $parameters;

          public function __construct() {

               /* I get the url in string format */
               $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

               /* I decompose it into an array */
               $urlToArray = explode("/", $url);

               /* Delete empty spaces if there are any */
               $urlArray = array_filter($urlToArray);

                /* If the array has elements, we save the first one in controller, if not, we save User as the default controller */
                if(empty($urlArray)) {
                     $this->controller = 'User';
                } else {
                     $this->controller = ucwords(array_shift($urlArray));
                }

               /* If the array has elements, we store the first one in method, if not, we store Index as the default method */
               if(empty($urlArray)) {
                    $this->method = 'index';
               } else {
                    $this->method = array_shift($urlArray);
               }

               /* If the request is GET and the array still has data, it is saved in parameters, if not, it is saved what comes as $ _POST */
               $requestMethod = $this->getRequestMethod();

               if($requestMethod == 'GET') {
                    if(!empty($urlArray)) {
                         $this->parameters = $urlArray;
                    }
               } else {
                    $this->parameters = $_POST;
               }
          }

          public static function getRequestMethod()
          {
               return $_SERVER['REQUEST_METHOD'];
          }


          public function getController() {
               return $this->controller;
          }


          public function getMethod() {
               return $this->method;
          }

          public function getParameters() {
               return $this->parameters;
          }
     }
