// // Controls sitewide alert banner function.
(function ($, Drupal) {
  "use strict";
  Drupal.behaviors.alertSystem = {
    attach: function (context) {
      var alertData = {};

      try {
        alertData = JSON.parse(localStorage.getItem('alertUID')) || {};
      }
      catch (e) {
        console.log(e);
      }

      $.each(alertData, function (index, value) {
        $('#' + index).parent().remove();
      });

      $(".alert .btn-close").click(function (e) {
        var alertUID = $(this).attr('data-alert');
        $('#' + alertUID).parent().remove();
        alertData[alertUID] = 1;
        try {
          localStorage.setItem('alertUID', JSON.stringify(alertData));
        }
        catch (e) {
          return false;
        }
      });

      $('.alert-group').removeClass('hidden');
    }
  };
})(jQuery, Drupal);
