<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        // helper('form');
        // $data['title'] = "Daftar | KeMakassar";
        return view('auth.register');
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $daftarmodel = new DaftarModel();
        $loginmodel = new LoginModel();
        $pelangganmodel = new PelangganModel();

        $rules = [
            'Nama_Depan'    => 'required|min_length[3]|max_length[50]',
            'Nama_Belakang' => 'required|min_length[3]|max_length[50]',
            'User_Name'     => 'required|min_length[6]|max_length[50]|is_unique[login.User_Name]',
            'Password'      => 'required|min_length[6]|max_length[50]|is_unique[login.Password]',
            'NomorTlp'      => 'required',
            'Email'         => 'required|valid_email',
        ];



        if ($this->validate($rules)) {

            $dataLogin = [
                'User_Name'         => $this->request->getVar('User_Name'),
                'Password'          => $this->request->getVar('Password'),
            ];
            $dataDaftar = [
                'Nama_Depan'        => $this->request->getVar('Nama_Depan'),
                'Nama_Belakang'     => $this->request->getVar('Nama_Belakang'),
                'User_Name'         => $this->request->getVar('User_Name'),
                'Password'          => $this->request->getVar('Password'),
            ];
            $dataPelanggan = [
                'IDPelanggan'       => $pelangganmodel->generateCode(),
                'User_Name'         => $this->request->getVar('Nama_Depan'),
                'NamaPelanggan'     => $this->request->getVar('Nama_Depan') . " " . $this->request->getVar('Nama_Belakang'),
                'NomorTlp'          => $this->request->getVar('NomorTlp'),
                'Email'             => $this->request->getVar('Email'),
            ];
            $daftarmodel->saveData($dataDaftar, $dataLogin, $dataPelanggan);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = "Daftar | MyLaundry";
            echo view('register', $data);
        }
    }
}
