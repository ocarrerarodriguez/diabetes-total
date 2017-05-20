<?php
/**
 * Created by PhpStorm.
 * User: lacuato_ssd
 * Date: 20/05/2017
 * Time: 0:52
 */
class LIB_CSRF
{
    public function get_token_id()
    {
        if(isset($_SESSION['token_id'])){return $_SESSION['token_id']; }
        else
        {
            $token_value=$this->random(10);
            $_SESSION['token_id']=$token_value;
            return $_SESSION['token_id'];
        }
    }
    public function get_token()
    {
        if(isset($_SESSION['token_value'])){return $_SESSION['token_value']; }
        else
        {
            $token_value=hash('sha256',$this->random(500));
            $_SESSION['token_value']=$token_value;
            return $_SESSION['token_value'];
        }
    }
    public function check_valid($method) {
        if($method == 'post' || $method == 'get') {
            $post = $_POST;
            $get = $_GET;
            if(isset(${$method}[$this->get_token_id()]) && (${$method}[$this->get_token_id()] == $this->get_token())) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function form_names($names, $regenerate) {

        $values = array();
        foreach ($names as $n) {
            if($regenerate == true) {
                unset($_SESSION[$n]);
            }
            $s = isset($_SESSION[$n]) ? $_SESSION[$n] : $this->random(10);
            $_SESSION[$n] = $s;
            $values[$n] = $s;
        }
        return $values;
    }
    private function random($len) {
        if (@is_readable('/dev/urandom')) {
            $f=fopen('/dev/urandom', 'r');
            $urandom=fread($f, $len);
            fclose($f);
        }

        $return='';
        for ($i=0;$i<$len;++$i) {
            if (!isset($urandom)) {
                if ($i%2==0) mt_srand(time()%2147 * 1000000 + (double)microtime() * 1000000);
                $rand=48+mt_rand()%64;
            } else $rand=48+ord($urandom[$i])%64;

            if ($rand>57)
                $rand+=7;
            if ($rand>90)
                $rand+=6;

            if ($rand==123) $rand=52;
            if ($rand==124) $rand=53;
            $return.=chr($rand);
        }
        return $return;
    }
}
?>