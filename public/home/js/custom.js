const { data } = require("autoprefixer");

// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();


// client section owl carousel
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});





$(document).ready(function () {
    // Set CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.addToWishlist').click(function (e) {
        e.preventDefault();
        
        // Find the product ID
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        
        console.log("Product ID:", product_id);  // Check if product ID is being captured

        // Check if product ID is available before making the request
        if (product_id) {
            $.ajax({
                method: "POST",
                url: "/add_to_wishlist",
                data: {
                    'product_id': product_id
                },
                success: function (response) {
                    swal(response.status);
                },
                error: function (xhr, status, error) {
                    console.error("Error in AJAX request:", error);  // Log any errors
                }
            });
        } else {
            console.error("Product ID not found");
        }
    });
});





/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}




document.addEventListener("DOMContentLoaded", function () {
    const imageInputs = document.querySelectorAll('input[type="file"]');
    imageInputs.forEach(input => {
        input.addEventListener('change', function () {
            const previewId = `${this.id}-preview`;
            const preview = document.getElementById(previewId);
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
    });
});
