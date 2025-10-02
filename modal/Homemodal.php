<?php
include "db_connect.php";

class Homemodal extends Connector
{
    function __construct()
    {
        parent::__construct();
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users_tb WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function index($username, $hashpass, $profile_pic, $first_name, $last_name, $nickname, $gender, $phone, $email, $preferred_contact, $address, $city, $state, $zip_code)
    {
        $sql = "INSERT INTO users_tb (username, password, profile_pic, first_name, last_name, nickname, gender, phone, email, preferred_contact, address, city, state, zip_code) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare("$sql");

        return $stmt->execute([$username, $hashpass, $profile_pic, $first_name, $last_name, $nickname, $gender, $phone, $email, $preferred_contact, $address, $city, $state, $zip_code]);
    }
    // Check if username exists
    function Exists($username)
    {
        $sql = "SELECT COUNT(*) FROM users_tb WHERE username = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$username]);

        return $query->fetchColumn();
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users_tb WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function Service()
    {
        $sql = "SELECT * FROM services_tb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getServiceFeatures($service_id)
    {
        $sql = "SELECT * FROM service_features WHERE service_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$service_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function booknow($user_id, $vehicle_id, $service_id, $washdate, $washtime, $washingpoint, $message)
    {

        $sql = "INSERT INTO bookings_tb 
            (user_id, vehicle_id, svr_id, booking_date, booking_time, return_date, splash_theme, emoji_feedback_enabled, status) 
            VALUES (:user_id, :vehicle_id, :svr_id, :booking_date, :booking_time, :return_date, :splash_theme, 1, 'Confirmed')";

        $stmt = $this->conn->prepare($sql);

        $return_date = NULL;
        $splash_theme = $washingpoint . " | " . $message;

        // bind parameters
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':vehicle_id', $vehicle_id);
        $stmt->bindParam(':svr_id', $service_id);
        $stmt->bindParam(':booking_date', $washdate);
        $stmt->bindParam(':booking_time', $washtime);
        $stmt->bindParam(':return_date', $return_date);
        $stmt->bindParam(':splash_theme', $splash_theme);

        // execute query
        return $stmt->execute();
    }
    public function getUserVehicles($user_id)
    {
        try {
            $sql = "SELECT vehicle_id, make, model, year, license_plate
                FROM vehicles_tb
                WHERE user_id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':user_id' => $user_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return []; // return empty if error
        }
    }

    public function users_table($user_id)
    {
        try {
            $sql = "SELECT * FROM users_tb WHERE user_id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':user_id' => $user_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    function allbooking($user_id)
    {
        $sql = "SELECT 
               
                b.booking_id,
                u.first_name,
                u.last_name,
                v.make,
                v.model,
                v.vehicle_id,
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
            WHERE b.user_id = :user_id
            ORDER BY b.booking_id DESC";

        $query = $this->conn->prepare($sql);
        $query->execute([':user_id' => $user_id]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    # feature
    public function booking_table()
    {
        try {
            $sql = 'SELECT * FROM service_features WHERE feature_id IN (6, 7, 8, 9, 10)';
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    function userupd($username, $id, $profile_pic, $first_name, $last_name, $nickname, $gender, $phone, $email, $preferred_contact, $address, $city, $state, $zip_code)
    { {
            $sql = "UPDATE users_tb 
                    SET 
                        username = ?,
                        profile_pic = ? ,
                        first_name = ?,
                        last_name = ?,
                        nickname = ?,
                        gender = ? ,
                        phone =? ,
                        email = ? ,
                        preferred_contact =?,
                        address = ? ,
                        city = ?,
                        state = ? ,
                        zip_code = ?
                    WHERE user_id= ?";
            $stmt = $this->conn->prepare("$sql");

            return $stmt->execute(params: [$username, $profile_pic, $first_name, $last_name, $nickname, $gender, $phone, $email, $preferred_contact, $address, $city, $state, $zip_code, $id]);
        }
    }

    function payment($id)
    {
        $sql = "SELECT 
                    p.*,
                    b.*,
                    u.*,
                    v.*,
                    o.*
                    FROM payments_tb p 
                    INNER JOIN bookings_tb b ON p.Payment_booking_id = b.booking_id 
                    INNER JOIN users_tb u ON b.user_id = u.user_id
                    INNER JOIN vehicles_tb v ON b.vehicle_id = v.vehicle_id
                    INNER JOIN services_tb o ON b.svr_id = o.service_id
                    WHERE b.user_id = :user_id
                    ORDER BY b.booking_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':user_id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    #--- contact ---#
    function inscontact($message, $subject, $usename, $email)
    {
        $sqlin = "INSERT INTO `message_tb`( Message, Subject, Username, Email) 
            VALUES (? ,? ,? ,?)";
        $query = $this->conn->prepare($sqlin);
        return $query->execute([$message, $subject, $usename, $email]);
    }
    #----end of contact ------#

    function concelbk($status, $id)
    {
        $sqlin = "UPDATE bookings_tb SET status = ? WHERE booking_id = ?";
        $query = $this->conn->prepare($sqlin);
        return $query->execute([$status, $id]);
    }

    function deleteconcelbk($id)
    {
        //get hero featured destination sql
        $sql = "DELETE FROM bookings_tb WHERE booking_id = ?";

        $query = $this->conn->prepare($sql); //prepare the query
        $query->bindParam(1, $id);
        $query->execute(); //run the query

        return $this->conn->lastInsertId(); //return
    }

    function addvhk( $id, $make, $model, $year, $licenseplate ){
        $sql = "INSERT INTO vehicles_tb (user_id, make, model, year, license_plate) 
        VALUES (?, ?, ?, ?, ?)";
        $query = $this->conn->prepare($sql);
       return $query->execute([ $id, $make, $model, $year, $licenseplate ]);
    }
}
