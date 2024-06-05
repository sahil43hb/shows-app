$(document).ready(function () {
    $(".nav-item").click(function () {
        // Remove active class from all menu items
        $(".nav-item").removeClass("active");

        $(this).addClass("active");
    });

    $("#registerationForm").submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Get form data
        var formData = $(this).serialize();

        // Process form data here (e.g., send it to a server using AJAX)
        // For demonstration purposes, we'll just log the form data
        // You can add AJAX code here to submit the form data to the server
        $.ajax({
            type: "POST", // Use POST method
            url: "/submit", // Specify the URL of your controller
            data: formData, // Pass the form data
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // Include CSRF token in headers
            },
            success: function (response) {
                // Handle the successful response from the server
                console.log("Success:", response);
                if (response.status) {
                    window.location = response.redirect;
                } else {
                    $.each(response.errors, function (key, val) {
                        $("#errors-list").append(
                            "<div class='alert alert-danger'>" + val + "</div>"
                        );
                    });
                }
            },
            error: function (xhr, status, error) {
                // Handle errors
                console.log("Error:", error);
            },
        });
    });

    $("#loginForm").submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Get form data
        var formData = $(this).serialize();

        // Process form data here (e.g., send it to a server using AJAX)
        // For demonstration purposes, we'll just log the form data
        console.log(formData);
        // You can add AJAX code here to submit the form data to the server
        $.ajax({
            type: "POST", // Use POST method
            url: "/login", // Specify the URL of your controller
            data: formData, // Pass the form data
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // Include CSRF token in headers
            },
            success: function (response) {
                // Handle the successful response from the server
                console.log("Success:", response);

                if (response.status) {
                    window.location = response.redirect;
                } else {
                    $("#errors-list").append(
                        "<div class='alert alert-danger'>" +
                            response.error +
                            "</div>"
                    );
                }
            },
            error: function (xhr, status, error) {
                // Handle errors
                console.log("Error:", error);
            },
        });
    });

    // $(".add-to-cart-btn").on("click", function () {
    //     if ($(this).attr("auth") === "0") {
    //         $("#loginModal").modal("show");
    //     } else {
    //         var productId = $(this).data("product-id"); // Assuming you have a data attribute for the product ID
    //         // Example: You can make an AJAX request to add the product to the cart
    //         const quantity = $("#sst").val();
    //         const productQuantity = quantity ? quantity : 1;
    //         console.warn(productQuantity);
    //         $.ajax({
    //             url: "/add-to-cart",
    //             method: "POST",
    //             data: {
    //                 productId: productId,
    //                 quantity: productQuantity,
    //             },
    //             headers: {
    //                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
    //                     "content"
    //                 ), // Include CSRF token in headers
    //             },
    //             success: function (response) {
    //                 // Handle success response, such as updating the cart count
    //                 console.log(response);
    //                 $("#cartData").text(response.totalCarts);
    //                 window.location = "/cart";
    //             },
    //             error: function (xhr, status, error) {
    //                 // Handle error response
    //                 console.error("Error adding product to cart:", error);
    //             },
    //         });
    //     }
    // });

    $(".forgot_password").on("click", function () {
        $("#ForgotPasswordModal").modal("show");
    });

    $(".add-to-cart-btn").on("click", function () {
        var authUser = $(this).attr("auth");
        if (!authUser) {
            $("#loginModal").modal("show");
        } else {
            authUser = JSON.parse(authUser);
            if (authUser.email_verified_at) {
                var productId = $(this).data("product-id");
                const quantity = $("#sst").val();
                const productQuantity = quantity ? quantity : 1;
                $.ajax({
                    url: "/add-to-cart",
                    method: "POST",
                    data: {
                        productId: productId,
                        quantity: productQuantity,
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        console.log(response);
                        $("#cartData").text(response.totalCarts);
                        window.location = "/cart";
                    },
                    error: function (xhr, status, error) {
                        console.error("Error adding product to cart:", error);
                    },
                });
            } else {
                alert("Please verify your email before adding to cart.");
            }
        }
    });

    $(".increase").click(function () {
        var row = $(this).closest("tr");
        var productQuantity = parseInt(
            row.find(".product_qty").data("product-quantity")
        );
        var cartId = parseInt(row.find(".product").data("cart-id"));
        var productPrice = $(this)
            .closest("tr")
            .find(".price")
            .data("cart-price");
        var $input = row.find(".input-text"); // Find the input field in the same row as the clicked button
        var value = parseInt($input.val());
        if (!isNaN(value) && value < productQuantity) {
            let updatedValue = $input.val(value + 1);

            $.ajax({
                url: `/add-to-cart/${cartId}`,
                method: "PUT",
                data: {
                    quantity: updatedValue.val(),
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ), // Include CSRF token in headers
                },
                success: function (response) {
                    // Handle success response, such as updating the cart count
                    updateTotalPrice(row, updatedValue.val(), productPrice);
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error("Error adding product to cart:", error);
                },
            });
        }
    });

    var selectedCarts = [];

    function toggleSelected(cartId) {
        var index = selectedCarts.indexOf(cartId);
        if (index === -1) {
            // Product ID not found, so add it to the array
            selectedCarts.push(cartId);
        } else {
            // Product ID found, so remove it from the array
            selectedCarts.splice(index, 1);
        }
    }

    $(".form-check  input[type='checkbox']").click(function () {
        var row = $(this).closest("tr");
        // Get the product ID from the data attribute of the closest <tr> element
        var cartId = parseInt(row.data("cart-id"));
        // alert(cartId);
        toggleSelected(cartId);
    });

    $(".reduced").click(function () {
        var row = $(this).closest("tr");
        var $input = row.find(".input-text");
        var cartId = parseInt(row.find(".product").data("cart-id"));
        var value = parseInt($input.val());
        var productPrice = $(this)
            .closest("tr")
            .find(".price")
            .data("cart-price");
        if (!isNaN(value) && value > 1) {
            let updatedValue = $input.val(value - 1);
            $.ajax({
                url: `/add-to-cart/${cartId}`,
                method: "PUT",
                data: {
                    quantity: updatedValue.val(),
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ), // Include CSRF token in headers
                },
                success: function (response) {
                    // Handle success response, such as updating the cart count
                    updateTotalPrice(row, updatedValue.val(), productPrice);
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error("Error adding product to cart:", error);
                },
            });
        }
    });

    $("#checkoutForm").submit(function (event) {
        event.preventDefault();

        if (selectedCarts.length > 0) {
            $.ajax({
                url: `/checkout`,
                method: "POST",
                data: {
                    carts: selectedCarts,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ), // Include CSRF token in headers
                },
                success: function (response) {
                    // Handle success response, such as updating the cart count
                    if (response.redirect_url) {
                        window.location.href = response.redirect_url;
                    } else {
                        alert("Failed to initiate checkout process");
                    }
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error("Error adding product to cart:", error);
                },
            });
        } else {
            alert("Plese select the item first!");
        }
    });
});

function updateTotalPrice(row, quantity, productPrice) {
    var totalPrice = quantity * productPrice;
    row.find(".price").text(`Rs.${totalPrice.toFixed(0)}`);
    updateTotalSum();
}

function updateTotalSum() {
    var totalSum = 0;
    $(".price").each(function () {
        totalSum += parseFloat($(this).text().replace("Rs.", "")); // Remove currency symbol before parsing
    });
    $("#totalSum").text(`Rs.${totalSum.toFixed(0)}`);
}
