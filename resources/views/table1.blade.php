<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script
     src="https://kit.fontawesome.com/5ee2cb3094.js"
     crossorigin="anonymous"
   ></script>
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
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/adminform">
            <i class='bx bx-box' ></i>
            <span class="links_name">Form</span>
          </a>
        </li>
        <li>
          <a href="/admintable">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Table</span>
          </a>
        </li>
        <li>
          <a href="/admintabledata">
            <i class='bx bx-list-ul' ></i>
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
                <table class="details" id="data_task">
                  <tr>
                    <th>name</th>
                    <th>points</th>
                    <th>description </th>
                    <th>Last date</th>
                    <th>Facebook Link</th>
                    <th>Instrageam Link</th>
                    <th>Twitter link</th>
                    <th>Linkedin link</th>

                  </tr>
                  
                  
                </table>
              </div>
              <div class="button">
                <a href="#">See All</a>
              </div>
            </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
<script>
  
                  fetch('/api/task').then(response=> response.json())
                  .then(res=>{
                    console.log(res)
                    res.map((data)=>{
                      let toinsert = document.createElement('tr');
                    toinsert.innerHTML = `<td>${data.name}</td>
                    <td>${data.points} </td>
                    <td>${data.description}</td>
                    <td>${data.lastDate}</td>
                    <td>${data.facebookLink}</td>
                    <td>${data.instagramLink}</td>
                    <td>${data.twitterLink}</td>
                    <td>${data.linkedinLink}</td>`
                    let element  = document.getElementById('data_task')
                    element.appendChild(toinsert)
                    })
                  })
</script>
</body>
</html>

