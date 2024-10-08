<div class="navbar-header">
    <a href="index.html" class="navbar-brand">
        <span class="navbar-logo"></span> <b>Aqua</b>ReadPrO <img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/logo14.png" alt="" width="50" />
    </a>
    <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>


<div class="navbar-nav">
    <div class="navbar-item navbar-form">
        <form action="" method="POST" name="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar" />
                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="navbar-item dropdown">
        <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
            <i class="fa fa-bell"></i>
            <span class="badge">5</span>
        </a>
        <div class="dropdown-menu media-list dropdown-menu-end">
            <div class="dropdown-header">NOTIFICACIONES (5)</div>
            <a href="javascript:;" class="dropdown-item media">
                <div class="media-left">
                    <i class="fa fa-bug media-object bg-gray-500"></i>
                </div>
                <div class="media-body">
                    <h6 class="media-heading">Errores de servidor <i class="fa fa-exclamation-circle text-danger"></i></h6>
                    <div class="text-muted fs-10px">hace 3 minutos</div>
                </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
                <div class="media-left">
                <img src="<?php echo base_url('uploads/usersphoto/' . $this->session->userdata('foto')); ?>" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/usersphoto/perfil.jpg'); ?>';" width="50" height="50">
                    <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                </div>
                <div class="media-body">
                    <h6 class="media-heading">John Smith</h6>
                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                    <div class="text-muted fs-10px">25 minutes ago</div>
                </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
                <div class="media-left">
                <img src="<?php echo base_url('uploads/usersphoto/' . $this->session->userdata('foto')); ?>" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/usersphoto/perfil.jpg'); ?>';" width="50" height="50">
                    <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                </div>
                <div class="media-body">
                    <h6 class="media-heading">Olivia</h6>
                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                    <div class="text-muted fs-10px">35 minutes ago</div>
                </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
                <div class="media-left">
                    <i class="fa fa-plus media-object bg-gray-500"></i>
                </div>
                <div class="media-body">
                    <h6 class="media-heading"> New User Registered</h6>
                    <div class="text-muted fs-10px">1 hour ago</div>
                </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
                <div class="media-left">
                    <i class="fa fa-envelope media-object bg-gray-500"></i>
                    <i class="fab fa-google text-warning media-object-icon fs-14px"></i>
                </div>
                <div class="media-body">
                    <h6 class="media-heading"> New Email From John</h6>
                    <div class="text-muted fs-10px">2 hour ago</div>
                </div>
            </a>

            <div class="dropdown-footer text-center">
                <a href="javascript:;" class="text-decoration-none">View more</a>
            </div>
        </div>
    </div>
    <div class="navbar-item navbar-user dropdown">
        <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
        <img src="<?php echo base_url('uploads/usersphoto/' . $this->session->userdata('foto')); ?>" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/usersphoto/perfil.jpg'); ?>';" width="50" height="50">
            <span>
                <span class="d-none d-md-inline"><?php echo $this->session->userdata('nickName'); ?></span>
                <b class="caret"></b>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end me-1">
            <a href="<?php echo base_url(); ?>index.php/crudusers/editarperfil" class="dropdown-item">Editar Perfil</a>
            <a href="javascript:;" class="dropdown-item"><span class="badge bg-danger float-end rounded-pill">3</span> Mensajes</a>
            <a href="javascript:;" class="dropdown-item">Calendario</a>
            <a href="javascript:;" class="dropdown-item">Configuraciones</a>
            <div class="dropdown-divider"></div>

            <a href="javascript:;" id="showAlert" data-bs-toggle="modal" data-bs-target="#modal-dialog" class="dropdown-item">Cerrar sesion</a>
        </div>
    </div>
</div>

</div>





