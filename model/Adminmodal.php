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
                p.payment_id ,
                b.booking_id,
                u.first_name,
                u.last_name,
                v.make,
                v.model,
                v.vehicle_id,
                o.service_name,
                o.price,
                p.amount,
                p.payment_date,
                p.payment_method,
                b.splash_theme,
                b.booking_date,
                b.return_date,
                b.booking_time,
                b.status
            FROM payments_tb p
            INNER JOIN bookings_tb b ON p.Payment_booking_id =  b.booking_id
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
            $sql2 = "UPDATE bookings_tb SET return_date = ? ,  status = 'Completed' WHERE booking_id = ? ";
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->execute([$date, $booking_id]);

            return true;
        } catch (Exception $e) {
            error_log("Payment failed: " . $e->getMessage());
            return false;
        }
    }
    # PAYMENT data
    function pyntdt()
    {
        $sql = "SELECT 
                    p.payment_id,
                    u.booking_id,
                    c.first_name,
                    c.last_name,
                    p.amount,
                    p.payment_date,
                    p.payment_method
        FROM payments_tb p 
        INNER JOIN bookings_tb u ON p.Payment_booking_id = u.booking_id
        INNER JOIN users_tb c ON u.booking_id = c.user_id";


        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function ftwhite()
    {
        $sql = 'SELECT * FROM service_features sf
         INNER JOIN services_tb s ON sf.service_id = s.service_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateFeature($featureId, $serviceName, $featureName, $description, $price, $isIncluded, $paymentDate)
    {
        try {
            $sql = "
            UPDATE service_features sf
            JOIN services_tb s ON sf.service_id = s.service_id
            SET 
                sf.feature_name = :featureName,
                sf.Description_tb = :description,
                sf.Timeup = :paymentDate,
                sf.is_included = :isIncluded,
                s.service_name = :serviceName,
                s.price = :price
            WHERE sf.feature_id = :featureId
        ";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':featureId', $featureId, PDO::PARAM_INT);
            $stmt->bindParam(':serviceName', $serviceName, PDO::PARAM_STR);
            $stmt->bindParam(':featureName', $featureName, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':isIncluded', $isIncluded, PDO::PARAM_INT);
            $stmt->bindParam(':paymentDate', $paymentDate);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    #------carousel------#
    function Homecarousel()
    {
        $sqlcarousel = "SELECT * FROM carousel_tb";

        $query = $this->conn->prepare($sqlcarousel);
        $query->execute();

        return $query->fetchall(PDO::FETCH_ASSOC); //get all the data and return
    }
    #-----end of carousel------#
    #------carousel------#
    public function upCrsl($title, $desc, $time, $profile_pic, $id)
    {

        $sql = "UPDATE carousel_tb 
                    SET 
                        carousel_title = ?, 
                        carousel_desc = ?, 
                        carousel_time = ?, 
                        carousel_img = ? 
                    WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $desc, $time, $profile_pic,  $id]);

        #-----end of carousel------#
    }

    #---message---#
    public function message()
    {
        $sql = "SELECT * FROM message_tb ORDER BY Message_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchall(PDO::FETCH_ASSOC); //get all the data and return
    }

    #---end of message-----#

    function allbk()
    {
        $sql = "SELECT * FROM bookings_tb b INNER JOIN users_tb u ON b.user_id = u.user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getcwabout()
    {
        $sql = "SELECT * FROM cwabout_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    function upcwa($img, $title ,$desc ,$id)
    {
        $sql = "UPDATE cwabout_tb 
                SET about_us_img= ? ,
                    about_us_title= ? ,
                    about_us_prg= ? 
                WHERE id= ? ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute( [$img, $title, $desc ,$id]);
    }

    function getbrand_tb()
    {
        $sql = "SELECT * FROM brand_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    function upbrand($brand , $included, $id){
        $sql = "UPDATE brand_tb 
                SET Versatile_Brand= ? ,
                    included= ?  
                WHERE id= ? ";
        $stmt = $this->conn->prepare($sql);
       return $stmt->execute([ $brand, $included, $id ]);
        
    }
}
