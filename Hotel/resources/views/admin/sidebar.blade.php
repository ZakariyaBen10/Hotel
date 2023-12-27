        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/home')}}">
                <div class="sidebar-brand-icon">
                    <img src="Hotel_logo.png" width="100%"/>
                </div>
                <div class="sidebar-brand-text mx-3">Hotels</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

           

            <!-- Nav Item - add rooms -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('add_room_view')}}">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Add Rooms</span></a>
            </li>

            <!-- Nav Item - booking -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('booking')}}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Booking</span></a>
            </li>

                <!-- Nav Item - manage rooms -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('rooms')}}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Room Management</span></a>
            </li>

                <!-- Nav Item - admin rights -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('users_rights')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User Rights</span></a>
            </li>


            <!-- Nav Item - Contact forms -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('contact_forms')}}">
                    <i class="fas fa-fw fa-phone"></i>
                    <span>Contact Forms</span></a>
            </li>


 <!-- Nav Item - FAQ's -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-question"></i>
                    <span>FAQ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->