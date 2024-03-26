<?php
function check_access($id_role, $id_menu_lvl1)
{
    $ci = get_instance();

    //query lain, buat bikin di SP
    // $ci->db->get_where('user_access_menu',[
    //     'id_role' => $id_role,
    //     'id_menu_lvl1' => $id_menu_lvl1
    // ]);

    // var_dump($id_role);
    // die;

    $ci->db->where('id', $id_role);
    $ci->db->where('menu_id', $id_menu_lvl1);
    $result = $ci->db->get('user_access_menu');

    // var_dump($id_role);
    // var_dump($id_menu_lvl1);
    // die;

    // var_dump($result->num_rows() > 0);
    // die;

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
