<?php
    if (!apc_exists(session_id())) {
        redirect('login');
    }
?>