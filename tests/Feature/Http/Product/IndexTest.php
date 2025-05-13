<?php

declare(strict_types=1);

use App\Models\User;

test('admin can see index page', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('products.index'))
        ->assertStatus(200);
});

test('non admin cannot see index page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('products.index'))
        ->assertStatus(403);
})->skip();
