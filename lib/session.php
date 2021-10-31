<?php 
    class Session{
        public static function init(){
            if(version_compare(phpversion(), '5.4.0', '<')){
                if (session_id() == ''){
                    session_start();
                }

            }else{
                if(session_status() == PHP_SESSION_NONE){
                    session_start();
                }
            }
        }

        public static function set($key,$val){
            $_SESSION[$key]=$val;
        }

        //get if there is a session
        public static function get($key){
            if (isset($_SESSION['$key'])){
                return $_SESSION['$key'];
            } else{
                return false;
            }
        }

        public static function checkLogin(){
            self::init();
            if(self::get("adminlogin")==true){
                header("Location: index.php");
            }

        }

        public static function checkSession(){
            //if (!isset($_SESSION['adminUser'])) {
            //   $_SESSION['msg'] = "You have to log in first";
            //   header('location: login.php');
            //}
                if (!isset($_SESSION['adminUser'])) {
                self::destroy();
                header("Location: login.php");
            }
        }

        public static function destroy(){
            session_destroy();
            unset($_SESSION['adminUser']);
            header("Location: login.php");
        }

    }

?>