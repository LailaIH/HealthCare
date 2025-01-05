<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
           {{-- @if(\Illuminate\Support\Facades\Auth::user()->is_admin == '1')--}}
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Control Panel Pages</div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr1" aria-expanded="false" aria-controls="collapseDashboardsr1">
                        <div class="nav-link-icon"><i class="fas fa-clock"></i></div>
                        Schedules
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr1" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="#">
                                My Scheduals

                            </a>
                            <a class="nav-link" href="#">
                                New Schedual

                            </a>

                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr2" aria-expanded="false" aria-controls="collapseDashboardsr2">
                        <div class="nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                        Requested Appointments
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr2" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="#">
                                All Requested Appointments

                            </a>
               

                        </nav>
                    </div>

             

                    <!-- accepted ones that are finished or upcoming -->

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr3" aria-expanded="false" aria-controls="collapseDashboardsr3">
                        <div class="nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                        Patients Appointments
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr3" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('admins.showPendingRegistrationRequests')}}">
                                All Patients Appointmentss

                            </a>
               

                        </nav>
                    </div>


        




                 





                </div>

          {{--  @endif--}}

        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">doctor name</div>
                <div class="sidenav-footer-title">{{auth()->user()->name}}</div>
            </div>
        </div>
    </nav>
</div>