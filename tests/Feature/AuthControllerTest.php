<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('registers a student account and signs them in', function () {
    $this->post(route('register.post'), [
        'name' => 'Alya Putri',
        'email' => 'alya@example.com',
        'password' => 'secret-pass',
        'password_confirmation' => 'secret-pass',
        'role' => 'teacher',
    ])->assertRedirect('/');

    $user = User::where('email', 'alya@example.com')->firstOrFail();

    expect($user->role)->toBe('student')
        ->and(Hash::check('secret-pass', $user->password))->toBeTrue();

    $this->assertAuthenticatedAs($user);
});

test('rejects login with invalid credentials', function () {
    $this->post(route('login.post'), [
        'email' => 'alya@example.com',
        'password' => 'wrong-password',
    ])
        ->assertRedirect()
        ->assertSessionHasErrors('email');

    $this->assertGuest();
});

test('logs in an existing user', function () {
    $user = User::create([
        'name' => 'Alya Putri',
        'email' => 'alya@example.com',
        'password' => 'secret-pass',
        'role' => 'student',
    ]);

    $this->post(route('login.post'), [
        'email' => $user->email,
        'password' => 'secret-pass',
    ])->assertRedirect('/');

    $this->assertAuthenticatedAs($user);
});
