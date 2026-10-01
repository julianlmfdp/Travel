<?php

namespace Tests\Feature;

use App\Models\Pais;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PaisApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Schema::create('pais', function (Blueprint $table): void {
            $table->bigIncrements('pais_id');
            $table->string('nombre', 100);
            $table->char('codigo_iso2', 2)->unique();
            $table->char('codigo_iso3', 3)->nullable()->unique();
            $table->string('codigo_telefonico', 8)->nullable();
            $table->boolean('activo')->default(true);
        });
    }

    protected function tearDown(): void
    {
        Schema::dropIfExists('pais');
        parent::tearDown();
    }

    public function test_lists_existing_countries(): void
    {
        Pais::factory()->count(3)->create();
        $this->getJson('/api/v1/paises')->assertOk()->assertJsonCount(3, 'data');
    }

    public function test_creates_a_country(): void
    {
        $this->postJson('/api/v1/paises', ['nombre' => 'Perú', 'codigo_iso2' => 'PE', 'codigo_iso3' => 'PER'])
            ->assertCreated()->assertJsonPath('data.nombre', 'Perú');
        $this->assertDatabaseHas('pais', ['codigo_iso2' => 'PE']);
    }

    public function test_returns_404_for_a_missing_country(): void
    {
        $this->getJson('/api/v1/paises/999')->assertNotFound();
    }
}
