$(document).ready(function() {
    var addressData = {
      "name": "Hotel-Web, Inc.",
      "street": "1234 Main Street",
      "city": "Anytown",
      "state": "USA",
      "zip": "12345",
      "poBox": "P.O. Box 1234"
    };
  
    var addressHtml = '<h2>Address</h2>';
    addressHtml += '<p>' + addressData.name + '</p>';
    addressHtml += '<p>' + addressData.street + '</p>';
    addressHtml += '<p>' + addressData.city + ', ' + addressData.state + ' ' + addressData.zip + '</p>';
    addressHtml += '<p>' + addressData.poBox + '</p>';
  
    $("#address").html(addressHtml);
  });

  