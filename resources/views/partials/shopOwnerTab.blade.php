<div class="container TabContainer">
    <div class="TabContainer__TabNav">
        <div class="TabContainer__MobileTabNav">
            <h1>Menue</h1><i onclick="showMenu()" class="bi bi-list"></i>
        </div>

        <div id="mynavItems" class="TabContainer__TabNav--mobile js-hide">
            <a class="Tab {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"><i
                    class="bi bi-house-door-fill"></i> Home</a>
            <a class="Tab {{ Request::routeIs('shopowner.document') ? 'active' : '' }}"
                href="{{ route('shopowner.document') }}"><i class="bi bi-download"></i>Documents</a>
                <a class="Tab {{ Request::routeIs('shopowner.addMoney') ? 'active' : '' }}"
                href="{{ route('shopowner.addMoney') }}"><i class="bi bi-cash"></i>Add Money</a>
                 <a class="Tab {{ Request::routeIs('shopowner.deductMoney') ? 'active' : '' }}"
                href="{{ route('shopowner.deductMoney') }}"><i class="bi bi-cash "></i>Deduct Money</a>
        </div>
    </div>
</div>
