// Import reveal.js core
import Reveal from 'reveal.js';
import 'reveal.js/dist/reveal.css';

// Import reveal.js plugins
import RevealMarkdown from 'reveal.js/plugin/markdown/markdown.esm.js';
import RevealHighlight from 'reveal.js/plugin/highlight/highlight.js';
import RevealNotes from 'reveal.js/plugin/notes/notes.js';
import RevealZoom from 'reveal.js/plugin/zoom/zoom.js';

// Import highlight.js theme
import 'reveal.js/plugin/highlight/monokai.css';

// Make Reveal available globally
window.Reveal = Reveal;
window.RevealMarkdown = RevealMarkdown;
window.RevealHighlight = RevealHighlight;
window.RevealNotes = RevealNotes;
window.RevealZoom = RevealZoom;

// Initialize Reveal.js with default configuration
Reveal.initialize({
  // Display presentation control arrows
  controls: true,
  
  // Help the user learn the controls by providing hints, for example by
  // bouncing the down arrow when they first encounter a vertical slide
  help: true,
  
  // Determines where controls appear, "edges" or "corners"
  controlsTutorial: true,
  
  // Determines if the presentation is running in an embedded mode,
  // i.e. contained within a limited portion of the screen
  embedded: false,
  
  // Flags if we should show a help overlay when the questionmark
  // key is pressed
  help: true,
  
  // Number of milliseconds between automatically proceeding to the
  // next slide, disabled when set to 0, this value can be overwritten
  // by using a data-autoslide attribute on your slides
  autoSlide: 0,
  
  // Stop auto-sliding after user input
  autoSlideStoppable: true,
  
  // Enable slide navigation via mouse wheel
  mouseWheel: false,
  
  // Apply a 3D roll to links on hover
  previewLinks: false,
  
  // Transition style
  transition: 'slide', // none/fade/slide/convex/concave/zoom
  
  // Transition speed
  transitionSpeed: 'default', // default/fast/slow
  
  // Transition style for full page slide backgrounds
  backgroundTransition: 'fade', // none/fade/slide/convex/concave/zoom
  
  // Parallax scrolling
  parallaxBackgroundImage: '',
  parallaxBackgroundSize: '',
  
  // Number of slides away from the current that are visible
  viewDistance: 3,
  
  // The display mode that will be used to show slides
  display: 'block',
  
  // Enable hash navigation
  hash: true,
  
  // Show slide numbers
  slideNumber: true,
  
  // Push each slide change to the browser history
  history: false,
  
  // Enable keyboard shortcuts for navigation
  keyboard: true,
  
  // Enable touch navigation for devices with touch input
  touch: true,
  
  // Loop the presentation
  loop: false,
  
  // Change the presentation direction to be RTL
  rtl: false,
  
  // Randomizes the order of slides each time the presentation loads
  shuffle: false,
  
  // Turns fragments on and off globally
  fragments: true,
  
  // Flags whether to include the current fragment in the URL,
  // so that reloading brings you to the same fragment position
  fragmentInURL: false,
  
  // Flags if the presentation is running in an embedded mode,
  // i.e. contained within a limited portion of the screen
  embedded: false,
  
  // Flags if we should show a help overlay when the questionmark
  // key is pressed
  help: true,
  
  // Number of milliseconds between automatically proceeding to the
  // next slide, disabled when set to 0, this value can be overwritten
  // by using a data-autoslide attribute on your slides
  autoSlide: 0,
  
  // Stop auto-sliding after user input
  autoSlideStoppable: true,
  
  // Enable slide navigation via mouse wheel
  mouseWheel: false,
  
  // Apply a 3D roll to links on hover
  previewLinks: false,
  
  // Focus body on page load to allow keyboard shortcuts
  focusBodyOnPageVisibilityChange: true,
  
  // Used when there are no fragments
  hideInactiveCursor: true,
  
  // Hide cursor if inactive
  hideCursorTime: 5000,
  
  // Plugins
  plugins: [ RevealMarkdown, RevealHighlight, RevealNotes, RevealZoom ]
});
