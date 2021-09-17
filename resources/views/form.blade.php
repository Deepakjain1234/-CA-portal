<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
        <link rel="stylesheet" href="/css/style.css" />
        <!-- Boxicons CDN Link -->
        <link
            href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
            rel="stylesheet"
        />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script
            src="https://kit.fontawesome.com/5ee2cb3094.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
        <div class="sidebar">
            <div class="logo-details">
                <i class="bx bxl-c-plus-plus"></i>
                <span class="logo_name">E-cell </span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="/adminpanel" >
                        <i class="bx bx-grid-alt"></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/adminform">
                        <i class="bx bx-box"></i>
                        <span class="links_name">Form</span>
                    </a>
                </li>
                <li>
                    <a href="/admintable" class="active">
                        <i class="bx bx-list-ul"></i>
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
                    <i class="bx bx-menu sidebarBtn"></i>
                    <span class="dashboard">Dashboard</span>
                </div>

                <div class="profile-details">
                    <!--<img src="images/profile.jpg" alt="">-->
                    <span class="admin_name">Aaditya Singh</span>
                    <i class="fas fa-sign-out-alt"></i>
                </div>
            </nav>

            <div class="home-content">
                <div class="form-dashboard">
                    <form action="">
                        <div class="form-item">
                            <label for="name">Name:</label>
                            <input
                                type="text"
                                id="name"
                                placeholder="Enter the name "
                                name="name"
                            />
                        </div>
                        <div class="form-item">
                            <label for="points">Points:</label>
                            <input
                                type="number"
                                id="points"
                                placeholder="Enter points "
                                name="points"
                            />
                        </div>
                        <div class="form-item">
                            <label for="Discription">Discription</label>
                            <input
                                type="text"
                                id="Discription"
                                placeholder="Discription"
                                name="Discription"
                            />
                        </div>
                        <div class="form-item">
                            <label for="date">Last date:</label>
                            <input
                                type="date"
                                id="date"
                                placeholder="Select Last date"
                                name="date"
                            />
                        </div>
                        <div class="form-item">
                            <label for="flink">Facebook link:</label>
                            <input
                                type="text"
                                id="flink"
                                placeholder="Enter Facebook Link"
                                name="flink"
                            />
                        </div>
                        <div class="form-item">
                            <label for="ilink">Instagram link:</label>
                            <input
                                type="text"
                                id="ilink"
                                placeholder="Enter Instagram Link"
                                name="ilink"
                            />
                        </div>

                        <div class="form-item">
                            <label for="tlink">Twitter Link:</label>
                            <input
                                type="text"
                                id="tlink"
                                placeholder="Enter Twitter Link"
                                name="tlink"
                            />
                        </div>
                        <div class="form-item">
                            <label for="llink">Linkedin Link:</label>
                            <input
                                type="text"
                                id="llink"
                                placeholder="Enter Linkedin Link"
                                name="tlink"
                            />
                        </div>
                        <input
                            class="submit-btn"
                            type="submit"
                            value="Submit"
                        />
                    </form>
                </div>
            </div>
        </section>

        <script>
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function () {
                sidebar.classList.toggle("active");
                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.replace(
                        "bx-menu",
                        "bx-menu-alt-right"
                    );
                } else
                    sidebarBtn.classList.replace(
                        "bx-menu-alt-right",
                        "bx-menu"
                    );
            };
        </script>

        <script>
            $('.submit-btn').on('click', function() {
                      var data = {};
                      data['name'] = $('#name').val()
                      data['points'] = $('#points').val()
                      data['description'] = $('#Discription').val()
                      data['lastDate'] = $('#date').val()
                      data['facebookLink'] = $('#flink').val()
                      data['instagramLink'] = $('#ilink').val()
                      data['twitterLink'] = $('#tlink').val()
                      data['linkedinLink'] = $('#llink').val()
                      console.log(data)
                      $.ajax({
                          url: "/api/task",
                          type: "POST",
                          data: data,
                          success: function(response) {
                              alert(response);
                              console.log("Sudde34jn;4")
                          }
                      })
                  })
        </script>
    </body>
</html>
