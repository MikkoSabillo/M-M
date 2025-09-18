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
                u.username,
                v.vehicle_id,
                v.make,
                v.model,
                b.booking_date,
                b.booking_time,
                b.status,
                b.splash_theme
            FROM bookings_tb b
            INNER JOIN users_tb u 
                ON b.user_id = u.user_id
            INNER JOIN vehicles_tb v 
                ON b.vehicle_id = v.vehicle_id
            WHERE b.user_id = :user_id
            ORDER BY b.booking_id DESC";

        $query = $this->conn->prepare($sql);
        $query->execute([':user_id' => $user_id]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
