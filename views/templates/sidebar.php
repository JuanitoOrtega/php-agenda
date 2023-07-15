        <div class="sa-app__sidebar">
            <div class="sa-sidebar">
                <div class="sa-sidebar__header">
                    <a class="sa-sidebar__logo" href="<?=BASE_URL?>"><!-- logo -->
                        <div class="sa-sidebar-logo">
                            <img src="<?=BASE_URL?>assets/images/agenda.png" width="100" alt="" />
                            <div class="sa-sidebar-logo__caption">Admin</div>
                        </div><!-- logo / end -->
                    </a>
                </div>
                <div class="sa-sidebar__body" data-simplebar="">
                    <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                        <li class="sa-nav__section">
                            <div class="sa-nav__section-title">
                                <span>Aplicación</span>
                            </div>
                            <ul class="sa-nav__menu sa-nav__menu--root">
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=BASE_URL?>" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-tachometer-alt"></i>
                                        </span>
                                        <span class="sa-nav__title">Dashboard</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                                    <a href="" class="sa-nav__link" data-sa-collapse-trigger="">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-database"></i>
                                        </span>
                                        <span class="sa-nav__title">Catalog</span>
                                        <span class="sa-nav__arrow">
                                            <i class="fas fa-angle-left"></i>
                                        </span>
                                    </a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item">
                                            <a href="#" class="sa-nav__link">
                                                <span class="sa-nav__menu-item-padding"></span>
                                                <span class="sa-nav__title">Products List</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sa-app__sidebar-shadow"></div>
            <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
        </div>