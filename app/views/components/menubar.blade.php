<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle&nbsp;navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
          <a class="navbar-brand" href="/">Gallery</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a class="navbar-create-album" href="{{ URL::route('albums.create') }}"><i class="fa fa-plus"></i>&nbsp;Album</a></li>
                @if (!empty($album) && !empty($isAlbumCreator))
                    <li><a class="btn-add-photo" href="{{ URL::route('albums.photos.create', [$album->getKey()]) }}"><i class="fa fa-plus"></i>&nbsp;Photos</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (!empty($album) && !empty($isAlbumCreator))
                    <li><a href="{{ URL::route('albums.api.settings', [$album->getKey()]) }}" id="album-settings"><i class="fa fa-cog"></i>&nbsp;Album Settings</a></li>
                @endif
                <li><a href="{{ URL::route('users.logout') }}">Logout&nbsp;<i class="fa fa-sign-out"></i></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
