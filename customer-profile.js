$(document).ready(function() {
    $('#form').on('submit', function(event) { // Corrected form ID in the selector
    event.preventDefault(); // Prevent the form from submitting immediately
    
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to save the changes?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, save it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'update-profile.php',
                method: 'POST',
                data: $(this).serialize(), // Serialize form data
                success: function(response) {
                    console.log("Raw response from server:", response); // Log the raw response

                    try {
                        // Parse the JSON response
                        var res = JSON.parse(response.trim());
                        console.log("Parsed JSON response:", res);

                        if (res.status  === 'success') { // Use trim() to remove any surrounding whitespace
                            Swal.fire({
                                title: 'Updated!',
                                text: 'User Details has been updated successfully.',
                                icon: 'success'
                            }).then(() => {
                                window.location.href = 'customer-profile.php?id=' + res.id; // Redirect after success
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response,
                                icon: 'error'
                            });
                        }
                    }catch (e) {
                        console.error("Failed to parse JSON response:", e);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to parse server response.',
                            icon: 'error'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while updating the item.',
                        icon: 'error'
                    });
                }
            });
        }
    });
});
});