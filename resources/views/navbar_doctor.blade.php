<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
           {{-- @if(\Illuminate\Support\Facades\Auth::user()->is_admin == '1')--}}
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Control Panel Pages</div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr2" aria-expanded="false" aria-controls="collapseDashboardsr2">
                        <div class="nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                        Requested Appointments
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr2" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('doctorsPanel.pendingRequests')}}">
                                Pending Requests

                            </a>
               

                        </nav>
                    </div>

             




        
                    <a class="nav-link" href="{{route('doctorsPanel.approvedRequests')}}">
                        <div class="nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                        Accepted meeting requests
                    </a>

                    <a class="nav-link" href="{{route('doctorsPanel.rejectedRequests')}}">
                        <div class="nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                        Rejected meeting requests
                    </a>


                    <a class="nav-link" href="{{route('doctorsPanel.finishedRequests')}}">
                        <div class="nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                        Finished meetings
                    </a>

                    <a class="nav-link" href="{{route('doctorsPanel.myPatients')}}">
                        <div class="nav-link-icon"><i class="fas fa-hospital-user"></i></div>
                        My Patients
                    </a>


                 

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr4" aria-expanded="false" aria-controls="collapseDashboardsr4">
                        <div class="nav-link-icon"><i class="fas fa-user"></i></div>
                      My Profile Information
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr4" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('doctorsPanel.editMyInformation')}}">
                            Update my Information

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