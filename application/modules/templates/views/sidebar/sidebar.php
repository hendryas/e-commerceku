 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <!-- Start Pembuatan Menu Level 1 -->
                 <?php
                    $role_id = $this->session->userdata('role_id');

                    $queryMenu = "  SELECT user_menu.id,menu,menu_nama
                    FROM user_menu JOIN user_access_menu
                    ON user_menu.id = user_access_menu.menu_id
                    WHERE user_access_menu.role_id = $role_id
                    AND NOT user_menu.menu = 'pengaturanpresensi'
                    AND NOT user_menu.menu = 'kelolaadmin'
                    AND NOT user_menu.menu = 'bidang'
                    AND NOT user_menu.menu = 'pesertaaktif'
                    ORDER BY user_access_menu.menu_id ASC ";
                    $menu = $this->db->query($queryMenu)->result_array();
                    ?>
                 <!-- End Pembuatan Menu Level 1 -->
                 <?php foreach ($menu as $m) : ?>
                     <li>
                         <a href="javascript: void(0);" class="has-arrow waves-effect">
                             <!-- <i class="<?= $m['icon']; ?>"></i> -->
                             <span><?= $m['menu_nama']; ?></span>
                         </a>
                         <!-- Start Pembuatan Menu Level 2 -->
                         <?php
                            $menu_id = $m['id'];
                            $role_id = $this->session->userdata('role_id');
                            $queryHasSubMenu = "  SELECT user_has_sub_menu.*
                                 FROM user_has_sub_menu JOIN user_menu
                                 ON user_has_sub_menu.menu_id = user_menu.id
                                 WHERE user_has_sub_menu.menu_id = $menu_id
                                 AND user_has_sub_menu.is_active = 1";
                            $hasSubMenu = $this->db->query($queryHasSubMenu)->result_array();
                            ?>
                         <!-- End Pembuatan Menu Level 2 -->
                         <ul class="sub-menu" aria-expanded="false">
                             <?php foreach ($hasSubMenu as $m2) : ?>
                                 <?php if ($m2['status_sub'] == 1) : ?>
                                     <li>
                                         <a href="<?= base_url($m2['url']); ?>"><?= $m2['title']; ?></a>
                                     </li>
                                 <?php else : ?>
                                     <li>
                                         <a href="javascript: void(0);" class="has-arrow"><?= $m2['title']; ?></a>
                                         <!-- Start Pembuatan Menu Level 3 -->
                                         <?php
                                            $menu_id = $m['id'];
                                            $hasSubMenuId = $m2['id'];
                                            $this->db->select('user_sub_menu.*');
                                            $this->db->from('user_sub_menu');
                                            $this->db->where(['user_sub_menu.has_sub_menu_id' => $hasSubMenuId]);
                                            $this->db->join('user_has_sub_menu', 'user_has_sub_menu.id = user_sub_menu.has_sub_menu_id');

                                            $subMenu = $this->db->get()->result_array();
                                            // var_dump($menu_id);
                                            // die;
                                            ?>
                                         <!-- End Pembuatan Menu Level 3 -->
                                         <ul class="sub-menu" aria-expanded="true">
                                             <?php foreach ($subMenu as $m3) : ?>
                                                 <li>
                                                     <a href="<?= base_url($m3['url']); ?>"><?= $m3['title']; ?></a>
                                                 </li>
                                             <?php endforeach; ?>
                                         </ul>
                                     </li>
                                 <?php endif; ?>
                             <?php endforeach; ?>
                         </ul>
                     </li>
                 <?php endforeach; ?>

             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
 <!-- Left Sidebar End -->