  document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
  
    // Retrieve input values
    var reportType = document.querySelector('#report-type').value;
    var startDate = document.querySelector('#start-date').value;
    var endDate = document.querySelector('#end-date').value;
  
    // Perform report generation logic
    var generatedReport = generateReport(reportType, startDate, endDate);
  
    // Display report results
    var reportResults = document.querySelector('#report-results');
    reportResults.textContent = JSON.stringify(generatedReport);
  });
  
  function generateReport(reportType, startDate, endDate) {
    // Placeholder logic for generating the report
    // You can replace this with your actual report generation code
    return reportData;
  }
  
  document.querySelector('#search-report').addEventListener('click', function() {
    var searchTerm = document.querySelector('#search-term').value;
    var filteredReport = searchReport(searchTerm);
  
    var reportResults = document.querySelector('#report-results');
    reportResults.textContent = JSON.stringify(filteredReport);
  });
  
  function searchReport(searchTerm) {
    // Placeholder logic for searching the report
    // You can replace this with your actual search logic
    var filteredReport = reportData.filter(function(item) {
      return item.name.toLowerCase().includes(searchTerm.toLowerCase());
    });
  
    return filteredReport;
  }
  
  document.querySelector('#view-report').addEventListener('click', function() {
    var reportResults = document.querySelector('#report-results');
    reportResults.textContent = JSON.stringify(reportData);
  });
  
  document.querySelector('#print-report').addEventListener('click', function() {
    var reportResults = document.querySelector('#report-results').textContent;
    // Placeholder logic for printing the report
    // You can replace this with your actual printing code
    console.log(reportResults);
  });
  
  document.querySelector('#search-report').addEventListener('click', function() {
    var searchNo = document.querySelector('#search-no').value;
    var searchType = document.querySelector('#search-type').value;
    var filteredReport = searchReport(searchNo, searchType);
  
    var reportResults = document.querySelector('#report-results');
    reportResults.innerHTML = '';
  
    if (filteredReport.length > 0) {
      var reportCount = filteredReport.length;
  
      var reportCountElement = document.createElement('p');
      reportCountElement.textContent = 'Number of Reports: ' + reportCount;
      reportResults.appendChild(reportCountElement);
  
      for (var i = 0; i < filteredReport.length; i++) {
        var reportItemElement = document.createElement('p');
        reportItemElement.textContent = 'Report Number: ' + filteredReport[i].id +
          ', Type: ' + filteredReport[i].type;
        reportResults.appendChild(reportItemElement);
      }
    } else {
      var noResultsElement = document.createElement('p');
      noResultsElement.textContent = 'No reports found.';
      reportResults.appendChild(noResultsElement);
    }
  });
  
  function searchReport(searchNo, searchType) {
    // Placeholder logic for searching the report
    // You can replace this with your actual search logic
    var filteredReport = reportData.filter(function(item) {
      return (
        (searchNo === '' || item.id == searchNo) &&
        (searchType === '' || item.type.toLowerCase() === searchType.toLowerCase())
      );
    });
  
    return filteredReport;
  }
  
  document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
  
    // Retrieve input values
    var reportNumber = document.querySelector('#report-number').value;
    var reportType = document.querySelector('#report-type').value;
  
    // Perform search logic
    var searchResults = searchReports(reportNumber, reportType);
  
    // Display search results in table
    displaySearchResults(searchResults);
  });
  
  function searchReports(reportNumber, reportType) {
    // Placeholder logic for searching the reports
    // You can replace this with your actual search logic
    var filteredReports = reportData.filter(function(item) {
      return (
        (reportNumber === '' || item.number === parseInt(reportNumber)) &&
        (reportType === '' || item.type.toLowerCase() === reportType.toLowerCase())
      );
    });
  
    return filteredReports;
  }
  
  function displaySearchResults(results) {
    var tableBody = document.querySelector('#search-results tbody');
    tableBody.innerHTML = '';
  
    if (results.length > 0) {
      results.forEach(function(report) {
        var row = document.createElement('tr');
  
        var numberCell = document.createElement('td');
        numberCell.textContent = report.number;
        row.appendChild(numberCell);
  
        var typeCell = document.createElement('td');
        typeCell.textContent = report.type;
        row.appendChild(typeCell);
  
        var countCell = document.createElement('td');
        countCell.textContent = report.count;
        row.appendChild(countCell);
  
        tableBody.appendChild(row);
      });
    } else {
      var noResultsRow = document.createElement('tr');
      var noResultsCell = document.createElement('td');
      noResultsCell.setAttribute('colspan', '3');
      noResultsCell.textContent = 'No results found.';
      noResultsRow.appendChild(noResultsCell);
      tableBody.appendChild(noResultsRow);
    }
  }
  