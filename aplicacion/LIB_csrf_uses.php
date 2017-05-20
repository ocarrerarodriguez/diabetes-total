<?php
/**
 * Created by PhpStorm.
 * User: lacuato_ssd
 * Date: 20/05/2017
 * Time: 2:50
 */

session_start();
include 'csrf.class.php';

$csrf = new csrf();


// Genera un identificador y lo valida
$token_id = $csrf->get_token_id();
$token_value = $csrf->get_token($token_id);

// Genera nombres aleatorios para el formulario
$form_names = $csrf->form_names(array('user', 'password'), false);


if(isset($_POST[$form_names['user']], $_POST[$form_names['password']])) {
    // Revisa si el identificador y su valor son válidos.
    if($csrf->check_valid('post')) {
        // Get the Form Variables.
        $user = $_POST[$form_names['user']];
        $password = $_POST[$form_names['password']];

        // La función Form va aquí
    }
    // Regenera un valor aleatorio nuevo para el formulario.
    $form_names = $csrf->form_names(array('user', 'password'), true);
}

?>

<form action="index.php" method="post">
    <input type="hidden" name="<?= $token_id; ?>" value="<?= $token_value; ?>" />
    <input type="text" name="<?= $form_names['user']; ?>" /><br/>
    <input type="text" name="<?= $form_names['password']; ?>" />
    <input type="submit" value="Login"/>
</form>