<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
    data-accordion="false">
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-stack-exchange"></i>
            <p>
                جداول پایه
                <i class="right fa fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item mr-1">
                <a rel="BaseTables/States/States.php" class="nav-link ajax">
                    <i class="fa fa-assistive-listening-systems nav-icon"></i>
                    <p>استان ها</p>
                </a>
            </li>
            <li class="nav-item mr-1">
                <a rel="BaseTables/Cities/Cities.php" class="nav-link ajax">
                    <i class="fa fa-assistive-listening-systems nav-icon"></i>
                    <p>شهر ها</p>
                </a>
            </li>
            <li class="nav-item mr-1">
                <a rel="BaseTables/IconCenter/IconCenter.php" class="nav-link ajax">
                    <i class="fa fa-image nav-icon"></i>
                    <p>آیکون سنتر</p>
                </a>
            </li>
            <li class="nav-item mr-1">
                <a rel="BaseTables/Units/Units.php" class="nav-link ajax">
                    <i class="fa fa-dollar nav-icon"></i>
                    <p>واحد های محسابه</p>
                </a>
            </li>
            <li class="nav-item mr-1">
                <a rel="BaseTables/Shifts/Shifts.php" class="nav-link ajax">
                    <i class="fa fa-clock-o nav-icon"></i>
                    <p>شیفت ها</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="Actions/sign-out.php"
           class="nav-link">
            <i class="fa fa-circle-o nav-icon text-danger"></i>
            <p>خروج
            </p>
        </a>
    </li>
    <?php
    if ($DEVELOPMENT == true) {
        ?>
        <li class="nav-item">
            <a rel="Seeder/Seeder.fwTools.php"
               class="nav-link ajax">
                <i class="fa fa-times-circle-o nav-icon text-danger"></i>
                <p>DATA SEEDER
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a rel="QueryBuilder/QueryBuilder.fwTools.php"
               class="nav-link ajax">
                <i class="fa fa-times-circle-o nav-icon text-danger"></i>
                <p>QUERY BUILDER
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a rel="modelGenerator/modelGenerator.fwTools.php"
               class="nav-link ajax">
                <i class="fa fa-rectangle-o nav-icon text-danger"></i>
                <p>MODEL GENERATOR
                </p>
            </a>
        </li>
        <?php
    }
    ?>
</ul>
