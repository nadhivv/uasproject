<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Penginapan;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PenginapanTest extends TestCase
{
    public function test_search_penginapan(): void
    {
        DB::beginTransaction();

        $penginapan = Penginapan::create([
            'name' => 'Test Homestay',
            'location' => 'Jakarta',
            'available_from' => now(),
            'available_to' => now()->addDays(10),
            'price' => 500000,
        ]);

        $response = $this->get(route('penginapan.search', ['kota' => 'Jakarta']));

        $response->assertStatus(200);
        $response->assertSee('Test Homestay');

        DB::rollBack();
    }

    public function test_show_penginapan(): void
    {
        DB::beginTransaction();

        $penginapan = Penginapan::create([
            'name' => 'Test Homestay',
            'location' => 'Jakarta',
            'price' => 500000,
        ]);

        $response = $this->get(route('penginapan.detail', ['name' => $penginapan->name]));

        $response->assertStatus(200);
        $response->assertSee('Test Homestay');

        DB::rollBack();
    }

    public function test_booking_penginapan(): void
    {
        DB::beginTransaction();

        $user = User::factory()->create();
        $penginapan = Penginapan::create([
            'name' => 'Test Homestay',
            'location' => 'Jakarta',
            'price' => 500000,
        ]);

        $this->actingAs($user);

        $response = $this->post(route('penginapan.booking', ['name' => $penginapan->name]), [
            'name' => $user->name,
            'email' => $user->email,
            'check_in' => now()->toDateString(),
            'check_out' => now()->addDays(2)->toDateString(),
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('bookings', [
            'user_id' => $user->id,
            'penginapan_id' => $penginapan->id,
        ]);

        DB::rollBack();
    }

    public function test_add_review(): void
    {
        DB::beginTransaction();

        $user = User::factory()->create();
        $penginapan = Penginapan::create([
            'name' => 'Test Homestay',
            'location' => 'Jakarta',
            'price' => 500000,
        ]);

        $this->actingAs($user);

        $response = $this->post(route('penginapan.addReview', ['id' => $penginapan->id]), [
            'rating' => 5,
            'comment' => 'Bagus sekali!',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('reviews', [
            'user_id' => $user->id,
            'penginapan_id' => $penginapan->id,
            'rating' => 5,
            'comment' => 'Bagus sekali!',
        ]);

        DB::rollBack();
    }
}
