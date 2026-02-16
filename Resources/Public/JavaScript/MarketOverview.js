/**
 * Bitcoin Hub – Market Overview: sortable table
 * Author: Simon Köhler (KOHLERCODE LLC)
 */
(function () {
  'use strict';

  var table = document.querySelector('.btc-marketoverview__table');
  if (!table || !table.querySelector('thead th')) return;

  var thead = table.querySelector('thead');
  var tbody = table.querySelector('tbody');
  var headers = thead.querySelectorAll('th');
  var rows = Array.from(tbody.querySelectorAll('tr'));

  function getCellValue(td, index) {
    var sortVal = td.getAttribute('data-sort');
    if (sortVal !== null && sortVal !== '') {
      var num = parseFloat(sortVal.replace(/\s/g, '').replace(',', '.'));
      return isNaN(num) ? sortVal : num;
    }
    return (td.textContent || td.innerText || '').trim();
  }

  function sort(index, direction) {
    rows.sort(function (a, b) {
      var aVal = getCellValue(a.cells[index], index);
      var bVal = getCellValue(b.cells[index], index);
      if (aVal < bVal) return direction === 'asc' ? -1 : 1;
      if (aVal > bVal) return direction === 'asc' ? 1 : -1;
      return 0;
    });
    rows.forEach(function (row) {
      tbody.appendChild(row);
    });
  }

  function setActiveTh(activeIndex, dir) {
    headers.forEach(function (th, i) {
      th.removeAttribute('aria-sort');
      if (i === activeIndex) {
        th.setAttribute('aria-sort', dir === 'asc' ? 'ascending' : 'descending');
      }
    });
  }

  var currentIndex = -1;
  var currentDir = 'asc';

  headers.forEach(function (th, index) {
    th.setAttribute('role', 'columnheader');
    th.setAttribute('tabindex', '0');
    th.addEventListener('click', function () {
      if (currentIndex === index) {
        currentDir = currentDir === 'asc' ? 'desc' : 'asc';
      } else {
        currentIndex = index;
        currentDir = 'asc';
      }
      sort(index, currentDir);
      setActiveTh(index, currentDir);
    });
  });
})();
