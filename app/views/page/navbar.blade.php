<div class="navbar navbar-inverse">
    <div class="navbar-inner">

        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="nav-collapse collapse">
            <ul class="nav">
                <li class="active">
                    <a href="{{ route('home') }}">
                        Articles
                    </a>
                </li>
                <li>
                    <a href="#">
                        Settings
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}">
                        API
                    </a>
                </li>
            </ul>
            <ul class="nav pull-right">
                <li>
                    <a href="#">
                        Comments
                        <span class="navbar-unread">3</span>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>