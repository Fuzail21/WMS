{{-- THIS IS SIDE NAVIGATION BAR IT IS INCLUDE IN ALL PAGES EXCEPT LOGIN OR REGISTER --}}



<div class="sidebar" id="sidebar">

    <div class="user-account ">
        <img src="{{ asset('img/20-20-Logo-Color.png') }}" alt="logo" />
        <h4 id="sidebarTitle" class="text-center" style="font-size: 110%; font-weight: 700;">Warehouse Management System</h4>
    </div>

    <ul class="links">
        <h4>Main Menu</h4>


        <li>
            <span class="material-symbols-outlined">dashboard</span>
            {{-- <a class="icon" href="{{ url('/') }}"></a> --}}
            <a class="btn_text menu_btn_text" href="{{ url('/') }}">Dashboard</a>
        </li>


        <li>
            <span class="material-symbols-outlined">flag</span>
            {{-- <a class="icon" href="{{ route('reports') }}"><span class="material-symbols-outlined">flag</span></a> --}}
            <a class="btn_text menu_btn_text" href="{{ route('reports') }}">Reports</a>
        </li>


        <li>
            <span class="material-symbols-outlined">location_on</span>
            {{-- <a class="icon" href="{{ route('viewAllBranch') }}"><span class="material-symbols-outlined">location_on</span></a> --}}
            <a class="btn_text menu_btn_text" href="{{ route('viewAllBranch') }}"> Locations</a>
        </li>


        <li>
            <span class="material-symbols-outlined">add_location_alt</span>
            {{-- <a class="icon" href="{{ url('/add-branch') }}"><span class="material-symbols-outlined">add_location_alt</span></a> --}}
            <a class="btn_text menu_btn_text" href="{{ url('/add-branch') }}">Add New Location</a>
        </li>

        <li>
            <span class="material-symbols-outlined">add_circle</span>
            {{-- <a class="icon" href="{{ route('addracks') }}"><span class="material-symbols-outlined">add_circle</span></a> --}}
            <a class="btn_text menu_btn_text" href="{{ route('addracks') }}">Add New Rack</a>
        </li>


        @if(auth()->check() && auth()->user()->designation == 'Admin')
            <li>
                <span class="material-symbols-outlined">person_add</span>
                {{-- <a class="icon" href="{{ route('registerUser') }}"><span class="material-symbols-outlined">person_add</span></a> --}}
                <a class="btn_text menu_btn_text" href="{{ route('registerUser') }}">Register User</a>
            </li>
        @endif



        <li class="logout" onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
       <span class="material-symbols-outlined">logout</span>
             {{-- <a class="icon" href="{{ route('logout') }}"><span class="material-symbols-outlined">logout</span></a> --}}
            <a class="btn_text menu_btn_text" href="{{ route('logout') }}">Logout</a>

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


