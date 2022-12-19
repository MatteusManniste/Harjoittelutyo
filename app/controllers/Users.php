<?php

class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    private function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        // redirect('posts');
    }

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // alustetaan data-muuttuja lomakkeen tiedoilla
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            //alustetaan valid-muuttuja
            //oletaan, että käyttäjä syöttänyt validit tiedot
            $valid = true;

            // tarkistetaan käyttäjän syötteet
            if (empty($data['email'])) {
                $valid = false;
                $data['email_err'] = "Syötä sähköpostiosoite";
            } else {
                if (!$this->userModel->findUserByEmail($data['email'])) {
                    $valid = false;
                    $data['email_err'] = "Tarkista sähköpostiosoite";
                }
            }

            if (empty($data['password'])) {
                $valid = false;
                $data['password_err'] = "Syötä salasana";
            }

            if (!$valid) {
                $this->view('users/login', $data);
                exit;
            } else {
                // kentät eivät olleet tyhjät
                // tarkistetaan onko salasana oikein

                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser === false) {
                    $data['password_err'] = "Virheellinen salasana";
                    $this->view('users/login', $data);
                    exit;
                } else {
                    $this->createUserSession($loggedInUser);
                }
            }
        } else {
            // alustetaan data-muuttuja
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            //ladataan oikea näkymä käyttäjälle
            $this->view('users/login', $data);
        }
    }

    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // tarkistetaan käyttäjän täyttämä lomake
            // tarkistetaan, että tunnus ei ole käytössä
            // viedään tiedot kantaan

            // alustetaan data-muuttuja
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            $valid = true;

            if (empty($data['name'])) {
                $data['name_err'] = "Syötä nimesi";
                $valid = false;
            }

            if (empty($data['email'])) {
                $data['email_err'] = "Syötä sähköposti";
                $valid = false;
            } else {
                //tarkistetaan onko kyseinen sähköposti jo käytössä
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = "Sähköpostiosoite on jo käytössä";
                    $valid = false;
                }
            }

            if (empty($data['password'])) {
                $data['password_err'] = "Syötä salasana";
                $valid = false;
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = "Salasana minimi pituus 6 merkkiä";
                $valid = false;
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Syötä salasana uudestaan";
                $valid = false;
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Salasanat eivät täsmää";
                $valid = false;
            }

            if ($valid) {

                //Hash salasana
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    redirect('users/login');
                    exit;
                } else {
                    die('Registeröinti ei onnistunut');
                }
            } else {
                //ladataan registeröintilomake virheilmoituksin
                $this->view('users/register', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            // ladataan rekisteröintilomake
            $this->view('users/register', $data);
        }
    }
}
