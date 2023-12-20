<?php
    function hashPwd($password) {
        $hasedPwd = password_hash($password, PASSWORD_DEFAULT);
        return $hasedPwd;
    }
    