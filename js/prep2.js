$(document).ready(function () {

    $('select#to').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery2.php", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: $("#myForm").serialize(), //Form variables
            success: function (response) {

                if (response == "1") {
                    // alert("Error: No database connection, Please check your internet connection.");
                    alert("Error: No database connection, Please check your internet connection.");
                    return;
                } else {
                    $("#printableArea").empty();
                    $("#printableArea").append(response);
                    return;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });

    $('select#course').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery2.php", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: $("#myForm").serialize(), //Form variables
            success: function (response) {

                if (response == "1") {
                    // alert("Error: No database connection, Please check your internet connection.");
                    alert("Error: No database connection, Please check your internet connection.");
                    return;
                } else {
                    $("#printableArea").empty();
                    $("#printableArea").append(response);
                    return;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });

    $('select#work').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery2.php", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: $("#myForm").serialize(), //Form variables
            success: function (response) {

                if (response == "1") {
                    // alert("Error: No database connection, Please check your internet connection.");
                    alert("Error: For nature of work.");
                    return;
                } else {
                    $("#printableArea").empty();
                    $("#printableArea").append(response);
                    return;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });

    $('select#country').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery2.php", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: $("#myForm").serialize(), //Form variables
            success: function (response) {

                if (response == "1") {
                    // alert("Error: No database connection, Please check your internet connection.");
                    alert("Error: No database connection, Please check your internet connection.");
                    return;
                } else {
                    $("#printableArea").empty();
                    $("#printableArea").append(response);
                    return;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });

    $('select#job').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery2.php", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: $("#myForm").serialize(), //Form variables
            success: function (response) {

                if (response == "1") {
                    // alert("Error: No database connection, Please check your internet connection.");
                    alert("Error: No database connection, Please check your internet connection.");
                    return;
                } else {
                    $("#printableArea").empty();
                    $("#printableArea").append(response);
                    return;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });

    $('select#salary').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery2.php", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: $("#myForm").serialize(), //Form variables
            success: function (response) {

                if (response == "1") {
                    // alert("Error: No database connection, Please check your internet connection.");
                    alert("Error: No database connection, Please check your internet connection.");
                    return;
                } else {
                    $("#printableArea").empty();
                    $("#printableArea").append(response);
                    return;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });

    $('select#empStatus').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery2.php", //Where to make Ajax calls
            dataType: "text", // Data type, HTML, json etc.
            data: $("#myForm").serialize(), //Form variables
            success: function (response) {

                if (response == "1") {
                    // alert("Error: No database connection, Please check your internet connection.");
                    alert("Error: No database connection, Please check your internet connection.");
                    return;
                } else {
                    $("#printableArea").empty();
                    $("#printableArea").append(response);
                    return;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
    });

});