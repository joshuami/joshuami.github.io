// // Controls sitewide alert banner function.
(function ($, Drupal) {
  "use strict";
  Drupal.behaviors.westyTables = {
    attach: function (context) {
      $('table.table-card').each(function () {
        var headerItems = [];
        $(this).find('thead tr th').each(function () {
          headerItems.push($(this).text());
        });

        $(this).find('tbody tr').each(function () {
          $(this).find('td').each(function (index, value) {
            if (headerItems[index]) {
              var tableKey = "<span class='key fw-bold'>" + headerItems[index] + ": </span>";
              $(this).prepend(tableKey);
            }
          });
        });
      });
    }
  };
})(jQuery, Drupal);
