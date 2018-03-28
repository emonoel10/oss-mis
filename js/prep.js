$(document).ready(function () {

    $('select#to').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery.php", //Where to make Ajax calls
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
            url: "query/finalquery.php", //Where to make Ajax calls
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

    $('select#gender').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery.php", //Where to make Ajax calls
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

    $('select#religion').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery.php", //Where to make Ajax calls
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

    $('select#hs').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery.php", //Where to make Ajax calls
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

    $('select#city').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery.php", //Where to make Ajax calls
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

    $('select#stanine').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery.php", //Where to make Ajax calls
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

    $('select#income').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery.php", //Where to make Ajax calls
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

    $('select#semester').change(function () {
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "query/finalquery.php", //Where to make Ajax calls
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