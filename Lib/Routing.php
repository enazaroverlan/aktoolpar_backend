<?php

/**
 * Created by PhpStorm.
 * User: Эрлан
 * Date: 18.07.2016
 * Time: 16:18
 */
class Routing {
    /**
     * Current Instance
     * @var Routing
     */
    private static $instance;

    /**
     * Current controller name
     * @var string
     */
    public $controller;

    /**
     * Current action name
     * @var string
     */
    public $action;

    /**
     * Base project url
     * @var string
     */
    private $base_url;

    /**
     * Closed Construct function
     */
    protected function __construct() {

        session_start();

        $this->base_url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].'/';
        $tmp = explode('/', $_SERVER['REQUEST_URI']);

        $this->base_url .= $tmp[1];
    }

    /**
     * Closed clone function
     */
    protected function __clone() {}

    /**
     * Create Routing class instance
     * @return Routing
     */
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Routing();
        }
        return self::$instance;
    }
//    localhost/{controller name}/{action}


    public function proccessRoute(){
        $request_uri = preg_split('/\\//', $_SERVER['REQUEST_URI']);

        $controller = !empty($request_uri[2]) ? $request_uri[2] : 'index';
        $action = !empty($request_uri[3]) ? $request_uri[3] : 'index_action';

        $this->controller = $controller;
        $this->action     = $action;

        // Check file exist
        if(!file_exists(CONTROLLERS_PATH.$this->controller.'.php')){
            return ErrorHandler::ConvertError(101);
        }

        // Load current controller file
        require_once CONTROLLERS_PATH.$this->controller.'.php';

        if(!class_exists($this->controller)){
            return ErrorHandler::ConvertError(102);
        }

        // Instance current controller
        $controllerClass = new $this->controller();

        if(!method_exists($controllerClass, $this->action)){
            return ErrorHandler::ConvertError(102);
        }

        $this->cleanupRequest();

//        Security::isAuth();
        call_user_func(array($this->controller, $this->action), $_REQUEST);
    }

    public function GetPageTitle () {
        switch($this->controller) {
            case 'index': return "Главная";
            case 'about': return "О Компании";
            case 'objects':
                switch($this->action) {
                    case 'built': return "Построенные объекты";
                    case 'building': return "Строящиеся объекты";
                    case 'projected': return "Проектирумые объекты";
                    case 'build': return "Построенный объект";
                }
                break;
            case 'services':
                switch($this->action) {
                    case 'building': return "Услуги Строительства";
                    case 'rent': return "Услуги аренды техники";
                    case 'design': return "Услуги Проектирования";
                }
                break;
            case 'contacts': return "Контакты";
        }
    }

    /**
     * Return current project url
     * @return string
     */
    public function getBaseUrl(){
        return $this->base_url;
    }

    public function isMethod($method){
        if($_SERVER['REQUEST_METHOD'] == $method){
            return true;
        }
        return false;
    }

    public function cleanupRequest(){
        foreach ($_REQUEST as $key => $value){
            $value = addslashes(trim($value));
            $value = htmlentities($value, ENT_QUOTES);

            unset($_REQUEST['controller'], $_REQUEST['action']);

            $_REQUEST[$key] = $value;
        }
    }

    public function GetLocation() {
        return $this->controller;
    }

    public function GetAction() {
        return $this->action;
    }
}