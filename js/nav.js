  // Nav scroll shadow
  const nav = document.getElementById('nav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 20);
  });

  // Mobile nav toggle
  const toggle = document.getElementById('mobileToggle');
  const navLinks = document.getElementById('navLinks');
  const setNavOpen = (isOpen) => {
    navLinks.classList.toggle('open', isOpen);
    toggle.setAttribute('aria-expanded', String(isOpen));
    toggle.setAttribute('aria-label', isOpen ? 'Close menu' : 'Menu');
    document.body.classList.toggle('nav-open', isOpen);
  };

  toggle.addEventListener('click', (event) => {
    event.stopPropagation();
    setNavOpen(!navLinks.classList.contains('open'));
  });

  navLinks.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setNavOpen(false));
  });

  document.addEventListener('click', (event) => {
    if (!navLinks.classList.contains('open')) return;
    if (!nav.contains(event.target)) setNavOpen(false);
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') setNavOpen(false);
  });

  window.addEventListener('resize', () => {
    if (window.innerWidth > 980 && navLinks.classList.contains('open')) {
      setNavOpen(false);
    }
  });