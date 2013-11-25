<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
    <ul class="nav navbar-nav">
        <li <?php echo ($currentPage == "connect") ? 'class="active"' : '' ?> >
            <a href="./index.php?p=connect">Se connecter</a>
        </li>
        <li <?php echo ($currentPage == "register") ? 'class="active"' : '' ?>  >
            <a href="./index.php?p=register">S'enregister</a>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="../about">À propos</a>
        </li>
    </ul>
</nav>