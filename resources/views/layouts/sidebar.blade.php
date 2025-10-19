<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-balance-scale"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LegalMindAI</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('new.case') }}">
            <i class="fas fa-folder-plus"></i>
            <span>New Case</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('view.cases') }}">
            <i class="fas fa-folder-open"></i>
            <span>View Cases</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('ai.guidance') }}">
            <i class="fas fa-brain"></i>
            <span>AI Legal Guidance</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

</ul>
