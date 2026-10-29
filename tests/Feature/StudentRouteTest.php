<?php

use App\Http\Middleware\CheckByRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

test('home redirects to the school page that displays the shared header', function () {
    $this->get('/')
        ->assertRedirect(route('students.index'));
});

test('role middleware passes through the student page without printing debug output', function () {
    $request = Request::create('/students');
    $request->setUserResolver(fn () => new User(['role' => 'student']));

    $response = (new CheckByRole)->handle(
        $request,
        fn () => new Response('student list'),
        'student',
        'teacher',
    );

    expect($response->getContent())->toBe('student list');
});

test('shared header includes the logout button', function () {
    $header = view('layouts.partials.header')->render();

    expect($header)
        ->toContain('action="'.route('logout').'"')
        ->toContain('Logout');
});

test('student routes accept the student parameter used by the index view', function () {
    expect(route('students.show', ['student' => 1]))->toBe(url('/students/1'))
        ->and(route('students.edit', ['student' => 1]))->toBe(url('/students/1/edit'))
        ->and(route('students.destroy', ['student' => 1]))->toBe(url('/students/1'));
});
