<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('personal.main.index')}}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <p>
                        Головна сторінка
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.liked.index')}}" class="nav-link">
                    <i class="far fa-heart"></i>
                    <p>
                        Вподобані пости
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.comments.index')}}" class="nav-link">
                    <i class="far fa-comment"></i>
                    <p>
                        Коментарі
                    </p>
                </a>
            </li>
        </ul>
    </div>
</aside>
