<?php session_start();?>
<header class="header">
    <div class="header__container">
        <a href="#" class="header__logo"></a>
        <div class="header__menu menu">
            <div class="menu__icon">
                <span></span>
            </div>
            <nav class="menu__body">
                <ul class="menu__list">
                    <li>
                        <a href="#" class="menu__link">Можливості</a>
                        <span class="menu__arrow"></span>
                        <ul class="menu__sub-list">
                            <?php if($_SESSION['user']!= null){
                      echo '<li>
                      <span class="menu__sub-link span-akaunt">Акаунт</span>
                      </li>';  
                    }else{
                        echo '';
                    }
                    ?>
                             </li>
                            <?php if($_SESSION['user']!=null){
                      echo '<li>
                      <a href="modules/Admin-tur.php" class="menu__sub-link">Заявки</a>
                      </li>';  
                    }else{
                        echo '';
                    }
                    ?>
                    <li><?php if($_SESSION['user']['lvl_Dostup']== 1){
                      echo '<a href="modules/NewTur.php" class="menu__sub-link">Створити тур</a></li>';  
                    }
                    ?>
                        </ul>
                    </li>
                    <!-- <li><a href="" class="menu__link">Про нас</a></li> -->
                    <li><a href="modules/magaz.php" class="menu__link">Магазин</a></li>
                    <li><?php if($_SESSION['user']!= null){
                      echo '<a href="modules/logout.php" class="menu__link">Вихід</a></li>';  
                    }else{
                        echo '<a href="modules/Authorization.php" class="menu__link">Вхід</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>