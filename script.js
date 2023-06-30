// Scroll to Section on Navigation Click
document.addEventListener('DOMContentLoaded', function() {
  const navLinks = document.querySelectorAll('.nav-link');

  navLinks.forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('data-target'));
      target.scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
});

// Progress Bar on Scroll
window.addEventListener('scroll', function() {
  const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
  const totalHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  const progress = (scrollPosition / totalHeight) * 100;
  const progressBar = document.querySelector('.progress-bar');
  progressBar.style.width = progress + '%';
});

// Fade-in Animation for Team Section
window.addEventListener('scroll', function() {
  const teamSection = document.getElementById('team');
  const teamMembers = document.querySelectorAll('.team-member');

  const teamSectionBottom = teamSection.offsetTop + teamSection.offsetHeight;

  if (window.scrollY + window.innerHeight >= teamSectionBottom) {
    teamSection.classList.add('fade-in');

    teamMembers.forEach(function(member, index) {
      setTimeout(function() {
        member.classList.add('fade-in');
      }, index * 200);
    });
  } else {
    teamSection.classList.remove('fade-in');

    teamMembers.forEach(function(member) {
      member.classList.remove('fade-in');
    });
  }
});

// Show Scroll to Top Button
window.addEventListener('scroll', function() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scroll-to-top").classList.add("show");
  } else {
    document.getElementById("scroll-to-top").classList.remove("show");
  }
});

// Scroll to Top
function scrollToTop() {
  document.body.scrollIntoView({ behavior: 'smooth' });
  document.documentElement.scrollIntoView({ behavior: 'smooth' });
}

// JavaScript code for floating and always centered navigation
window.addEventListener("scroll", function() {
  var nav = document.querySelector("nav");
  nav.classList.toggle("floating-nav", window.scrollY > 0);
});

window.addEventListener("resize", function() {
  centerizeNav();
});

function centerizeNav() {
  var nav = document.querySelector("nav");
  var container = document.querySelector(".container");
  var navWidth = nav.offsetWidth;
  var containerWidth = container.offsetWidth;
  var offset = (containerWidth - navWidth) / 2;
  nav.style.left = offset + "px";
}

// Call centerizeNav() initially to center the navigation
centerizeNav();

// Recenter the navigation on window resize
window.addEventListener("resize", function() {
  centerizeNav();
});

/* Login page */
function redirectToLogin() {
  window.location.href = 'Login & Registration/login.html'; // Redirect to login.html
}
function redirectToListPost() {
  window.location.href = 'post/ListPost.php'; // Redirect to login.html
}

