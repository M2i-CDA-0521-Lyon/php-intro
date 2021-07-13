<?php

if ($_POST['username'] === 'test' && $_POST['password'] === 'test') {
    echo 'Authentification réussie.';
} else {
    echo 'Authentification échouée.';
}
