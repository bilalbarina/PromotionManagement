<?php

function connection() {
    return mysqli_connect(
        'localhost',
        'root',
        '',
        'promotion_management'
    );
}