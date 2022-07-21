<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductRouteTest extends TestCase
{
    use RefreshDatabase;

    public function testGuestCannotAccessProductIndex(): void
    {
        $this->get(route('products.index'))->assertRedirect(route('login'));
    }

    public function testUserCanAccessProductIndex(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('products.index'))->assertOk();
    }

    public function testGuestCannotAccessProductCreate(): void
    {
        $this->get(route('products.create'))->assertRedirect(route('login'));
    }

    public function testUserCanAccessProductCreate(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('products.create'))->assertOk();
    }

    public function testGuestCannotAccessProductStore(): void
    {
        $this->post(route('products.store'))->assertRedirect(route('login'));
    }

    public function testUserCanAccessProductStore(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->post(route('products.store', [
            'name' => 'Product',
            'base_price' => '100',
            'discount_price' => '50',
            'description' => 'Description',
        ]))->assertRedirect(route('products.index'));
        $this->assertTrue(Product::where('name', 'Product')->exists());
    }

    public function testGuestCannotAccessProductEdit(): void
    {
        $product = Product::factory()->create();
        $this->get(route('products.edit', $product))->assertRedirect(route('login'));
    }

    public function testUserCanAccessProductEdit(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $this->actingAs($user)->get(route('products.edit', $product))->assertOk();
    }

    public function testGuestCannotAccessProductUpdate(): void
    {
        $product = Product::factory()->create();
        $this->patch(route('products.update', $product))->assertRedirect(route('login'));
    }

    public function testUserCanAccessProductUpdate(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $this->actingAs($user)->patch(route('products.update', $product), [
            'name' => 'Product',
            'base_price' => '100',
            'discount_price' => '50',
            'description' => 'Description',
        ])->assertRedirect(route('products.index'));
        $this->assertTrue(Product::where('name', 'Product')->exists());
    }

    public function testGuestCannotAccessProductDestroy(): void
    {
        $product = Product::factory()->create();
        $this->delete(route('products.destroy', $product))->assertRedirect(route('login'));
    }

    public function testUserCanAccessProductDestroy(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $this->actingAs($user)->delete(route('products.destroy', $product))->assertStatus(302);
        $this->assertFalse(Product::where('id', $product->id)->exists());
    }
}
