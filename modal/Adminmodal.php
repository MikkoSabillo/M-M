<?php
include "db_connect.php";

class Adminmodal extends Connector
{
    function __construct()
    {
        parent::__construct();
    }

    function users_table()
    {
        $sql = " SELECT * FROM users_tb WHERE `role` = 'customer' ORDER BY user_id DESC ";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();

        return $mysql->fetchAll(PDO::FETCH_ASSOC);
    }

    function book()
    {
        $sql = " SELECT * FROM users_tb";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();

        return $mysql->fetchAll(PDO::FETCH_ASSOC);
    }
    function allbooking()
    {
        $sql = "SELECT * FROM bookings_tb";
        $query = $this->conn->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function completedbook()
    {
        $sql = "SELECT 
                b.booking_id,
                u.first_name,
                u.last_name,
                v.make,
                v.model,
                v.vehicle_id,
                o.service_name,
                o.price,
                b.splash_theme,
                b.booking_date,
                b.return_date,
                b.booking_time,
                b.status
            FROM bookings_tb b
            INNER JOIN users_tb u ON b.user_id = u.user_id
            INNER JOIN vehicles_tb v ON b.vehicle_id = v.vehicle_id
            INNER JOIN services_tb o ON b.svr_id = o.service_id
            WHERE b.status = 'completed'
            ORDER BY b.booking_date DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function ActiveConfirmed()
    {
        $sql = "SELECT 
                b.booking_id,
                u.first_name,
                u.last_name,
                v.make,
                v.model,
                v.vehicle_id,
                o.service_name,
                o.price,
                b.splash_theme,
                b.booking_date,
                b.booking_time,
                b.status
            FROM bookings_tb b
            INNER JOIN users_tb u ON b.user_id = u.user_id
            INNER JOIN vehicles_tb v ON b.vehicle_id = v.vehicle_id
            INNER JOIN services_tb o ON b.svr_id = o.service_id
            WHERE b.status = 'Confirmed'
           ORDER BY b.booking_id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Paymetbk($booking_id, $amount, $date, $method)
{
    try {
        // Make sure booking_id has no spaces
        $booking_id = trim($booking_id);
        

        // Step 1: Check booking exists
        $check = $this->conn->prepare("SELECT booking_id FROM bookings_tb 
        WHERE booking_id = ?");
        $check->execute([$booking_id]);

        if ($check->rowCount() === 0) {
            throw new Exception("Booking ID not found.");
        }

        // Step 2: Insert payment
        $sql = "INSERT INTO payments_tb (Payment_booking_id, amount, payment_date, payment_method, is_confirmed)
                VALUES (?, ?, ?, ?, 1)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$booking_id, $amount, $date, $method]);

        // Step 3: Update booking status
        $sql2 = "UPDATE bookings_tb SET return_date = ? ,  status = 'Completed'WHERE booking_id = ? ";
        $stmt2 = $this->conn->prepare($sql2);
        $stmt2->execute([$date, $booking_id]);

        return true;

    } catch (Exception $e) {
        error_log("Payment failed: " . $e->getMessage());
        return false;
    }

}

}
