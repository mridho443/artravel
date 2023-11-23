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

    public function login($username, $password)
    {

        $data = '{  
                    "username":"' . $username . '",
                    "password":"' . $password . '",
                    "aksi":"' . 'login' . '"
                }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        $data = json_decode($response);
        unset($c, $response);
        return $data;

    }

    public function register($data2)
    {
        $data = '{  
                    "username":"' . $data2['username'] . '",
                    "password":"' . $data2['password'] . '",
                    "nama":"' . $data2['nama'] . '",
                    "email":"' . $data2['email'] . '",
                    "aksi":"' . 'register' . '"
        }';
        

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        $data = json_decode($response);
        unset($c, $response);
        return $data;
    }

    public function read_all_admin()
    {
        $client = curl_init($this->url . "?aksi=read_all_admin");
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
        unset($id_user, $client, $response);
        return $data;

    }

    public function create_admin($data2)
    {
        $data = '{  
                    "username":"' . $data2['username'] . '",
                    "password":"' . $data2['password'] . '",
                    "nama":"' . $data2['nama'] . '",
                    "email":"' . $data2['email'] . '",
                    "aksi":"' . $data2['aksi'] . '"
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
    public function read_all_bus()
    {
        $client = curl_init($this->url . "?aksi=read_all_bus");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        unset($client, $response);
        return $data;

    }

    public function read_bus($id_bus)
    {
        $id_bus = $this->filter($id_bus);
        $client = curl_init($this->url . "?aksi=read_bus&id_bus=" . $id_bus);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        unset($id_bus, $client, $response);
        return $data;

    }

    public function create_bus($data2)
    {
        $data = '{  
                    "nama_bus":"' . $data2['nama_bus'] . '",
                    "plat_bus":"' . $data2['plat_bus'] . '",
                    "status_bus":"' . $data2['status_bus'] . '",
                    "aksi":"' . $data2['aksi'] . '"
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

    public function update_bus($data)
    {
        $data = '{  "id_bus":"' . $data['id_bus'] . '",
                    "nama_bus":"' . $data['nama_bus'] . '",
                    "plat_bus":"' . $data['plat_bus'] . '",
                    "status_bus":"' . $data['status_bus'] . '",
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

    public function delete_bus($data)
    {
        $id_bus = $this->filter($data['id_bus']);
        $data = '{  "id_bus":"' . $id_bus . '",
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

    // ... (kode sebelumnya)

    public function read_all_paket_bus()
    {
        $client = curl_init($this->url . "?aksi=read_all_paket_bus");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        unset($client, $response);
        return $data;
    }

    public function read_paket_bus($id_paketbus)
    {
        $id_paketbus = $this->filter($id_paketbus);
        $client = curl_init($this->url . "?aksi=read_paket_bus&id_paketbus=" . $id_paketbus);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        unset($id_paketbus, $client, $response);
        return $data;
    }

    public function create_paket_bus($data2)
    {
        $data = '{
            "id_bus":"' . $data2['id_bus'] . '",
            "rute_bus":"' . $data2['rute_bus'] . '",
            "jadwal_bus":"' . $data2['jadwal_bus'] . '",
            "harga_bus":"' . $data2['harga_bus'] . '",
            "aksi":"' . $data2['aksi'] . '"
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

    public function update_paket_bus($data)
    {
        $data = '{
            "id_paketbus":"' . $data['id_paketbus'] . '",
            "rute_bus":"' . $data['rute_bus'] . '",
            "jadwal_bus":"' . $data['jadwal_bus'] . '",
            "harga_bus":"' . $data['harga_bus'] . '",
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

    public function delete_paket_bus($data)
    {
        $id_paketbus = $this->filter($data['id_paketbus']);
        $data = '{
            "id_paketbus":"' . $id_paketbus . '",
            "aksi":"' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_paketbus, $data, $c, $response);
    }

    public function create_pesan_bus($data2){
        $data = '{
            "id_user":"' . $data2['id_user'] . '",
            "id_paketbus":"' . $data2['id_paketbus'] . '",
            "aksi":"' . $data2['aksi'] . '"
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

    public function read_pesan_bus($id_user)
    {
        $id_user = $this->filter($id_user);
        $client = curl_init($this->url . "?aksi=read_pesan_bus&id_user=" . $id_user);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        unset($id_paketbus, $client, $response);
        return $data;
    }

    public function update_bukti_pesan_bus($data)
    {
        $data = '{
            "id_pesanbus":"' . $data['id_pesanbus'] . '",
            "bukti_bayarbus":"' . $data['bukti_bayarbus'] . '",
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

    public function read_all_pesan_bus()
    {
        $client = curl_init($this->url . "?aksi=read_all_pesan_bus");
        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($client);
        curl_close($client);
        $data = json_decode($response);
        unset($client, $response);
        return $data;
    }

    public function delete_pesanbus($data)
    {
        $id_pesanbus = $this->filter($data['id_pesanbus']);
        $data = '{
            "id_pesanbus":"' . $id_pesanbus . '",
            "aksi":"' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_pesanbus, $data, $c, $response);
    }
    public function confirm($data)
    {
        $id_pesanbus = $this->filter($data['id_pesanbus']);
        $data = '{
            "id_pesanbus":"' . $id_pesanbus . '",
            "aksi":"' . $data['aksi'] . '"
        }';

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $this->url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($c);
        curl_close($c);
        unset($id_pesanbus, $data, $c, $response);
    }


    // public function download($id_pesanbus)
    // {
    //     $id_pesanbus = $this->filter($id_pesanbus);
    //     $client = curl_init($this->url . "?aksi=download&id_pesanbus=" . $id_pesanbus);
    //     curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    //     $response = curl_exec($client);
    //     curl_close($client);
    //     $data = json_decode($response);
    //     unset($id_paketbus, $client, $response);
    //     return $data;
    // }

    




    // function yang terakhir kali di-load saat class dipanggil
    public function __destruct()
    { // hapus variable dari memory 
        unset($this->url);
    }

}

$url = 'http://192.168.35.240/ARTRAVEL/server/server.php';
// buat objek baru dari class client
$client = new Client($url);
?>