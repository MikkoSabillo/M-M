<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/css/sidebars.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        min-height: 100vh;
        display: grid;
        grid-template-columns: 300px 1fr;
        grid-template-rows: auto 1fr auto;
        grid-template-areas:
            "sidebar Navbar"
            "sidebar main"
            "sidebar footer";
    }

    nav {
        top: 0;
        position: sticky;
        grid-area: Navbar;
        padding: 1em;
        padding-bottom: 0;
        align-items: center;
        
        box-shadow: 0px 0px 5px #333;
    }

    aside,
    .flex-shrink-0 {
        height: 100vh;
        top: 0;
        position: sticky;
        align-self: start;
        grid-area: sidebar;
        background-color: rgb(255, 255, 255);
    }

    main {
        grid-area: main;

    }

    footer {
        grid-area: footer;
        background-color: black;
        color: white;
        padding: 2em;
    }

    .btn1 {
        display: none;
    }

    .s1 {
        padding-top: 10px;
        padding-bottom: 0%;
        padding-left: 7px;
    }

    .four-grids {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin: 40px 0;
    }

    .four-agileits,
    .four-agileinfo,
    .four-wthree,
    .four-w3ls {
        background: linear-gradient(135deg, #fdfdfd, #eef9ff);
        border-radius: 14px;
        width: 30vh;
        padding: 25px 20px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    .four-agileits:hover,
    .four-agileinfo:hover,
    .four-wthree:hover,
    .four-w3ls:hover {
        background: linear-gradient(135deg, #d0f0ff, #c0eaff);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
    }

    .icon i {
        font-size: 38px;
        color: #007bff;
        margin-bottom: 12px;
        transition: color 0.3s ease;
    }

    .four-agileits:hover .icon i,
    .four-agileinfo:hover .icon i,
    .four-wthree:hover .icon i,
    .four-w3ls:hover .icon i {
        color: #0056b3;
    }

    .four-text h3 {
        font-size: 20px;
        margin: 10px 0 5px;
        color: #333;
        font-weight: 600;
    }

    .four-text h4 {
        font-size: 28px;
        color: #007bff;
        font-weight: bold;
        text-shadow: 0 0 6px rgba(0, 123, 255, 0.25);
    }


    @media(max-width: 800px) {
        body {
            grid-template-columns: 1fr;
        }

        .btn1 {
            display: block;
        }

        aside {
            height: 100vh;
            position: fixed;
            width: 300px;
            display: none;
        }

        .show {
            display: block;
        }
    }
</style>

<body>
    <nav>
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4" class="bg-light p-1 m-3">
            <h1><a href="dashboard.php" class="text-decoration-none text-dark">Car Wash Management System</a></h1>
            <button class="btn1 btn btn-primary" onclick="toggleSidebar()"><span class="fa fa-bars"></button>
        </div>

    </nav>
    <aside id="sidebar">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 300px;"> <a href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg
                    class="bi pe-none me-2" width="40" height="32" aria-hidden="true">
                    <use xlink:href="#bootstrap"></use>
                </svg> <span class="fs-4">Sidebar</span> </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-5">
                <li class="nav-item"> <a href="#" class="nav-link active" aria-current="page">
                        Home
                    </a> </li>
                <li> <a href="#" class="nav-link text-white">
                        Dashboard
                    </a> </li>
                <li> <a href="#" class="nav-link text-white">
                        Orders
                    </a> </li>
                <li> <a href="#" class="nav-link text-white">
                        Products
                    </a> </li>
                <li> <a href="#" class="nav-link text-white">
                        Customers
                    </a> </li>
            </ul>
            <hr>
            <div class="dropdown"> <a href="#"
                    class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt=""
                        width="32" height="32" class="rounded-circle me-2"> <strong>mdo</strong> </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="../views/logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </aside>