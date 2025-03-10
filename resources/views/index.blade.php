<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task Scheduler</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            .body-container {
                font-family: sans-serif;
                background-color: #1a202c;
            }

            .top-nav-container{
                margin: 15px;
                background-color: #1a202c;
                text-align: right;
                color: #a0aec0;
                font-size: 25px;
                display: flex;
                justify-content: flex-end;
                gap: 45px;
                font-weight: 600;
            }

            .top-nav-container div{
                margin-right: 25px;
            }
            .top-nav-container div:hover{
                text-decoration: underline;
            }

            .profile-button {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color:rgb(61, 74, 101);
                min-width: 200px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                right: 0; 
            }

            .dropdown-content a {
                color:rgb(182, 200, 223);
                font-size: 25px;
                padding: 12px 16px;
                display: block;
            }

            .dropdown-content a:hover {
                background-color:rgb(55, 69, 95);
            }

            .profile-button:hover .dropdown-content {
                display: block;
                text-decoration: none;
            }

            .task-body-container{
                display: grid;
                grid-template-columns: 80% 20%;
            }

            .task-display-container{
                background-color: #2d3748;
                border-radius: 15px;
                margin-left: 15px;
                margin-top: 25px;
                padding-top: 35px;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-template-rows: auto;
                position: relative;
            }

            .search-container{
                z-index: 100;
                position: absolute;
                padding: 30px;
                padding-left: 40px;
                padding-top: 40px;
            }

            .search-container input{
                min-width: 300px;
                background-color: #2d3748;
                color:rgb(182, 200, 223);
                font-size: 20px;
                border-bottom-width: 2px;
                border-color:rgb(182, 200, 223);
                min-width: 900px;
            }

            .task-display-container .individual-task-container{
                margin: 20px;
                padding: 10px;
                border-radius: 10px;
                border-color: #6b7280;
                border-width: 2px;
                max-width: 450px;
                background-color:rgb(46, 62, 90);
                overflow: hidden;
                font-family: monospace;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .task-display-container .individual-task-container .task-title{
                font-size: 30px;
                font-weight: 600;
                margin: 5px;
                color:rgb(207, 178, 214);
            }

            .task-display-container .individual-task-container .task-date{
                font-size: 20px;
                font-weight: 200;
                margin: 2px;
                color:rgb(210, 190, 214);
            }

            .task-display-container .individual-task-container .task-time{
                font-size: 19px;
                margin: 2px;
                color:rgb(210, 190, 214);
            }

            .task-display-container .individual-task-container .task-location{
                font-size: 17px;
                margin: 2px;
                color:rgb(210, 190, 214);
            }
            .task-display-container .individual-task-container .task-tag{
                font-size: 17px;
                margin: 2px;
                color:rgb(210, 190, 214);
            }

            .task-display-container .individual-task-container:hover{
                transform: translateY(5px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .task-detail-container{
                border-radius: 15px;
                margin-left: 15px;
                margin-top: 25px;
            }

            .task-detail-container .individual-task-detail{
                margin-right: 10px;
                padding: 10px;
                font-family: monospace;
            }

            .task-detail-container .individual-task-detail .task-title{
                font-size: 35px;
                font-weight: 600;
                margin: 5px;
                color:rgb(207, 178, 214);
            }

            .task-detail-container .individual-task-detail .task-date{
                font-size: 20px;
                font-weight: 200;
                margin: 5px;
                color:rgb(210, 190, 214);
            }

            .task-detail-container .individual-task-detail .task-time{
                font-size: 20px;
                font-weight: 200;
                margin: 5px;
                color:rgb(210, 190, 214);
            }

            .task-detail-container .individual-task-detail .task-location{
                font-size: 20px;
                font-weight: 200;
                margin: 5px;
                color:rgb(210, 190, 214);
            }

            .task-detail-container .individual-task-detail .task-tag{
                font-size: 20px;
                font-weight: 200;
                margin: 5px;
                color:rgb(210, 190, 214);
            }

            .task-detail-container .individual-task-detail .task-operation-container{
                margin: 5px;
                margin-top: 50px;
                display: flex;
                justify-content: flex-end;
                font-family: monospace;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .task-detail-container .individual-task-detail .task-operation-container .task-delete{
                border-radius: 10px;
                background-color:rgb(188, 53, 53);
                border-color:rgb(255, 96, 96);
                border-width: 2px;
                padding: 5px 15px 5px 15px;
                margin-right: 10px;
                font-size: 15px;
                min-width: 80px;
                text-align: center;
                color:rgb(245, 245, 245);
                font-weight: 700;
            }

            .task-detail-container .individual-task-detail .task-operation-container .task-delete:hover{
                transform: translateY(5px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .task-detail-container .individual-task-detail .task-operation-container .task-edit{
                border-radius: 10px;
                background-color:rgb(53, 188, 62);
                border-color:rgb(109, 255, 96);
                border-width: 2px;
                padding: 5px 15px 5px 15px;
                margin-right: 10px;
                font-size: 15px;
                min-width: 80px;
                text-align: center;
                color:rgb(245, 245, 245);
                font-weight: 700;
            }

            .task-detail-container .individual-task-detail .task-operation-container .task-edit:hover{
                transform: translateY(5px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .bottom-right-container{
                position: relative;
                width: 100%;
                height: 400px; /* Adjust as needed */
            }

            .add-new-task{
                position: absolute;
                bottom: 10px;
                right: 10px;
                padding: 10px 20px;
                margin-right: 20px;
                margin-bottom: 20px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .add-new-task:hover{
                transform: translateY(5px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('add-new-task-btn').addEventListener('click', function() {
                    window.location.href = '/addTask';
                });
            });

            // !!TODO: For logout
            // Get the element by its class name
            const logoutButton = document.querySelector('.logout-btn');

            // Add a click event listener
            logoutButton.addEventListener('click', function() {
                // Your logic here, for example:
                console.log('Logout button clicked');
                // logoutUser(); // Call your logout function
            });
        </script>
    </head>
    <body class="body-container">
        <!-- @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif -->
        <div class="top-nav-container">
            <div class="home-btn"><a href="/index">Home</a></div>
            <div class="aboutus-btn"><a href="/aboutus">About Us</a></div>
            <div class="profile-button">
                Profile
                <div class="dropdown-content">
                    <a href="/updateUsername">Update Username</a>
                    <a href="/updateEmail">Update Email</a>
                    <a href="/updatePassword">Update Password</a>
                    <div class="logout-btn"><a>Logout</a></div>
                </div>
            </div>
        </div>
        
        <div class="task-body-container">
            <div class="search-container">
                <input type="text" id="search-input" placeholder="Search...">
            </div>
            <div class="task-display-container">
                <div class="individual-task-container">
                    <div class="task-title">Family Dinner</div>
                    <div class="task-date">15 March 2024</div>
                    <div class="task-time">14:00</div>
                    <div class="task-location">Royal park, KL</div>
                    <div class="task-tag">Family</div>
                </div>
            </div>

            <div class="task-detail-container">
                <div class="individual-task-detail">
                    <div class="task-title">Task Title</div>
                    <div class="task-date">Task Date</div>
                    <div class="task-time">Task Time</div>
                    <div class="task-location">Task Location</div>
                    <div class="task-tag">Task Tag</div>

                    <div class="task-operation-container">
                        <div class="task-delete">Delete</div>
                        <div class="task-edit">Edit</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-right-container">
            <div class="add-new-task" id="add-new-task-btn">
                Add New Task
            </div>
        </div>
    </body>
</html>
