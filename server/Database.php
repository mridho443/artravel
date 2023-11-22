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

    public function read_all_admin()
    {
        $query = $this->conn->prepare("SELECT * FROM user JOIN user_role ON user.id_user = user_role.id_user WHERE id_role = 2");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        unset($query);
        return $data;
    }

    public function read_admin($id_user){
        $query = $this->conn->prepare("SELECT * FROM user WHERE id_user = ? ");
        $query->execute(array($id_user));
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        unset($query,$id_user);
        return $data;
    }

    public function create_admin($data){
        $query = $this->conn->prepare("INSERT IGNORE INTO user (id_user,username,password,nama,email) VALUES (?,?,?,?,?)");
        $query->execute(array($data['id_user'],$data['username'],md5($data['password']),$data['nama'],$data['email']));
        $query->closeCursor();
        $query2 = $this->conn->prepare("SELECT * FROM user WHERE username = ? ");
        $query2->execute(array($data['username']));
        $data = $query2->fetch(PDO::FETCH_ASSOC);
        $id_user = $data['id_user'];
        $query3 = $this->conn->prepare("INSERT INTO user_role(id_user, id_role) VALUES ($id_user,2)");
        $query3->execute();
        unset($query,$data,$query2,$query3,$id_user);
    }

    public function update_admin($data){
        $query = $this->conn->prepare("UPDATE user SET username = ?, email=? where id_user = ? ");
        $query->execute(array($data['username'],$data['email'],$data['id_user']));
        $query->closeCursor();
        unset($data,$query);
    }
    public function delete_admin($id_user){
        $query = $this->conn->prepare("DELETE FROM user WHERE id_user =? ");
        $query->execute(array($id_user));
        $query->closeCursor();
        unset($query,$id_user);
    }
}
?>