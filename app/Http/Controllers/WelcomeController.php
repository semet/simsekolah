<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $userType = [
            [
                'type' =>  'admin',
                'link' => route('admin.login'),
                'icon' => 'mdi mdi-shield-account'
            ],
            [
                'type' =>  'operator',
                'link' => route('operator.login'),
                'icon' => 'mdi mdi-account-cog'
            ],
            [
                'type' =>  'guru',
                'link' => route('guru.login'),
                'icon' => 'mdi mdi-account-star'
            ],
            [
                'type' =>  'siswa',
                'link' => route('siswa.login'),
                'icon' => 'mdi mdi-account-group'
            ],
            [
                'type' =>  'wali',
                'link' => '#',
                'icon' => 'mdi mdi-account-multiple'
            ],
            [
                'type' =>  'ppdb',
                'link' => '#',
                'icon' => 'mdi mdi-flag'
            ],
        ];
        return view('welcome', [
            'userType' => collect($userType)
        ]);
    }
}
