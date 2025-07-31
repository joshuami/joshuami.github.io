(function joshuamiTourAutoModule($, Drupal) {
  Drupal.behaviors.joshuamiTourAuto = {};
  Drupal.behaviors.joshuamiTourAuto.attach = function joshuamiTourAutoAttach(
    context,
    settings,
  ) {
    once('joshuami-tour-auto', 'body').forEach(function joshuamiTourAutoForEach() {
      // Check if tours should be opened automatically for anonymous users
      if (settings.joshuami_tour_auto && settings.joshuami_tour_auto.should_open) {
        // Wait for the tour module to be fully initialized
        const waitForTourModule = function waitForTourModule() {
          if (Drupal.tour && Drupal.tour.setActive) {
            Drupal.tour.setActive(true);
          } else {
            setTimeout(waitForTourModule, 50);
          }
        };

        // Start checking after a short delay to let tour module initialize
        setTimeout(waitForTourModule, 100);
      }
    });
  };
})(jQuery, Drupal); 