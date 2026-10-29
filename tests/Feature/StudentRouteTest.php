<?php

test('home redirects to the school page that displays the shared header', function () {
    $this->get('/')
        ->assertRedirect(route('students.index'));
});

test('shared header includes the logout button', function () {
    $header = view('layouts.partials.header')->render();

    expect($header)
        ->toContain('action="'.route('logout').'"')
        ->toContain('>Logout</button>');
});

test('student routes accept the student parameter used by the index view', function () {
    expect(route('students.show', ['student' => 1]))->toBe(url('/students/1'))
        ->and(route('students.edit', ['student' => 1]))->toBe(url('/students/1/edit'))
        ->and(route('students.destroy', ['student' => 1]))->toBe(url('/students/1'));
});
