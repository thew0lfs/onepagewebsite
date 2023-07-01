<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Website</title>
  <link rel="stylesheet" href="styles.css">
  <script src="script.js"></script>
</head>

<body>
  <button id="scroll-to-top" onclick="scrollToTop()" title="Scroll to Top"></button>

  </head>

  <body>
    <header>
      <nav>
        <ul>
          <img src="Images/Logo.png" alt="Logo">
          <button class="nav-link" data-target="#hero">Home</button>
          <button class="nav-link" data-target="#about">About</button>
          <button class="nav-link" data-target="#team">Team</button>
          <button class="nav-link" data-target="#features">Features</button>
          <button class="nav-link" data-target="#social">Social</button>
          <button class="nav-link" data-target="#contact">Contact</button>
          <li><button class="nav-link" onclick="redirectToLogin()">Login</button></li>
          
        </ul>
      </nav>
    </header>

    <div class="progress-bar"></div>

    <section id="hero">
      <div class="container">
        <h1>Your Title</h1>
        <p>A brief and catchy tagline that describes your title.</p>
        <!-- <a href="#contact" class="cta-btn">Get Started</a> -->
      </div>
    </section>

    <section id="about">
      <div class="container">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec lacus lacinia, lacinia metus non,
          varius turpis. Nulla tincidunt eu ipsum nec pellentesque.</p>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="section-content">
          <div class="text-description">
            <h2>Counter-Strike 2</h2>
            <p>Counter-Strike 2 is the largest technical leap forward in Counter-Strike’s history, ensuring new features
              and updates for years to come.

              All of the game’s new features will be revealed when it officially launches this summer, but the road to
              Counter-Strike 2 begins today as a Limited Test for select CS:GO players. During this testing period,
              we’ll be evaluating a subset of features to shake out any issues before the worldwide release..</p>
          </div>
          <div class="image-wrapper">
            <img src="Images/CS2.jpg" alt="Image Description">
          </div>
        </div>
      </div>
    </section>


    <section>
      <div class="container">
        <div class="section-content">
          <div class="image-wrapper">
            <img src="Images/Red CSGO.png" alt="Image Description">
          </div>
          <div class="text-description">
            <h2>Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod sem at laoreet lobortis. Nulla
              eleifend mauris vel metus dignissim, ac euismod velit interdum. Phasellus tristique risus nec tincidunt
              semper. Nam nec felis malesuada, semper tellus sed, vulputate eros. Fusce nec nisi felis.</p>
          </div>
        </div>
      </div>
    </section>


    <section id="features">
      <?php
      // Connect to database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "test";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM posts";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {


          echo "  <div class='feature-group'>  
        
          <a href='/onepagewebsite-main/post/PostDetail.php?id=" . $row["id"] . "'> <img src='" . $row["image"] . "' /><a/>

        <h3>" . $row["title"] . "</h3>
        <p>" . $row["description"] . "</p>
        
        </div> </a>";


        }
      }

      $conn->close();
      ?>


    </section>

    <section class="text-section">
      <div class="text-container">
        <h2 class="text-title">Section Title</h2>
        <p class="text-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in ex non felis aliquam
          blandit. Mauris vehicula, massa et feugiat convallis, elit ligula venenatis urna, non condimentum purus tortor
          id lectus.</p>
      </div>
    </section>

    <section class="images-section">
      <h2>Images</h2>
      <div class="image-row">
        <img src="Images/AK47.jpg">
        <img src="Images/USP S.webp">
        <img src="Images/M4.jpg">
      </div>
      <div class="image-row">
        <img src="Images/Scout.webp">
        <img src="Images/Deagle.webp">
        <img src="Images/D Lore.jpg">
      </div>
    </section>


    <section id="social">
      <div class="container">
        <h2>Social Media</h2>
        <div class="social-icons">
          <a href="https://telegram.org"><img src="Images/Telegram Logo.png" alt="Telegram"></a>
          <a href="https://www.instagram.com"><img src="Images/Instagram Logo.png" alt="Instagram"></a>
          <a href="https://discord.com"><img src="Images/Discord Logo.png" alt="Discord"></a>
        </div>
      </div>
    </section>

    <section id="contact" class="contact-section">
      <div class="container">
        <h2>Contact Us</h2>
        <form action="contact.php" method="post">
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <textarea name="message" placeholder="Your Message" required></textarea>
          <button type="submit">Send Message</button>
        </form>
      </div>
    </section>

    <footer>
      <div class="footer-content">
        <div class="footer-links">
          <a href="#">Terms and Policy</a>
          <a href="#">Cookie</a>
        </div>
        <p class="copyright">
          Copyright to ---
        </p>
      </div>
    </footer>



  </body>

</html>
