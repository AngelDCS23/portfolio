window.onload = function () {
    const locationIcon = document.getElementById('locationIcon');
    const visualModeButton = document.getElementById('visualModeButton');
    const dinoColor = document.getElementById('dino');
  
    function setDarkModeState(isDark) {
      document.body.classList.toggle('dark-mode', isDark);
  
      if (locationIcon) {
        locationIcon.src = isDark ? marcadorOscuro : marcadorClaro;
        visualModeButton.src = isDark ? SolClaro : lunaOscuro;
        dinoColor.src = isDark ? dinoOsc : dinoCla;
      }
  
      localStorage.setItem('darkMode', isDark);
    }
  
    if (localStorage.getItem('darkMode') === 'true') {
      setDarkModeState(true);
    }
  
    window.toggleDarkMode = function () {
      const isDark = !document.body.classList.contains('dark-mode');
      setDarkModeState(isDark);
    };
  };
  