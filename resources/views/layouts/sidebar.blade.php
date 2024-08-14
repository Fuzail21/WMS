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


        @if(auth()->check() && auth()->user()->designation == 'Admin')
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






    document.addEventListener('DOMContentLoaded', function () {
    var sidebar = document.getElementById('sidebar');
    var links = document.querySelectorAll('.sidebar a');

    // Function to toggle the visibility of the sidebar
    function toggleSidebar() {
        sidebar.classList.toggle('sidebar-open');
    }

    // Handle sidebar clicks
    sidebar.addEventListener('click', function(event) {
        // Check if the click is not on a link (this ensures only the sidebar toggles)
        if (!event.target.closest('a')) {
            toggleSidebar();
        }
    });

    // Function to handle link clicks
    function handleLinkClick(event) {
        if (!sidebar.classList.contains('sidebar-open')) {
            event.preventDefault(); // Prevent the default link action
            // alert('Sidebar must be open to use this link.');
            toggleSidebar();
            return false;
        }
    }

    // Attach the handleLinkClick function to each link
    links.forEach(function(link) {
        link.addEventListener('click', handleLinkClick);
    });

    document.addEventListener('click', function(event) {
        // Check if the click happened outside the sidebar
        if (!sidebar.contains(event.target) && sidebar.classList.contains('sidebar-open')) {
            sidebar.classList.remove('sidebar-open');
        }
    });
});

</script>

<style>
    /* Add styles for the open sidebar */
    .sidebar-open {
        transform: translateX(0);
    }
</style>


