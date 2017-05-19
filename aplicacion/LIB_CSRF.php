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
    public function check_valid()
    {}
}
?>