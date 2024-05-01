<nav id="sidebarMenu" class="col-md-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link{{ request()->route()->named('admin.index') ? ' active' : '' }}" href="{{ route('admin.index') }}"><span data-feather="home"></span>このサイトの使い方</a>
      </li>
      <li class="nav-item">
        <a class="nav-link{{ request()->route()->named('admin.saunas.*') ? ' active' : '' }}" href="{{ route('admin.saunas.index') }}"><span data-feather="umbrella"></span> 行ったことあるサウナ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link{{ request()->route()->named('admin.plans.*') ? ' active' : '' }}" href="{{ route('admin.plans.index') }}"><span data-feather="wind"></span> 行きたいサウナ</a>
      </li>
    </ul>
  </div>
</nav>