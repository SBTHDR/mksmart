<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
{{--        <li class="nav-item nav-profile">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <div class="profile-image">--}}
{{--                    <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face8.jpg') }}" alt="profile image">--}}
{{--                    <div class="dot-indicator bg-success"></div>--}}
{{--                </div>--}}
{{--                <div class="text-wrapper">--}}
{{--                    <p class="profile-name">Allen Moreno</p>--}}
{{--                    <p class="designation">Admin</p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="nav-item nav-category">MKSMart | Main Menu</li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.products') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Manage Products</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.product.create') }}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Create Product</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.categories') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Manage Category</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.category.create') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Create Category</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.brands') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Manage Brand</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.brand.create') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Create Brand</span>
            </a>
        </li>        

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.divisions') }}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Manage Division</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.division.create') }}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Create Division</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.districts') }}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Manage District</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.district.create') }}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Create District</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Shop</span>
            </a>
        </li>

    </ul>
</nav>
