<?php

test('login page renders successfully', function () {
    $this->get('/login')
        ->assertSuccessful()
        ->assertSee('Masuk');
});

test('register page renders successfully', function () {
    $this->get('/register')
        ->assertSuccessful()
        ->assertSee('Daftar Akun');
});
