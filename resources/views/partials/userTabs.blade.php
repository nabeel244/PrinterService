<div class="TabContainer__TabNav">
    <div id="mynavItems" class="TabContainer__TabNav--mobile">
        <a  id="home-tab" class="Tab {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"><i
                class="bi bi-house-door-fill"></i> Home</a>
        <a  id="upload-tab" class="Tab {{ Request::routeIs('user.upload') ? 'active' : '' }}" href="{{ route('user.upload') }}"><i
                class="bi bi-upload"></i> Upload</a>
        <a class="Tab {{ Request::routeIs('user.file.status') ? 'active' : '' }}" href="{{ route('user.file.status') }}"><i class="bi bi-play-fill"></i>File Status</a>
    </div>
</div>
