<aside>
    <div id="mynavItems" class="TabContainer__TabNav--mobile js-hide sidebar">
        {{-- <a onclick="showTabContent(event, 'myHomeContent');showMenu()" class="Tab active" href="#"><i class="bi bi-house-door-fill"></i><span>Home</span></a> --}}
        <a class="Tab {{ Request::routeIs('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}"><i
                class="bi bi-house-door-fill"></i><span>Home</span></a>
        {{-- <a onclick="showTabContent(event, 'myShopOwnersApprovalContent');showMenu()" class="Tab" href="#"><i class="bi bi-bag-fill"></i><span>Shop Owners to approve</span></a> --}}
        <a class="Tab {{ Request::routeIs('admin.shop.to.approve') ? 'active' : '' }}"
            href="{{ route('admin.shop.to.approve') }}"><i class="bi bi-bag-fill"></i><span>Shop Owners to
                approve</span></a>
        {{-- <a onclick="showTabContent(event, 'myUsersContent');showMenu()" class="Tab " href="#"><i class="bi bi-people-fill"></i><span> Users</span></a> --}}
        <a class="Tab {{ Request::routeIs('admin.users') ? 'active' : '' }}" href="{{ route('admin.users') }}"><i
                class="bi bi-people-fill"></i><span> Users</span></a>
        {{-- <a onclick="showTabContent(event, 'myShopOwnerContent');showMenu()" class="Tab" href="#"><i class="bi bi-bag-fill"></i><span>Shop Owner</span></a> --}}
        <a class="Tab {{ Request::routeIs('admin.shop.owner') ? 'active' : '' }}"
            href="{{ route('admin.shop.owner') }}"><i class="bi bi-bag-fill"></i><span>Shop Owner</span></a>
    </div>

</aside>
