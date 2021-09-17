<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5ee2cb3094.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus'></i>
            <span class="logo_name">E-cell
            </span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="/adminpanel" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/adminform">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Form</span>
                </a>
            </li>
            <li>
                <a href="/admintable">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Table</span>
                </a>
            </li>

            <li>
                <a href="/admintabledata">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Data</span>
                </a>
            </li>


        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>

            <div class="profile-details">
                <!--<img src="images/profile.jpg" alt="">-->
                <span class="admin_name">Aaditya Singh</span>
                <i class="fas fa-sign-out-alt"></i>
            </div>
        </nav>

        <div class="home-content">
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">CA data</div>
                    <div class="sales-details">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <!-- <th scope="col">#</th> -->
                                    <!-- <th scope="col">field</th>
                                    <th scope="col">data</th> -->
                                    <!-- <th scope="col">Handle</th> -->
                                </tr>
                            </thead>
                            <tbody id="data-task">


                            </tbody>
                        </table>

                    </div>
                    <div style="display: flex;"></div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const myParam = urlParams.get('ut_id');
        let table = document.getElementById("data-task");
        console.log(table);
        console.log(urlParams.get("ut_id"));
        fetch(`/api/uploadedTask/${myParam}`).then(response => response.json())
            .then(res => {
                console.log(res)
                res.map((data) => {
                    let toinsert = document.createElement('tbody');
                    toinsert.innerHTML = `
                    <div style="display: flex; height: 400px;">
            <div style="width: 50%;height: 100%;">
            <img src=${data.submittedTaskURL} alt="" style="height: 90%;width: 100%;" >
            <a href=${data.submittedTaskURL} > if it is not visible click here to see it</a>
            </div>
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: space-around;width: 50%;text-align: center;">
           <div>
            <h2 style="color:purple;">Task</h2>
            <h3>${data.name}</h3>
           </div>

           <div>
            <h2 style="color:purple;">Name</h2>
            <h3>${data.user_name}</h3>
           </div>

           <div>
            <h2 style="color:purple;">Points</h2>
            <h3>${data.points}</h3>
           </div>
           <div>
            <button type="button" class="btn btn-primary approve" data-id=${data.ut_id}>Approve</button>
           </div>
            
            </div>
        </div>`
                    table.append(toinsert);


                })
            });

            $(document).on('click','.approve', function(){
                console.log($(this).data("id"));
                let data = {}
                data['id'] = $(this).data("id");
                $.ajax({
                    type: "POST",
                    url: "/api/approve",
                    data :data,
                    success: (res)=>{
                        alert(res);
                    }
                })
            })

    </script>
</body>

</html>
