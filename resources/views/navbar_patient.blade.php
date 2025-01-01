<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
           {{-- @if(\Illuminate\Support\Facades\Auth::user()->is_admin == '1')--}}
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Control Panel Pages</div>

                    <a class="nav-link" href="/patient-panel">
                        <div class="nav-link-icon"><i class="fas fa-columns text-gray-200"></i></div>
                        Main Page
                    </a>

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr1" aria-expanded="false" aria-controls="collapseDashboardsr1">
                        <div class="nav-link-icon"><i class="fas fa-book-medical"></i></div>
                       Explore Medical Categories
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr1" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('patientsPanel.allCategories')}}">
                            All Categories

                            </a>
                         

                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr2" aria-expanded="false" aria-controls="collapseDashboardsr2">
                        <div class="nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                      My Schedules
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr2" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('patientsPanel.mySchedules')}}">
                            All My Schedules

                            </a>
                         

                        </nav>
                    </div>




        


                </div>

          {{--  @endif--}}

        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">patient name</div>
                <div class="sidenav-footer-title">{{auth()->user()->name}}</div>
            </div>
        </div>
    </nav>
</div>