<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"></a>
            <a class="navbar-brand" href="<?= base_url("A") ?>">
                <b class="logo-icon p-l-5">
                    <i class="wi wi-sunset"></i>
                    <img src="<?= base_url("matrix/dist/images/logo-icon.png") ?>" alt="homepage" class="light-logo" />
                </b>
                <span class="logo-text">
                    <img src="<?= base_url("my_assets/images/pokego.png") ?>" alt="homepage" width="100%" height="50px" class="light-logo" />
                </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu font-24"></i>
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("A") ?>">
                        <span class="d-none d-md-block"><i class="mdi mdi-home font-20"></i> Home</span>
                        <span class="d-block d-md-none"><i class="mdi mdi-home font-20"></i> Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("A/accounts/new") ?>">
                        <span class="d-none d-md-block"><i class="mdi mdi-border-inside font-20"></i> Accounts</span>
                        <span class="d-block d-md-none"><i class="mdi mdi-border-inside font-20"></i> Accounts</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("Door") ?>">
                        <span class="d-none d-md-block"><i class="mdi mdi-open-in-app font-20"></i> Login</span>
                        <span class="d-block d-md-none"><i class="mdi mdi-open-in-app font-20"></i> Login</span>
                    </a>
                </li>
                <li class="nav-item search-box">
                    <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                        <span class="d-none d-md-block"><i class="mdi mdi-file-find font-20"></i> Search </span>
                        <span class="d-block d-md-none"><i class="mdi mdi-file-find font-20"></i> Search </span>
                    </a>
                    <form class="app-search position-absolute" method="get" action="<?= base_url("A/search_accounts") ?>">
                        <input type="text" class="form-control" name="find" placeholder="Search Account &amp; enter">
                        <a class="srh-btn"><i class="ti-close"></i></a>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>