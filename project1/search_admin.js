function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementsByClassName("admin-table")[0];
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; 
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";

                var adminId = tr[i].getElementsByTagName("td")[0].innerText;
                loadDoc(adminId);

            } else {
                tr[i].style.display = "none";
            }
        }
    }

    var noDataFound = document.getElementById("noDataFound");
    var visibleRows = Array.from(tr).filter(row => row.style.display !== "none");
    noDataFound.style.display = visibleRows.length === 1 ? "" : "none";
}


function loadDoc(driverId) {
    var apiUrl = "show_admin.php?driverId=" + driverId;

    // Function to make the AJAX GET request
    makeAjaxGetRequest(apiUrl, function (response) {
        // Assuming you have a div with the ID "fullInfo" to display the full information
        document.getElementById("fullInfo").innerHTML = response;
    });
}

// Function to make the AJAX GET request
function makeAjaxGetRequest(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(xhr.responseText);
        }
    };
    xhr.open("GET", url, true);
    xhr.send();
}