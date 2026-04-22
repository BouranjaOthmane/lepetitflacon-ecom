<!-- Header -->
<header class="dashboard-header">
    <div class="header__left">

        <!-- Notifications Dropdown -->
        <div class="notifications-dropdown">
            <button class="header__btn" title="Notifications" id="notifBtn">
                <i class="fas fa-bell"></i>
                @if (isset($unreadNotificationsCount) && $unreadNotificationsCount > 0)
                    <span class="count-badge" id="notifCount">{{ $unreadNotificationsCount }}</span>
                @endif
            </button>
            <div class="dropdown-menu" id="notifMenu">
                <div class="dropdown-header">
                    <span>Notifications</span>
                    <a href="#" onclick="markAllAsRead(event)">Tout marquer comme lu</a>
                </div>
                <div class="dropdown-body" id="notifList">
                    <div class="notif-loading">Chargement...</div>
                </div>
                <div class="dropdown-footer">
                    <a href="{{ route('admin.notifications.all') }}">Voir toutes les notifications</a>
                </div>
            </div>
        </div>

  
    </div>
    <div class="header__right">
        <button class="mobile-toggle" id="mobileToggle"><i class="fas fa-bars"></i></button>
        <div class="header__title">
            <h1>@yield('page_title', 'Vue d’ensemble')</h1>
            <p>@yield('page_subtitle', 'Bon retour, voici un aperçu rapide de votre journée.')</p>
        </div>
    </div>

</header>
