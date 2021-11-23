<?php

namespace Tests\Features;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Models\Film;
use App\Models\Category;

class Jalon3Test extends TestCase
{
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

    public function test_mauvaise_route()
    {
        $response = $this->get('/cetteRouteNeDevraitPasExisterNormalmeentEtSiElleExisteCestQuilYaUnGrosProbleme');

        $response->assertStatus(404); 
    }

    public function test_create()
    {
        $data = [
            'name' => 'test_name',
            'director' => 'test_director',
            'category_id' => 2
        ];

        $this->post('/films',$data);
        $match = ['name' => $data['name'], 'director' => $data['director'], 'category_id' => $data['category_id']];
        $film = Film::where($match)->first();
        $this->assertNotNull($film);
    }

    public function test_create_redirection()
    {
        $response = $this->post('/films',[
            'name' => 'post_name',
            'director' => 'post_director',
            'category_id' => 2]);

        $response->assertStatus(302);
    }

    public function test_delete()
    {
        $data = [
            'name' => 'test_name_delete',
            'director' => 'test_director_del',
            'category_id' => 1
        ];

        Film::create($data);
        $match = ['name' => $data['name'], 'director' => $data['director'], 'category_id' => $data['category_id']];
        $film = Film::where($match)->first();
        $id = $film->id;
        $this->assertNotNull($film);
        
        $film->delete(); //DELETE 


        $deleted_film = Film::find($id);
        $this->assertNull($deleted_film);
    }

    public function test_update()
    {
        $data = [
            'name' => 'name_not_modified',
            'director' => 'dir_not_modified',
            'category_id' => 1
        ];

        $film = Film::create($data);
        $id = $film->id;

        $request = [
            'name' => 'modified_name',
            'director' => 'modified_director',
            'category_id' => 2
        ];

        $this->put('/films/edit/' . $id, $request);
        $edit_film = Film::find($id);

        $this->assertEquals($edit_film['name'], $request['name']);
        $this->assertEquals($edit_film['director'], $request['director']);
        $this->assertEquals($edit_film['category_id'], $request['category_id']);
    }
}
