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
                url: 'update-veg-item.php',
                method: 'POST',
                data: $(this).serialize(), // Serialize form data
                success: function(response) {
                    if (response.trim() === 'success') { // Use trim() to remove any surrounding whitespace
                        Swal.fire({
                            title: 'Updated!',
                            text: 'The item has been updated successfully.',
                            icon: 'success'
                        }).then(() => {
                            window.location.href = 'vegetable-table.php'; // Redirect after success
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response,
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