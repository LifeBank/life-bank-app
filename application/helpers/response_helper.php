<?php

function set_response($status, $message) {
    $data['status'] = $status;
    $data['message'] = $message;

    return json_encode($data);
}

?>