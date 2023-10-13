<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class UsersController extends Controller {

    private $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => config('api.url')
        ]);
    }

    public function index(Request $request) {
        $endpoint = "/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0";
        $page = $request->query('page', 1);

        try {
            $response = $this->client->get($endpoint);
            $data = $response->getBody()->getContents();
            $paginated = $this->paginate($data, 10, $page);

            return view('users.index')->with('users', $paginated);

        } catch (\Exception|GuzzleException|RequestException $e) {
            return view('users.index')->with('e', $e->getMessage());
        }
    }

    public function show($id) {
        $endpoint = "/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0";
        try {
            $response = $this->client->get($endpoint);
            $data = $response->getBody()->getContents();

            $collection = collect(json_decode($data, true)['users']);
            $user = $collection->where('id', $id)->first();

            return view('users.show')->with('user', $user);

        } catch (\Exception|GuzzleException|RequestException $e) {
            return view('users.show')->with('e', $e->getMessage());
        }
    }

    public function edit($id) {
        $endpoint = "/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0";
        try {
            $response = $this->client->get($endpoint);
            $data = $response->getBody()->getContents();

            $collection = collect(json_decode($data, true)['users']);
            $user = $collection->where('id', $id)->first();

            return view('users.edit')->with('user', $user);

        } catch (\Exception|GuzzleException|RequestException $e) {
            return view('users.edit')->with('e', $e->getMessage());
        }
    }

    public function update(Request $request, $id) {
        $endpoint = "/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0";
        $name = $request->input('name');
        $email = $request->input('email');
        $age = $request->input('age');

        try {
            $response = $this->client->post($endpoint, [
                'form_params' => [
                    'name' => $name,
                    'email' => $email,
                    'age' => $age
                ]
            ]);

            $status = $response->getStatusCode();
            if($status !== 200) {
                throw new \Exception("Error updating user");
            }

            return $this->edit($id);

        } catch (\Exception|GuzzleException|RequestException $e) {
            return view('users.show')->with('e', $e->getMessage());
        }
    }

    public function delete($id) {
        $endpoint = "/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0";
        try {
            $response = $this->client->delete($endpoint, [
                'form_params' => [
                    'id' => $id
                ]
            ]);

            $status = $response->getStatusCode();
            if($status !== 200) {
                throw new \Exception("Error deleting user");
            }

            return redirect('/');

        } catch (\Exception|GuzzleException|RequestException $e) {
            return view('users.show')->with('e', $e->getMessage());
        }
    }

    private function paginate($data, $items, $page = 2): UserCollection {
        $collection = collect(json_decode($data, true)['users']);
        $perPage = $items;

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $collection->forPage($page, $perPage),
            $collection->count(),
            $perPage,
            $page
        );
        return UserCollection::make($paginator);
    }
}
