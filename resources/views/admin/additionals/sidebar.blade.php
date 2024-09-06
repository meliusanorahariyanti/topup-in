<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li> <a class="waves-effect waves-dark" href="/admin/home" aria-expanded="false"><i
          class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
        </li>
        @if (Auth::user()->role_id == 1)
          <li> <a class="waves-effect waves-dark" href="/admin/user" aria-expanded="false"><i
            class="fa fa-user-circle-o"></i><span class="hide-menu">Users</span></a>
          </li>
          <li> <a class="waves-effect waves-dark" href="/admin/role" aria-expanded="false"><i
            class="fa fa-table"></i><span class="hide-menu">Roles</span></a>
          </li>
          <li> <a class="waves-effect waves-dark" href="/admin/genre" aria-expanded="false"><i
            class="fa fa-smile-o"></i><span class="hide-menu">Genres</span></a>
          </li>
          <li> <a class="waves-effect waves-dark" href="/admin/gametype" aria-expanded="false"><i
            class="fa fa-globe"></i><span class="hide-menu">Game Types</span></a>
          </li>
        @endif
        <li> <a class="waves-effect waves-dark" href="/admin/game" aria-expanded="false"><i
          class="fa fa-bookmark-o"></i><span class="hide-menu">Games</span></a>
        </li>
        <li> <a class="waves-effect waves-dark" href="/admin/credit" aria-expanded="false"><i
          class="fa fa-question-circle"></i><span class="hide-menu">Credits</span></a>
        </li>
        <li> <a class="waves-effect waves-dark" href="/admin/transaction" aria-expanded="false"><i
          class="fa fa-book"></i><span class="hide-menu">Transactions</span></a>
        </li>
      </ul>
      <div class="text-center mt-4">
        <form action="/logout" method="post" onsubmit="return confirm('Apakah anda yakin akan keluar aplikasi?')">
          @csrf
          <button type="submit" class="btn waves-effect waves-light btn-info hidden-md-down text-white">Logout</button>
        </form>
        
      </div>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>