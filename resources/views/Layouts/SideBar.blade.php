<div class="templatemo-sidebar">

    <header class="templatemo-site-header">

    </header>

    <div class="profile-photo-container" align="center">
        <img src="{{asset('images/'.$utilisateur->image_name)}}" alt="{{$utilisateur->nom}}" class="img-circle img-thumbnail" style="height: 200px;width: 200px">
        <div class="profile-photo-overlay"></div>
    </div>
    <!-- Search box -->
    <form class="templatemo-search-form" role="search">
        <div class="input-group">
            <button type="submit" class="fa fa-search"></button>
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
        </div>
    </form>
    <div class="mobile-menu-icon">
        <i class="fa fa-bars"></i>
    </div>
    <nav class="templatemo-left-nav">
        <ul>
            <li><a href="/dashboard" class="active"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
            <li><a href="/utilisateurs"><i class="fa fa-user fa-fw"></i>Utilisateurs</a></li>
            <li><a href="/showrooms"><i class="fa fa-tags fa-fw"></i>Showrooms</a></li>
            <li><a href="/categories"><i class="fa fa-tags fa-fw"></i>Categories</a></li>
            <li><a href="/produits"><i class="fa fa-tags fa-fw"></i>Produits</a></li>
            <li><a href="/commandes"><i class="fa fa-cart-arrow-down fa-fw"></i>Commandes</a></li>
            <li><a href="/messages"><i class="fa fa-envelope fa-fw"></i>Messages</a></li>
            <li><a href="/coupons"><i class="fa fa-gift fa-fw"></i>Coupons</a></li>

            <li>  <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form></li>
        </ul>
    </nav>
</div>
