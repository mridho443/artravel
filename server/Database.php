<?php
class Database
{
    private $host = "localhost";
    private $dbname = "artravel";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    private $conn;

    // function yang pertama kali di-load saat class dipanggil
    public function __construct()
    { // koneksi database 
        try {
            $this->conn = new PDO("mysql:host=$this->host;port=$this->port; dbname=$this->dbname; charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Koneksi gagal";
        }
    }

    public function login($username, $password)
    {
        $query = "SELECT * FROM user a JOIN user_role b on a.id_user = b.id_user WHERE username = :username AND password = :password;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $pass = md5($password);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();
        $rowCount = $stmt->rowCount();

        if ($rowCount == 1) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data;
        } else {
            return false;
        }
    }

    public function register($data)
    {
        $query = "SELECT * FROM user WHERE username =:username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $data['username']);
        $stmt->execute();


        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return false;
        } else {
            $query = $this->conn->prepare("INSERT IGNORE INTO user (username,password,nama,email) VALUES (?,?,?,?)");
            $query->execute(array($data['username'], md5($data['password']), $data['nama'], $data['email']));
            $query->closeCursor();
            $query2 = $this->conn->prepare("SELECT * FROM user WHERE username = ? ");
            $query2->execute(array($data['username']));
            $data = $query2->fetch(PDO::FETCH_ASSOC);
            $id_user = $data['id_user'];
            $query3 = $this->conn->prepare("INSERT INTO user_role(id_user, id_role) VALUES ($id_user,3)");
            $query3->execute();
            return true;
        }
    }

    public function read_all_admin()
    {
        $query = $this->conn->prepare("SELECT * FROM user JOIN user_role ON user.id_user = user_role.id_user WHERE id_role = 2");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        unset($query);
        return $data;
    }

    public function read_admin($id_user)
    {
        $query = $this->conn->prepare("SELECT * FROM user WHERE id_user = ? ");
        $query->execute(array($id_user));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        unset($query, $id_user);
        return $data;
    }

    public function create_admin($data)
    {
        $query = $this->conn->prepare("INSERT IGNORE INTO user (username,password,nama,email) VALUES (?,?,?,?)");
        $query->execute(array($data['username'], md5($data['password']), $data['nama'], $data['email']));
        $query->closeCursor();
        $query2 = $this->conn->prepare("SELECT * FROM user WHERE username = ? ");
        $query2->execute(array($data['username']));
        $data = $query2->fetch(PDO::FETCH_ASSOC);
        $id_user = $data['id_user'];
        $query3 = $this->conn->prepare("INSERT INTO user_role(id_user, id_role) VALUES ($id_user,2)");
        $query3->execute();
        unset($query, $data, $query2, $query3, $id_user);
    }

    public function update_admin($data)
    {
        $query = $this->conn->prepare("UPDATE user SET username = ?, email=? where id_user = ? ");
        $query->execute(array($data['username'], $data['email'], $data['id_user']));
        $query->closeCursor();
        unset($data, $query);
    }
    public function delete_admin($id_user)
    {
        $query = $this->conn->prepare("DELETE FROM user_role WHERE id_user= ?");
        $query->execute(array($id_user));
        $query->closeCursor();


        $query2 = $this->conn->prepare("DELETE FROM user WHERE id_user =? ");
        $query2->execute(array($id_user));
        $query2->closeCursor();
        unset($query2, $id_user);
    }
    public function read_all_bus()
    {
        $query = $this->conn->prepare("SELECT * FROM bus");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        unset($query);
        return $data;
    }

    public function read_bus($id_bus)
    {
        $query = $this->conn->prepare("SELECT * FROM bus WHERE id_bus = ? ");
        $query->execute(array($id_bus));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        unset($query, $id_bus);
        return $data;
    }

    public function create_bus($data)
    {
        $query = $this->conn->prepare("INSERT IGNORE INTO bus (nama_bus,plat_bus,status_bus) VALUES (?,?,?)");
        $query->execute(array($data['nama_bus'], $data['plat_bus'], $data['status_bus']));
        $query->closeCursor();
        unset($query, $data);
    }

    public function update_bus($data)
    {
        $query = $this->conn->prepare("UPDATE bus SET nama_bus = ?, plat_bus=?, status_bus = ? where id_bus = ? ");
        $query->execute(array($data['nama_bus'], $data['plat_bus'], $data['status_bus'], $data['id_bus']));
        $query->closeCursor();
        unset($data, $query);
    }
    public function delete_bus($id_bus)
    {
        $query = $this->conn->prepare("DELETE FROM bus WHERE id_bus= ?");
        $query->execute(array($id_bus));
        $query->closeCursor();
        unset($query, $id_bus);
    }
    public function read_all_paket_bus()
    {
        $query = $this->conn->prepare("SELECT * from paket_bus JOIN bus ON paket_bus.id_bus = bus.id_bus");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        unset($query);
        return $data;
    }

    public function read_paket_bus($id_paketbus)
    {
        $query = $this->conn->prepare("SELECT * FROM paket_bus WHERE id_paketbus = ? ");
        $query->execute(array($id_paketbus));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        unset($query, $id_paketbus);
        return $data;
    }

    public function create_paket_bus($data)
    {
        $query = $this->conn->prepare("INSERT IGNORE INTO paket_bus (id_bus,rute_bus,jadwal_bus,harga_bus) VALUES (?,?,?,?)");
        $query->execute(array($data['id_bus'], $data['rute_bus'], $data['jadwal_bus'], $data['harga_bus']));
        $query->closeCursor();
        unset($query, $data);
    }

    public function update_paket_bus($data)
    {
        $query = $this->conn->prepare("UPDATE paket_bus SET rute_bus = ?, jadwal_bus=?, harga_bus = ? where id_paketbus = ? ");
        $query->execute(array($data['rute_bus'], $data['jadwal_bus'], $data['harga_bus'], $data['id_paketbus']));
        $query->closeCursor();
        unset($data, $query);
    }
    public function delete_paket_bus($id_paketbus)
    {
        $query = $this->conn->prepare("DELETE FROM paket_bus WHERE id_paketbus= ?");
        $query->execute(array($id_paketbus));
        $query->closeCursor();
        unset($query, $id_paketbus);
    }

    public function create_pesan_bus($data)
    {
        $query = $this->conn->prepare("INSERT IGNORE INTO pesan_bus (id_user,id_paketbus,status_pesanbus) VALUES (?,?,'BELUM BAYAR')");
        $query->execute(array($data['id_user'], $data['id_paketbus']));
        $query->closeCursor();
        unset($query, $data);
    }

    public function read_pesan_bus($id_user)
    {
        $query = $this->conn->prepare("SELECT pesan_bus.id_pesanbus, pesan_bus.id_paketbus, rute_bus, jadwal_bus, harga_bus, status_pesanbus, bukti_bayarbus, nama_bus FROM pesan_bus
        JOIN paket_bus ON pesan_bus.id_paketbus = paket_bus.id_paketbus
        JOIN bus ON bus.id_bus = paket_bus.id_bus
        WHERE id_user = '$id_user'");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        unset($query, $id_paketbus);
        return $data;
    }

    public function update_bukti_pesan_bus($data)
    {
        $query = $this->conn->prepare("UPDATE pesan_bus SET bukti_bayarbus = ?, status_pesanbus='PROSES VERIFIKASI' where id_pesanbus = ? ");
        $query->execute(array($data['bukti_bayarbus'], $data['id_pesanbus']));
        $query->closeCursor();
        unset($data, $query);
        // $file_size = $data['file_size'];
        // $file_type = $data['file_type'];
        // $file_name = $data['file_name'];
        // $file_content = file_get_contents($data['file_name']);
        // $encoded_file_content = $file_content;
        // $status_pesanbus = "PROSES VERIFIKASI";

        // // Modifikasi kueri dan metode bind_param
        // $query1 = "UPDATE pesan_bus SET bukti_bayarbus = ?, status_pesanbus = ?, file_type = ?, file_name = ?, file_size = ? WHERE id_pesanbus = ?";
        // $stmt = $this->conn->prepare($query1);
        // $stmt->bindParam(1, $encoded_file_content, PDO::PARAM_LOB);
        // $stmt->bindParam(2, $status_pesanbus);
        // $stmt->bindParam(3, $file_type);
        // $stmt->bindParam(4, $file_name);
        // $stmt->bindParam(5, $file_size);
        // $stmt->bindParam(6, $data['id_pesanbus']);

        // // Eksekusi pernyataan
        // $stmt->execute();

        // // Tutup pernyataan

        // // Hapus variabel yang tidak digunakan
        // unset($data, $query);
    }

    public function read_all_pesan_bus()
    {
        $query = $this->conn->prepare("SELECT pesan_bus.id_pesanbus, pesan_bus.id_paketbus, rute_bus, jadwal_bus, harga_bus, status_pesanbus, bukti_bayarbus, nama_bus FROM pesan_bus
        JOIN paket_bus ON pesan_bus.id_paketbus = paket_bus.id_paketbus
        JOIN bus ON bus.id_bus = paket_bus.id_bus");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        unset($query);
        return $data;
    }

    public function delete_pesanbus($id_pesanbus)
    {
        $query = $this->conn->prepare("DELETE FROM pesan_bus WHERE id_pesanbus= ?");
        $query->execute(array($id_pesanbus));
        $query->closeCursor();
        unset($query, $id_pesanbus);
    }
    public function confirm($id_pesanbus)
    {
        $query = $this->conn->prepare("UPDATE pesan_bus SET status_pesanbus = 'SUDAH BAYAR' WHERE id_pesanbus= ?");
        $query->execute(array($id_pesanbus));
        $query->closeCursor();
        unset($query, $id_pesanbus);
    }


    // public function download($id_pesanbus)
    // {
    //     $query = "SELECT * FROM pesan_bus WHERE id_pesanbus = ?";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute($id_pesanbus);
    //     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $stmt->closeCursor();
    //     return $data;
    // }

}
?>