<?php

function connection()
{
    try {
        $connection = mysqli_connect(
            'localhost',
            'root',
            null,
            'promotion_management'
        );
    } catch (\Throwable $th) {
        die('DB Connection Failed.<br>' . $th->getMessage());
    }

    return $connection;
}
