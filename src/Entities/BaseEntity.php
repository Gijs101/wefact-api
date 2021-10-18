<?php

namespace Media101\WeFactApi\Entities;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Media101\WeFactApi\Exceptions\ApiException;

abstract class BaseEntity
{
    protected Client $client;

    public string $controller;

    public int $Identifier;

    public array $attributes = [];

    public array $original = [];

    /**
     * Instantiate a new called class object.
     * When passing ID, this will automatically assign a new object instance.
     * @param int|null $Identifier
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    public function __construct(int $Identifier = null)
    {
        $this->client = new Client(config('wefact.client'));

        if ($Identifier) {
            $res = $this->show($Identifier);

            if (isset($res['errors'])) {
                throw new ApiException($res);
            }

            if (!isset($res[$this->controller]) || $res['status'] !== 'success') {
                throw new ApiException($res);
            }

            $this->set($res[$this->controller]);
        }

    }

    /**
     * Set class attributes.
     * @param array $params
     * @return $this
     */
    public function set(array $params): self
    {
        foreach ($params as $key => $field) {
            $this->$key = $field;
        }

        return $this;
    }


    /**
     * List objects
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    public function list(array $params = []): mixed
    {
        $res = $this->request(array_merge($params, [
            'action' => 'list'
        ]));

        $key = Str::plural($this->controller);

        if (!isset($res[$key])) {
            throw new ApiException($res);
        }

        return $res[$key];
    }


    /**
     * Try to find the object and set class to object.
     * @param $code
     * @return mixed
     */
    public static function find($code): mixed
    {
        $class = static::class;
        return new $class($code);
    }

    /**
     * Get and return the object
     * @param $code
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    private function show($code): mixed
    {
        return $this->request([
            'action' => 'show',
            'Identifier' => $code
        ]);
    }

    /**
     * Create a new object in WeFact / HostFact and return new instantiated class
     * @param $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    public function create($data): mixed
    {
        $class = static::class;

        $obj = $this->request(array_merge($data, [
            'controller' => $this->controller,
            'action' => 'add',
        ]));

        if (isset($obj[$this->controller]['Identifier']) && $obj[$this->controller]['Identifier']) {
            return static::find($obj[$this->controller]['Identifier']);
        }

        return new $class;
    }

    /**
     * Write changed to WeFact / HostFact
     * @param array $data
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    private function edit(array $data = []): self
    {
        $obj = $this->request(array_merge($data, [
            'action' => 'edit',
            'controller' => $this->controller,
            'Identifier' => $this->Identifier,
        ]));

        return $this->set($obj[$this->controller]);
    }

    /**
     * Save current class variables to object.
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException|\Media101\WeFactApi\Exceptions\ApiException
     */
    public function save(): self
    {
        $dirty = $this->getDirty();
        $this->edit($dirty);

        return $this;
    }

    /**
     * Remove current entity.
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    public function delete(): bool
    {
        $this->request([
            'action' => 'delete',
            'Identifier' => $this->Identifier
        ]);

        foreach (get_object_vars($this) as $var) {
            unset($this->$var);
        }

        return true;
    }

    /**
     * Send request to WeFact / HostFact API.
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \Media101\WeFactApi\Exceptions\ApiException
     */
    protected function request(array $params)
    {
        if (!isset($params['controller'])) {
            $params['controller'] = $this->controller;
        }

        $res = $this->client->post('', [
            'form_params' => array_merge([
                'api_key' => config('wefact.key', ''),
            ], $params)
        ]);

        $res = json_decode($res->getBody(), true, 1024, JSON_THROW_ON_ERROR);

        if ($res['status'] !== 'success') {
            throw new ApiException($res);
        }

        return $res;
    }

    public function __get($attr)
    {
        return $this->attributes[$attr];
    }

    public function __set($attr, $value)
    {
        if (!isset($this->original[$attr])) {
            $this->original[$attr] = $value;
        }

        $this->attributes[$attr] = $value;
    }

    public function __isset($attr)
    {
        return isset($this->$attr) && $this->$attr;
    }


    /**
     * Get the attributes that have been changed since the last sync.
     *
     * @return array
     */
    public function getDirty(): array
    {
        $dirty = collect([]);
        foreach ($this->attributes as $key => $attribute) {
            if (!isset($this->original[$key])) {
                $dirty[$key] = $attribute;
                continue;
            }

            if ($this->original[$key] !== $attribute) {
                $dirty[$key] = $attribute;
            }
        }

        return $dirty->toArray();
    }
}