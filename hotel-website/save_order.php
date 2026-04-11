<?php
include "db.php";

if (isset($_POST['submit'])) {

    $fullname   = $_POST['fullname'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $menu_item  = $_POST['menu_item'];
    $address    = $_POST['address'];
    $order_date = $_POST['order_date'];

    $sql = "INSERT INTO orders (fullname, email, phone, menu_item, address, order_date)
            VALUES ('$fullname', '$email', '$phone', '$menu_item', '$address', '$order_date')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<h2 style='color:green;text-align:center;margin-top:50px;'>
                ✅ Order Saved Successfully!
              </h2>
              <p style='text-align:center;'>
                <a href='order.php'>Back</a>
              </p>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "Form not submitted properly!";
}
?>