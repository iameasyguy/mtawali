<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('SIP') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Account') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse " id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
              @can('add_users','edit_users', 'delete_users')
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('users.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
                  @endcan
              @can('add_roles','edit_roles', 'delete_roles')
              <li class="nav-item{{ $activePage == 'roles-management' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('roles.index') }}">
                      <span class="sidebar-mini"> RM </span>
                      <span class="sidebar-normal"> {{ __('Roles & Permissions') }} </span>
                  </a>
              </li>
                  @endcan
          </ul>
        </div>
      </li>
        @can('add_clients','edit_clients', 'delete_clients')
      <li class="nav-item{{ $activePage == 'client-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('clients.index') }}">
          <i class="material-icons">assignment_ind</i>
            <p>{{ __('Clients Management') }}</p>
        </a>
      </li>
        @endcan

        <li class="nav-item {{ ($activePage == 'personnel' || $activePage == 'personnel-management') ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#personnel" aria-expanded="true">
                <i class="material-icons">contacts</i>
                <p>3<sup>rd</sup> Parties Mngt
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse " id="personnel">
                <ul class="nav">
                    @can('add_installers','edit_installers', 'delete_installers')
                    <li class="nav-item{{ $activePage == 'pi-management' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('installers.index') }}">
                            <span class="sidebar-mini"> PI </span>
                            <span class="sidebar-normal">{{ __('Project Installers') }} </span>
                        </a>
                    </li>
                    @endcan
                    @can('add_personels','edit_personels', 'delete_personels')
                        <li class="nav-item{{ $activePage == 'personnel-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('personels.index') }}">
                                <span class="sidebar-mini"> 3PM </span>
                                <span class="sidebar-normal"> {{ __('Personnel Management') }} </span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </div>
        </li>
        @can('add_projects','edit_projects', 'delete_projects')
            <li class="nav-item{{ $activePage == 'project-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('projects.index') }}">
                    <i class="material-icons">assignment_ind</i>
                    <p>{{ __('Project Management') }}</p>
                </a>
            </li>
        @endcan
    </ul>
  </div>
</div>
