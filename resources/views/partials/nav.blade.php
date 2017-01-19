<div class="ui menu stackable">
    <div class="header item">
        PMBook
    </div>
    <a class="item" href="{{url('/project')}}">
        Project
    </a>
    <a class="item">
        Users
    </a>
    <a class="item">
        Collection
    </a>
    <div class="right menu">
        <div class="ui right item">
           <i class="fa fa-bell-o nav-icon" aria-hidden="true"></i>
           Notification
           <a class="ui orange circular label corner-fix">2</a>
        </div>
        <a href="{{ url('/logout') }}" class="ui right item">
           <i class="fa fa-sign-out nav-icon" aria-hidden="true"></i>
           Logout
       </a>
    </div>
</div>
