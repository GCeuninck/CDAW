<?php

namespace Tests\Features;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Models\Film;
use App\Models\Category;

class Jalon3Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example_jalon()
    {
        $this->assertTrue(true);
    }

    public function test_index_route()
    {
        $response = $this->get('/index');

        $response->assertStatus(200);
    }

    public function test_films_route()
    {
        $response = $this->get('/films');

        $response->assertStatus(200);
    }

    public function test_create()
    {
        $data = [
            'name' => 'test_name',
            'director' => 'test_director',
            'category_id' => 2
        ];

        Film::create($data);
        $match = ['name' => 'test_name', 'director' => 'test_director', 'category_id' => 2];
        $film = Film::where($match)->get()->first();
        $this->assertTrue(isset($film));
    }

    public function test_delete()
    {
        $data = [
            'name' => 'test_name_delete',
            'director' => 'test_director_del',
            'category_id' => 1
        ];

        Film::create($data);
        $match = ['name' => 'test_name_delete', 'director' => 'test_director_del', 'category_id' => 1];
        //first pour ne pas avoir une collection
        $film = Film::where($match)->get()->first();
        $id = $film->id;
        $this->assertTrue(isset($film));
        $film->delete();
        $deleted_film = Film::find($id);
        $this->assertFalse(isset($deleted_film));
    }

}
