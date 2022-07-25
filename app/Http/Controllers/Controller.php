<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_province()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 246d4037a19260a6ddcd48cd08ef80ef"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
            // echo "<option value=''>Pilih Provinsi</opton>";
            // foreach ($data_pengirim as $key => $tiap_provinsi) {
            //     echo "<option value='" . $tiap_provinsi["province_id"] . "' id_province='" . $tiap_provinsi["province_id"] . "'>";
            //     echo $tiap_provinsi["province"];
            //     echo "</option>";
            // }

            // echo "<pre>";
            // print_r($data_pengirim);
            // echo "</pre>";
            // $data_pengirim = $response['rajaongkir']['results'];
            // return $data_pengirim;
        }
    }

    public function get_city($id)
    {
        //$id_provinsi_terpilih = $_POST["id_province"];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 246d4037a19260a6ddcd48cd08ef80ef"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);

            // $response = json_decode($response, true);
            // $data_kota = $response["rajaongkir"]["results"];

            // echo "<option value=''>Pilih Kota</option>";
            // foreach ($data_kota as $key => $tiap_kota) {
            //     echo "<option value=''
            //     id_city='" . $tiap_kota["city_id"] . "' 
            //     provinsi ='" . $tiap_kota["province"] . "'
            //     city='" . $tiap_kota["city_name"] . "'
            //     tipe_kota='" . $tiap_kota["type"] . "'
            //     kodepos='" . $tiap_kota["postal_code"] . "' >";
            //     echo $tiap_kota["type"] . " ";
            //     echo $tiap_kota["city_name"];
            //     echo "</option>";
            // }
        }
    }
}
