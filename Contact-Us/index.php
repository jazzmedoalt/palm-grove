<?php
$message_status = '';
$message_text = '';

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "admin@palmgrovemontessori.com";
    
    $firstName = strip_tags(trim($_POST["firstName"]));
    $lastName = strip_tags(trim($_POST["lastName"]));
    $name = $firstName . " " . $lastName;
    $subject = strip_tags(trim($_POST["subject"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message_status = 'error';
        $message_text = "Invalid email format. Please try again.";
    } else {
        $email_content = "This Email is sent to you from the contact us page.";
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Subject: $subject\n\n";
        $email_content .= "Message:\n$message\n";
        
        $headers = "From: $name <$email>";

        if (mail($to, $subject, $email_content, $headers)) {
            $message_status = 'success';
            $message_text = "Thank you! Your message has been sent successfully.";
        } else {
            $message_status = 'error';
            $message_text = "Oops! Something went wrong. Please try again later.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="/img/favicon.ico">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us | Palm Grove Montessori Academy</title>
<meta name="description" content="Get in touch with Palm Grove Montessori Academy in Plano, TX. We'd love to hear from you!">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://www.palmgroveschool.com/Contact-Us/">
<meta property="og:type" content="website">
<meta property="og:title" content="Contact Us | Palm Grove Montessori Academy">
<meta property="og:description" content="Get in touch with Palm Grove Montessori Academy in Plano, TX. We'd love to hear from you!">
<meta property="og:url" content="https://www.palmgroveschool.com/Contact-Us/">
<meta property="og:site_name" content="Palm Grove Montessori Academy">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Contact Us | Palm Grove Montessori Academy">
<meta name="twitter:description" content="Get in touch with Palm Grove Montessori Academy in Plano, TX. We'd love to hear from you!">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="/css/nav-foot.css">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

  :root {
    --pg-amber: #f0a030;
    --pg-amber-hover: #d48a1a;
    --pg-amber-light: #fdf3e0;
    --pg-heading: #2d2d42;
    --pg-text: #4a4a5a;
    --pg-text-light: #6a6a7a;
    --pg-bg: #faf8f5;
    --pg-white: #ffffff;
    --pg-border: #eee8e0;
    --pg-dark: #2d2d42;
    --radius-lg: 20px;
    --shadow-soft: 0 8px 32px rgba(0,0,0,0.07);
    --seed-pink: #e88ca5;
    --seed-red: #d94f4f;
    --seed-orange: #f0a030;
    --seed-green: #5dab5e;
    --seed-blue: #4a90c4;
    --seed-purple: #8b6db5;
  }

  html { scroll-behavior: smooth; }
  body {
    font-family: 'Nunito', sans-serif;
    color: var(--pg-text);
    background: var(--pg-bg);
    line-height: 1.7;
    -webkit-font-smoothing: antialiased;
  }
  body.nav-open { overflow: hidden; }
  img { max-width: 100%; display: block; }
  a { text-decoration: none; }
  .container { max-width: 1120px; margin: 0 auto; padding: 0 24px; }

  .page-header {
    padding: 140px 24px 80px;
    background: linear-gradient(135deg, rgba(240,160,48,0.07) 0%, rgba(240,160,48,0.13) 42%, rgba(253,243,224,0.94) 100%);
    text-align: center;
  }
  .page-header h1 {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    color: var(--pg-heading);
    margin-bottom: 16px;
    letter-spacing: -0.02em;
  }
  .page-header p {
    max-width: 560px;
    margin: 0 auto;
    font-size: 1.05rem;
    color: var(--pg-text);
    line-height: 1.72;
  }

  .contact-section {
    padding: 80px 24px 100px;
    background: var(--pg-bg);
  }
  .contact-inner {
    max-width: 1120px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 48px;
    align-items: start;
  }
  .contact-info-card {
    background: var(--pg-white);
    border-radius: var(--radius-lg);
    padding: 36px 32px;
    box-shadow: var(--shadow-soft);
    border: 1px solid var(--pg-border);
  }
  .contact-info-card h2 {
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--pg-heading);
    margin-bottom: 24px;
  }
  .contact-details {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
  .contact-item {
    display: flex;
    gap: 14px;
    align-items: flex-start;
  }
  .contact-item-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: rgba(240,160,48,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    flex-shrink: 0;
  }
  .contact-item-label {
    font-size: 0.78rem;
    font-weight: 700;
    color: var(--pg-text-light);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-bottom: 2px;
  }
  .contact-item-value {
    font-size: 0.98rem;
    color: var(--pg-heading);
    font-weight: 600;
    line-height: 1.5;
  }
  .contact-item-value a {
    color: var(--pg-heading);
    transition: color 0.2s;
  }
  .contact-item-value a:hover { color: var(--pg-amber); }
  .contact-socials {
    margin-top: 28px;
    padding-top: 24px;
    border-top: 1px solid var(--pg-border);
  }
  .contact-socials h3 {
    font-size: 0.78rem;
    font-weight: 700;
    color: var(--pg-text-light);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-bottom: 14px;
  }
  .contact-social-links {
    display: flex;
    gap: 12px;
  }
  .contact-social-links a {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border-radius: 999px;
    background: var(--pg-bg);
    border: 1px solid var(--pg-border);
    color: var(--pg-heading);
    font-weight: 600;
    font-size: 0.88rem;
    transition: all 0.2s;
  }
  .contact-social-links a:hover {
    border-color: var(--pg-amber);
    background: var(--pg-amber-light);
    color: var(--pg-amber);
  }

  .contact-form-card {
    background: var(--pg-white);
    border-radius: var(--radius-lg);
    padding: 40px 36px;
    box-shadow: var(--shadow-soft);
    border: 1px solid var(--pg-border);
  }
  .form-group {
    margin-bottom: 20px;
  }
  .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
  }
  .form-label {
    display: block;
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--pg-heading);
    margin-bottom: 8px;
  }
  .form-input,
  .form-textarea {
    width: 100%;
    padding: 14px 18px;
    border: 1.5px solid var(--pg-border);
    border-radius: 12px;
    font-family: 'Nunito', sans-serif;
    font-size: 0.98rem;
    color: var(--pg-heading);
    background: var(--pg-white);
    transition: border-color 0.2s, box-shadow 0.2s;
  }
  .form-input:focus,
  .form-textarea:focus {
    outline: none;
    border-color: var(--pg-amber);
    box-shadow: 0 0 0 3px rgba(240,160,48,0.12);
  }
  .form-input::placeholder,
  .form-textarea::placeholder {
    color: var(--pg-text-light);
  }
  .form-textarea {
    min-height: 140px;
    resize: vertical;
  }
  .form-submit {
    width: 100%;
    padding: 16px 32px;
    border-radius: 999px;
    border: none;
    background: linear-gradient(135deg, var(--pg-amber) 0%, var(--pg-amber-hover) 100%);
    color: white;
    font-family: 'Nunito', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: transform 0.2s, box-shadow 0.2s;
    box-shadow: 0 8px 20px rgba(240,160,48,0.25);
  }
  .form-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(240,160,48,0.3);
  }
  .form-submit:active {
    transform: translateY(0);
  }

  .form-message {
    padding: 16px 20px;
    border-radius: 14px;
    margin-bottom: 24px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .form-message.success {
    background: rgba(93,171,94,0.1);
    border: 1px solid rgba(93,171,94,0.3);
    color: var(--seed-green);
  }
  .form-message.error {
    background: rgba(217,79,79,0.1);
    border: 1px solid rgba(217,79,79,0.3);
    color: var(--seed-red);
  }

  .form-consent {
    margin-top: 16px;
    font-size: 0.78rem;
    color: var(--pg-text-light);
    line-height: 1.6;
    text-align: center;
  }
  .form-consent a {
    color: var(--pg-heading);
    font-weight: 600;
    text-decoration: underline;
  }
  .form-consent a:hover {
    color: var(--pg-amber);
  }



  @media (max-width: 860px) {
    .contact-inner {
      grid-template-columns: 1fr;
      gap: 32px;
    }
  }

  @media (max-width: 560px) {
    .page-header {
      padding: 120px 16px 60px;
    }
    .contact-section {
      padding: 48px 16px 72px;
    }
    .contact-form-card {
      padding: 28px 20px;
    }
    .form-row {
      grid-template-columns: 1fr;
      gap: 20px;
    }
    .contact-info-card {
      padding: 28px 20px;
    }
  }
</style>
</head>
<body>

<nav class="nav" id="nav">
  <div class="nav-inner">
    <a href="/" class="nav-logo">
      <img src="/img/logo/pglogo.png" alt="Palm Grove Montessori Academy logo in Plano TX">
    </a>
    <ul class="nav-links" id="navLinks">
      <li><a href="/">Home</a></li>
      <li><a href="/preschool-programs-plano-tx">Our Program</a></li>
      <li><a href="/montessori-education-philosophy-plano">Our Promise</a></li>
      <li><a href="/montessori-classroom-plano">Classroom</a></li>
      <li><a href="/montessori-curriculum-plano">Curriculum</a></li>
      <li><a href="/Contact-Us">Contact</a></li>
      <li class="nav-phone-line"><a href="tel:+14094035040" class="nav-phone">(409) 403-5040</a></li>
      <li><a href="/Schedule-Tour" class="nav-cta">Schedule a Tour</a></li>
    </ul>
    <button class="mobile-toggle" id="mobileToggle" aria-label="Menu" aria-expanded="false" aria-controls="navLinks">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<header class="page-header">
  <h1>Get in Touch</h1>
  <p>We'd love to hear from you! Fill out the form below and we'll get back to you as soon as possible.</p>
</header>

<main class="contact-section">
  <div class="contact-inner">
    <div class="contact-info-card">
      <h2>Contact Information</h2>
      <div class="contact-details">
        <div class="contact-item">
          <div class="contact-item-icon">📍</div>
          <div>
            <div class="contact-item-label">Address</div>
            <div class="contact-item-value">5900 Windhaven Parkway<br>Plano, Texas 75093</div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-item-icon">📧</div>
          <div>
            <div class="contact-item-label">Email</div>
            <div class="contact-item-value"><a href="mailto:admin@palmgroveschool.com">admin@palmgroveschool.com</a></div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-item-icon">📞</div>
          <div>
            <div class="contact-item-label">Phone</div>
            <div class="contact-item-value">
              <a href="tel:+14094035040">(409) 403-5040</a>
            </div>
          </div>
        </div>
      </div>
      <div class="contact-socials">
        <h3>Follow Us</h3>
        <div class="contact-social-links">
          <a href="https://www.instagram.com/palmgrove_montessori_academy" target="_blank" rel="noopener noreferrer">
            <span>📸</span> Instagram
          </a>
          <a href="https://www.facebook.com/profile.php?id=61576811911497" target="_blank" rel="noopener noreferrer">
            <span>📘</span> Facebook
          </a>
        </div>
      </div>
    </div>

    <div class="contact-form-card">
      <?php if (!empty($message_text)): ?>
      <div class="form-message <?php echo $message_status; ?>">
        <?php echo $message_status === 'success' ? '✅' : '⚠️'; ?>
        <?php echo htmlspecialchars($message_text); ?>
      </div>
      <?php endif; ?>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" class="form-input" placeholder="Enter your first name" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" class="form-input" placeholder="Enter your last name" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label" for="email">Email Address</label>
          <input type="email" id="email" name="email" class="form-input" placeholder="you@example.com" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="subject">Subject</label>
          <input type="text" id="subject" name="subject" class="form-input" placeholder="How can we help?" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="message">Your Message</label>
          <textarea id="message" name="message" class="form-textarea" placeholder="Write your message here..." required></textarea>
        </div>
        <button type="submit" class="form-submit">Send Message</button>
        <p class="form-consent">By submitting this form, I agree to receive phone calls, emails, and text messages from Palm Grove Montessori Academy about my inquiry, tour, enrollment interest, availability, reminders, and related school updates. Message frequency varies. Message and data rates may apply. Reply STOP to opt out and HELP for help. Consent is not a condition of enrollment. View our <a href="/privacy-policy">Privacy Policy</a> and <a href="/terms-conditions">Terms & Conditions</a>.</p>
      </form>
    </div>
  </div>
</main>

  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <img src="/img/logo/whitelogo.png" alt="Palm Grove Montessori Academy white logo" class="footer-logo">
        <p class="footer-brand-copy">Classical Montessori with warm teachers, calm classrooms, and clear family
          communication for Plano-area families.</p>
        <div class="footer-contact-lines">
          <div>
            <div class="footer-contact-label">Visit</div>
            <div class="footer-contact-value">5900 Windhaven Parkway<br>Plano, Texas 75093</div>
          </div>
          <div>
            <div class="footer-contact-label">Contact</div>
            <div class="footer-contact-value"><a href="mailto:admin@palmgroveschool.com">admin@palmgroveschool.com</a>
            </div>
          </div>
          <div>
            <div class="footer-contact-label">Call</div>
            <div class="footer-contact-value"><a href="tel:+14094035040">(409) 403-5040</a></div>
          </div>
        </div>
      </div>
      <div>
        <h4>Explore</h4>
        <ul class="footer-links">
          <li><a href="/">Home</a></li>
          <li><a href="/preschool-programs-plano-tx">Our Program</a></li>
          <li><a href="/montessori-education-philosophy-plano">Our Promise</a></li>
          <li><a href="/montessori-curriculum-plano">Curriculum</a></li>
          <li><a href="/montessori-classroom-plano">Classroom</a></li>
          <li><a href="/resources">Resources</a></li>
          <li><a href="/Contact-Us">Contact Us</a></li>
        </ul>
      </div>
      <div>
        <h4>Plan Your Visit</h4>
        <div class="footer-action-card">
          <p>Ready to see the classrooms, meet the team, and ask questions in person?</p>
          <a href="/Schedule-Tour" class="footer-cta-btn">Schedule a Tour</a>
        </div>
        <h4>Follow + Legal</h4>
        <ul class="footer-links">
          <li><a href="/privacy-policy">Privacy Policy</a></li>
          <li><a href="/terms-and-conditions">Terms &amp; Conditions</a></li>
        </ul>
        <div class="footer-socials">
          <a href="https://www.instagram.com/palmgrove_montessori_academy" target="_blank"
            rel="noopener noreferrer">Instagram</a>
          <a href="https://www.facebook.com/profile.php?id=61576811911497" target="_blank"
            rel="noopener noreferrer">Facebook</a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 Palm Grove Montessori Academy. All rights reserved.</span>
      <span>Montessori preschool and daycare in Plano, TX.</span>
    </div>
  </footer>

<script>
(function() {
  var nav = document.getElementById('nav');
  var toggle = document.getElementById('mobileToggle');
  var links = document.getElementById('navLinks');

  window.addEventListener('scroll', function() {
    if (window.scrollY > 10) {
      nav.classList.add('scrolled');
    } else {
      nav.classList.remove('scrolled');
    }
  });

  if (toggle && links) {
    toggle.addEventListener('click', function() {
      var expanded = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!expanded));
      links.classList.toggle('open');
      document.body.classList.toggle('nav-open');
    });
  }
})();
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5TML75DQ');</script>
<!-- End Google Tag Manager -->

</body>
</html>
