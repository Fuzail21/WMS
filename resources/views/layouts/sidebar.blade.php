{{-- THIS IS SIDE NAVIGATION BAR IT IS INCLUDE IN ALL PAGES EXCEPT LOGIN OR REGISTER --}}



<div class="sidebar" id="sidebar">

    <div class="user-account ">
        <img src="{{ asset('img/20-20-Logo-Color.png') }}" alt="logo" />
        <h4 id="sidebarTitle" class="text-center" style="font-size: 110%; font-weight: 700;">Warehouse Management System
        </h4>
    </div>

    <ul class="links">
        <h4>Main Menu</h4>


        <li>
            <span class="material-symbols-outlined">dashboard</span>
            <a href="{{ url('/') }}">Dashboard</a>
        </li>

        <li>
            <span class="material-symbols-outlined">flag</span>
            <a href="{{ route('reports') }}">Reports</a>
        </li>

        {{-- <hr /> --}}
        {{-- <h4>Advanced</h4> --}}

        <li>
            <span class="material-symbols-outlined">location_on</span>
            <a href="{{ route('viewAllBranch') }}"> Locations</a>
        </li>

        {{-- <li>
            <span class="material-symbols-outlined">group</span>
            <a href="#">Developer </a>
        </li>

        <li>
            <span class="material-symbols-outlined">ambient_screen</span>
            <a href="#">Magic Build</a>
        </li>

        <li>
            <span class="material-symbols-outlined">pacemaker</span>
            <a href="#">Theme Maker</a>
        </li>

        <li>
            <span class="material-symbols-outlined">monitoring</span>
            <a href="#">Analytic</a>
        </li> --}}

        {{-- <hr /> --}}
        {{-- <h4>Account</h4> --}}

        <li>
            <span class="material-symbols-outlined">add_location_alt</span>
            <a href="{{ url('/add-branch') }}">Add New Location</a>
        </li>

        <li>
            <span class="material-symbols-outlined">add_circle</span>
            <a href="{{ route('addracks') }}">Add New Rack</a>
        </li>


        {{-- <li>
            <span class="material-symbols-outlined">mail</span>
            <a href="#">Message</a>
        </li>

        <li>
            <span class="material-symbols-outlined">settings</span>
            <a href="#">Settings</a>
        </li> --}}

        <li class="logout" onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
            <span class="material-symbols-outlined">logout</span>
            <a href="{{ route('logout') }}">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>

</div>



<script>
    // Function to toggle the visibility of the sidebar
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('sidebar-open'); // Add or remove a class to show/hide the sidebar
    }
</script>

<style>
    /* Add styles for the open sidebar */
    .sidebar-open {
        transform: translateX(0);
    }
</style>


