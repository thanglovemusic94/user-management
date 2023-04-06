<?php
    if (!defined('IN_SITE')) die ('The request not found');

    // Hàm thiết lập là đã đăng nhập
function set_logged($username, $level, $fullname){
    session_set('ss_user_token', array(
        'username' => $username,
        'level' => $level,
        'fullname' => $fullname
    ));
}
 
// Hàm thiết lập đăng xuất
function set_logout(){
    session_delete('ss_user_token');
}
 
// Hàm kiểm tra trạng thái người dùng đã đăng hập chưa
function is_logged(){
    $user = session_get('ss_user_token');
    return $user;
}
 
// Hàm kiểm tra có phải là admin hay không
function is_admin(){
    $user  = is_logged();
    if (!empty($user['level']) && $user['level'] == '1'){
        return true;
    }
    return false;
}


// Lấy username người dùng hiện tại
function get_current_username(){
    $user  = is_logged();
    return isset($user['username']) ? $user['username'] : '';
}

// Lấy username người dùng hiện tại
function get_current_fullname(){
    $user  = is_logged();
    return isset($user['fullname']) ? $user['fullname'] : '';
}
 
// Lấy level người dùng hiện tại
function get_current_level(){
    $user  = is_logged();
    return isset($user['level']) ? $user['level'] : '';
}


// Hàm kiểm tra là supper admin
function is_supper_admin(){
    $user = is_logged();
    if (!empty($user['level']) && $user['level'] == '1' && $user['username'] == 'Admin'){
        return true;
    }
    false;
}