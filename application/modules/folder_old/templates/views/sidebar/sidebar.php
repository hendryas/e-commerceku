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
                    $id_role = $this->session->userdata('id_role');

                    $this->db->select('menu_level_1.*');
                    $this->db->from('menu_level_1');
                    $this->db->join('user_access_menu', 'user_access_menu.id_menu_lvl1 = menu_level_1.id_menu_lvl1');
                    $this->db->where('user_access_menu.id_role', $id_role);
                    $this->db->where('menu_level_1.delete_sts', 0);
                    $this->db->where('user_access_menu.delete_sts', 0);
                    $this->db->order_by('menu_level_1.urut', 'asc');

                    $menu_1 = $this->db->get()->result_array();
                    ?>
                 <!-- End Pembuatan Menu Level 1 -->
                 <?php foreach ($menu_1 as $m1) : ?>
                     <li>
                         <?php if ($m1['status_sub'] != 1) : ?>
                             <a href="<?= base_url($m1['url']); ?>" class="waves-effect">
                                 <i class="<?= $m1['icon']; ?>"></i>
                                 <span><?= $m1['title']; ?></span>
                             </a>
                         <?php else : ?>
                             <a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class="<?= $m1['icon']; ?>"></i>
                                 <span><?= $m1['title']; ?></span>
                             </a>
                             <!-- Start Pembuatan Menu Level 2 -->
                             <?php
                                $id_menu_lvl1 = $m1['id_menu_lvl1'];
                                $id_role = $this->session->userdata('id_role');

                                $this->db->select('menu_level_2.*');
                                $this->db->from('menu_level_2');
                                $this->db->join('menu_level_1', 'menu_level_1.id_menu_lvl1 = menu_level_2.id_menu_lvl1');
                                $this->db->where('menu_level_2.id_menu_lvl1', $id_menu_lvl1);
                                $this->db->where('menu_level_2.is_active', 1);

                                $menu_2 = $this->db->get()->result_array();
                                ?>
                             <!-- End Pembuatan Menu Level 2 -->
                             <ul class="sub-menu" aria-expanded="false">
                                 <?php foreach ($menu_2 as $m2) : ?>
                                     <?php if ($m2['status_sub'] != 1) : ?>
                                         <li>
                                             <a href="<?= base_url($m2['url']); ?>"><?= $m2['title']; ?></a>
                                         </li>
                                     <?php else : ?>
                                         <li>
                                             <a href="javascript: void(0);" class="has-arrow"><?= $m2['title']; ?></a>
                                             <!-- Start Pembuatan Menu Level 3 -->
                                             <?php
                                                $id_menu_lvl2 = $m2['id_menu_lvl2'];
                                                $this->db->select('menu_level_3.*');
                                                $this->db->from('menu_level_3');
                                                $this->db->where(['menu_level_3.id_menu_lvl2' => $id_menu_lvl2]);
                                                $this->db->join('menu_level_2', 'menu_level_2.id_menu_lvl2 = menu_level_3.id_menu_lvl2');

                                                $menu_3 = $this->db->get()->result_array();
                                                ?>
                                             <!-- End Pembuatan Menu Level 3 -->
                                             <ul class="sub-menu" aria-expanded="true">
                                                 <?php foreach ($menu_3 as $m3) : ?>
                                                     <li>
                                                         <a href="<?= base_url($m3['url']); ?>"><?= $m3['title']; ?></a>
                                                     </li>
                                                 <?php endforeach; ?>
                                             </ul>
                                         </li>
                                     <?php endif; ?>
                                 <?php endforeach; ?>
                             </ul>
                         <?php endif; ?>
                     </li>
                 <?php endforeach; ?>

             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
 <!-- Left Sidebar End -->