<!-- MENU SIDEBAR -->
<div id="sidebar" class="app-sidebar">

    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
            <div class="menu-profile">
                <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                    <div class="menu-profile-cover with-shadow"></div>
                    <div class="menu-profile-image">
                    <img src="<?php echo base_url('uploads/usersphoto/' . $this->session->userdata('foto')); ?>" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/usersphoto/perfil.jpg'); ?>';">
                    </div>
                   
                        
                    <div class="menu-profile-info">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <?php echo ($this->session->userdata('nombre')) . " " . $this->session->userdata('primerApellido') . " " . $this->session->userdata('segundoApellido'); ?>
                            </div>
                            <div class="menu-caret ms-auto"></div>
                        </div>
                        <small>
                            
                            <?php if ($this->session->userdata('rol') == 0) : ?>
                                Socio
                            <?php elseif ($this->session->userdata('rol') == 1) : ?>
                                Auxiliar
                            <?php else : ?>
                                Administrador
                            <?php endif; ?>

                        </small>
                    </div>
                </a>
            </div>
            <div id="appSidebarProfileMenu" class="collapse">
                <div class="menu-item pt-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-cog"></i></div>
                        <div class="menu-text">Configuraciones</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                        <div class="menu-text"> Enviar mensajes</div>
                    </a>
                </div>
                <div class="menu-item pb-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                        <div class="menu-text"> Ayuda</div>
                    </a>
                </div>
                <div class="menu-divider m-0"></div>
            </div>
            <div class="menu-header">Navigation</div>

            <div class="menu-item has-sub active">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-th-large"></i>
                    </div>
                    <div class="menu-text">Reportes</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="<?php echo base_url(); ?>index.php/usuario/panel" class="menu-link">
                            <div class="menu-text">Ver Reportes</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-item has-sub">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <div class="menu-text">Usuarios</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item active">
                        <a href="<?php echo base_url(); ?>index.php/crudusers/habilitados" class="menu-link">
                            <div class="menu-text">Gestionar Usuarios</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-text">Gestionar Socios</div>
                            <!-- <div class="menu-caret"></div> -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-map"></i>
                    </div>
                    <div class="menu-text">Geolocalización</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item active">
                        <a href="<?php echo base_url(); ?>index.php/geodatalogger/geolocalizar" class="menu-link">
                            <div class="menu-text">Vista general</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="map_google.html" class="menu-link">
                            <div class="menu-text">GPS</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="menu-text">Avizos de cobranza</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item active">
                        <a href="email_system.html" class="menu-link">
                            <div class="menu-text">Gestionar Avizos</div>
                        </a>
                    </div>
                    <!-- <div class="menu-item">
                        <a href="email_newsletter.html" class="menu-link">
                            <div class="menu-text">Newsletter Template</div>
                        </a>
                    </div> -->
                </div>
            </div>
            <div class="menu-item has-sub">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-list-ol"></i>
                    </div>
                    <div class="menu-text">Lecturas</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item active">
                        <a href="form_elements.html" class="menu-link">
                            <div class="menu-text">Gestionar lecturas<i class="fa fa-paper-plane text-theme"></i></div>
                        </a>
                    </div>
                    <!-- <div class="menu-item">
                        <a href="form_plugins.html" class="menu-link">
                            <div class="menu-text">Form Plugins <i class="fa fa-paper-plane text-theme"></i></div>
                        </a>
                    </div> -->
                </div>
                <div class="menu-item">
                    <a href="<?php echo base_url(); ?>index.php/datalogger/habilitados" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-gift"></i>
                        </div>
                        <div class="menu-text">Datalogger</div>
                    </a>
				</div>
                <div class="menu-item">
                    <a href="widget.html" class="menu-link">
                        <div class="menu-icon">
                            <i class="fab fa-simplybuilt"></i>
                        </div>
                        <div class="menu-text">Medidores</div>
                    </a>
				</div>
            </div>
            <div class="menu-item d-flex">
                <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
            </div>

        </div>

    </div>

</div>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
<!-- END MENU SIDEBAR -->