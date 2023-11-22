<?php
error_reporting(1);
class Client
{
    private $url;

    // function yan pertama kali di load saat class dipanggil 
    public function __construct($url)
    {
        $this->url = $url;
        unset($url);
    }

    // function untuk menghapus selain huruf dan angka
    public function filter($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
        return $data;
    }

    public function read_all_admin()
    {
        $client = curl_init($this->url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        unset($client, $response);
        return $data;
     
    }

    public function read_admin($id_user)
    {
        $id_user = $this->filter($id_user);
        $client = curl_init($this->url . "?aksi=read_admin&id_user=" . $id_user);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        unset($id_barang, $client, $response);
        return $data;
        
    }

    public function create_admin($data)
    {
        $data = '{  "id_user":"' . $data['id_user'] . '",
                    "username":"' . $data['username'] . '",
                    "password":"' . $data['password'] . '",
                    "nama":"' . $data['nama'] . '",
                    "email":"' . $data['email'] . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function update_admin($data)
    {
        $data = '{  "id_user":"' . $data['id_user'] . '",
                    "username":"' . $data['username'] . '",
                    "email":"' . $data['email'] . '",
                    "aksi":"' . $data['aksi'] . '"
                 }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($data, $c, $response);
    }

    public function delete_admin($data)
    {
        $id_user = $this->filter($data['id_user']);
        $data = '{  "id_user":"' . $id_user . '",
                    "aksi":"' . $data['aksi'] . '"
                }';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_user, $data, $c, $response);
    }

    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    { // hapus variable dari memory 
        unset($this->url);
    }

}

$url = 'http://192.168.2.240/ARTRAVEL/server/server.php';
// buat objek baru dari class client
$client = new Client($url);
?>