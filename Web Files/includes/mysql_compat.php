<?php

if (!defined('MYSQL_ASSOC')) {
    define('MYSQL_ASSOC', MYSQLI_ASSOC);
}
if (!defined('MYSQL_NUM')) {
    define('MYSQL_NUM', MYSQLI_NUM);
}
if (!defined('MYSQL_BOTH')) {
    define('MYSQL_BOTH', MYSQLI_BOTH);
}

if (!function_exists('mysql_connect')) {
    $__mysql_compat_connection = null;

    function __mysql_compat_ensure_connection($link = null) {
        global $__mysql_compat_connection;

        if ($link instanceof mysqli) {
            return $link;
        }

        if ($__mysql_compat_connection instanceof mysqli) {
            return $__mysql_compat_connection;
        }

        if (defined('DB_SERVER') && defined('DB_USER') && defined('DB_PASS')) {
            $database = defined('DB_NAME') ? DB_NAME : null;
            $__mysql_compat_connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, $database);
            return $__mysql_compat_connection;
        }

        return false;
    }

    function mysql_connect($server = null, $username = null, $password = null, $new_link = false, $client_flags = 0) {
        global $__mysql_compat_connection;

        $__mysql_compat_connection = mysqli_connect($server, $username, $password);
        return $__mysql_compat_connection;
    }

    function mysql_pconnect($server = null, $username = null, $password = null, $client_flags = 0) {
        global $__mysql_compat_connection;

        if ($server !== null && strpos($server, 'p:') !== 0) {
            $server = 'p:' . $server;
        }

        $__mysql_compat_connection = mysqli_connect($server, $username, $password);
        return $__mysql_compat_connection;
    }

    function mysql_select_db($database_name, $link_identifier = null) {
        $conn = __mysql_compat_ensure_connection($link_identifier);
        return $conn ? mysqli_select_db($conn, $database_name) : false;
    }

    function mysql_query($query, $link_identifier = null) {
        $conn = __mysql_compat_ensure_connection($link_identifier);
        return $conn ? mysqli_query($conn, $query) : false;
    }

    function mysql_fetch_array($result, $result_type = MYSQLI_BOTH) {
        return mysqli_fetch_array($result, $result_type);
    }

    function mysql_num_rows($result) {
        return mysqli_num_rows($result);
    }

    function mysql_fetch_assoc($result) {
        return mysqli_fetch_assoc($result);
    }

    function mysql_fetch_object($result, $class_name = 'stdClass', $params = array()) {
        if (empty($params)) {
            return mysqli_fetch_object($result, $class_name);
        }

        return mysqli_fetch_object($result, $class_name, $params);
    }

    function mysql_fetch_row($result) {
        return mysqli_fetch_row($result);
    }

    function mysql_data_seek($result, $row_number) {
        return mysqli_data_seek($result, $row_number);
    }

    function mysql_fetch_field($result, $field_offset = null) {
        if ($field_offset !== null) {
            mysqli_field_seek($result, $field_offset);
        }

        return mysqli_fetch_field($result);
    }

    function mysql_free_result($result) {
        return mysqli_free_result($result);
    }

    function mysql_result($result, $row, $field = 0) {
        if (!mysqli_data_seek($result, $row)) {
            return false;
        }

        $data = mysqli_fetch_array($result, MYSQLI_BOTH);
        if ($data === null || $data === false) {
            return false;
        }

        return isset($data[$field]) ? $data[$field] : false;
    }

    function mysql_insert_id($link_identifier = null) {
        $conn = __mysql_compat_ensure_connection($link_identifier);
        return $conn ? mysqli_insert_id($conn) : false;
    }

    function mysql_affected_rows($link_identifier = null) {
        $conn = __mysql_compat_ensure_connection($link_identifier);
        return $conn ? mysqli_affected_rows($conn) : false;
    }

    function mysql_real_escape_string($unescaped_string, $link_identifier = null) {
        $conn = __mysql_compat_ensure_connection($link_identifier);
        if (!$conn) {
            return addslashes($unescaped_string);
        }

        return mysqli_real_escape_string($conn, $unescaped_string);
    }

    function mysql_close($link_identifier = null) {
        global $__mysql_compat_connection;

        $conn = __mysql_compat_ensure_connection($link_identifier);
        if (!$conn) {
            return false;
        }

        $closed = mysqli_close($conn);
        if ($closed) {
            $__mysql_compat_connection = null;
        }

        return $closed;
    }

    function mysql_error($link_identifier = null) {
        $conn = __mysql_compat_ensure_connection($link_identifier);
        if (!$conn) {
            return mysqli_connect_error();
        }

        return mysqli_error($conn);
    }

    function mysql_errno($link_identifier = null) {
        $conn = __mysql_compat_ensure_connection($link_identifier);
        if (!$conn) {
            return mysqli_connect_errno();
        }

        return mysqli_errno($conn);
    }
}
