<?php
include "db.php";
if(isset($_POST['booking_id'])){
    $id = $_POST['booking_id'];

    $query = "DELETE FROM bookings WHERE id='$id'";
    $run = mysqli_query($conn, $query);

    if($run){
        echo "<script>
                alert('Booking Cancel Successfully');
                window.location.href='birthday_venue.php';
              </script>";
    }else{
        echo "<script>
                alert('Error! Booking not cancelled');
                window.location.href='birthday_venue.php';
              </script>";
    }
}
?>

<?php
include "db.php";

if(isset($_POST['booking_id'])){
    $id = $_POST['booking_id'];

    mysqli_query($conn, "DELETE FROM bookings WHERE id='$id'");

    echo "<script>
            alert('Booking Cancelled Successfully');
            window.location.href='wedding_venue.php';
          </script>";
}
?>

<?php
include "db.php";

if(isset($_POST['booking_id'])){
    $id = $_POST['booking_id'];

    mysqli_query($conn, "DELETE FROM bookings WHERE id='$id'");

    echo "<script>
            alert('Booking Cancelled Successfully');
            window.location.href='Corporate_venue.php';
          </script>";
}
?>



