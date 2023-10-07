const deposit = () => {
    var amount = $("#amount").val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/deposit",
        type: "POST",
        data: { amount: amount },
        success: function (response) {
            $("#amount").val("");
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
};

const withdraw = () => {
    var amount = $("#amount").val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/withdraw",
        type: "POST",
        data: { amount: amount },
        success: function (response) {
            $("#amount").val("");
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
};

const transfer = () => {
    var amount = $("#amount").val();
    var email = $("#email").val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/transfer",
        type: "POST",
        data: { amount: amount, email: email },
        success: function (response) {
            $("#amount").val("");
            $("#email").val("");
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
};
