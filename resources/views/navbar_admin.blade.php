<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
           {{-- @if(\Illuminate\Support\Facades\Auth::user()->is_admin == '1')--}}
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Control Panel Pages</div>

                    <a class="nav-link" href="/admin">
                        <div class="nav-link-icon"><i class="fas fa-columns text-gray-200"></i></div>
                        Main Page
                    </a>

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr1" aria-expanded="false" aria-controls="collapseDashboardsr1">
                        <div class="nav-link-icon"><i class="fas fa-user-lock"></i></div>
                        Admins
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr1" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('admins.index')}}">
                                All Admins

                            </a>
                            <a class="nav-link" href="{{route('admins.create')}}">
                                New Admin

                            </a>

                        </nav>
                    </div>



                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr200" aria-expanded="false" aria-controls="collapseDashboardsr200">
                        <div class="nav-link-icon"><i class="fas fa-user-md"></i></div>
                        Doctors
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr200" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('doctors.index')}}">
                                All Doctors

                            </a>
                            <a class="nav-link" href="{{route('doctors.create')}}">
                                New Doctor

                            </a>

                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsrrr" aria-expanded="false" aria-controls="collapseDashboardsrrr">
                        <div class="nav-link-icon"><i class="fas fa-procedures"></i></div>
                        Patients
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsrrr" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('patients.index')}}">
                                All Patients

                            </a>
                            <a class="nav-link" href="{{route('patients.create')}}">
                                New Patient

                            </a>

                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr3" aria-expanded="false" aria-controls="collapseDashboardsr3">
                        <div class="nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                        Patients Registration Requests
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr3" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('admins.showPendingRegistrationRequests')}}">
                                All Requests

                            </a>
               

                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr399" aria-expanded="false" aria-controls="collapseDashboardsr399">
                        <div class="nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                        Doctors Registration Requests
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr399" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('admins.showPendingRegistrationRequestsDoctors')}}">
                                All Requests

                            </a>
               

                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr4" aria-expanded="false" aria-controls="collapseDashboardsr4">
                        <div class="nav-link-icon"><i class="fas fa-book-medical"></i></div>
                       Medical Categories
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr4" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('categories.index')}}">
                                All Categories

                            </a>

                            <a class="nav-link" href="{{route('categories.create')}}">
                                New Category

                            </a>
               

                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr5" aria-expanded="false" aria-controls="collapseDashboardsr5">
                        <div class="nav-link-icon"><i class="fas fa-user-tag"></i></div>
                       Specialties
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr5" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                 

                            <a class="nav-link" href="{{route('specialties.create')}}">
                                New Specialty

                            </a>
               

                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr6" aria-expanded="false" aria-controls="collapseDashboardsr6">
                        <div class="nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                       Doctor-Patient Meetings
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr6" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                 

                            <a class="nav-link" href="{{route('meetings.pending')}}">
                                Pending meetings

                            </a>

                            <a class="nav-link" href="{{route('meetings.approved')}}">
                                Approved meetings

                            </a>                  
                            <a class="nav-link" href="{{route('meetings.rejected')}}">
                                Rejected meetings

                            </a>

                            <a class="nav-link" href="{{route('meetings.finished')}}">
                                Finished meetings

                            </a>
               

                        </nav>
                    </div>


                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsr8" aria-expanded="false" aria-controls="collapseDashboardsr8">
                        <div class="nav-link-icon"><i class="fas fa-money-bill-wave"></i></div>
                       Invoices
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsr8" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('invoices.index')}}">
                                All Invoices

                            </a>

                            <a class="nav-link" href="{{route('invoices.create')}}">
                                New Invoice

                            </a>
               

                        </nav>
                    </div>


        




                 





                </div>

          {{--  @endif--}}

        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">admin name</div>
                <div class="sidenav-footer-title">{{auth()->user()->name}}</div>
            </div>
        </div>
    </nav>
</div>
