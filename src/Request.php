<?php
class Request
{
    private $get;
    private $post;
    private $data = [];

    public function __construct(array $get, array $post)
    {
        $this->get = $get;
        $this->post = $post;
    }

    public function getInt(string $key, int $default = null): ?int
    {
        if (isset($this->post[$key])) {
            $value = $this->post[$key];
        } elseif (isset($this->get[$key])) {
            $value = $this->get[$key];
        } else {
            return $default;
        }

        $filtered = filter_var($value, FILTER_VALIDATE_INT);
        return $filtered !== false ? $filtered : $default;
    }

    public function validate(): array
    {
        $errors = [];
        $data = [];

        $n = $this->getInt('n', 1);
        if ($n === null || $n < 1 || $n > 1000) {
            $errors[] = 'El campo "n" debe ser un entero entre 1 y 1000.';
            $data['n'] = '';
        } else {
            $data['n'] = $n;
        }

        $min = $this->getInt('min', 1);
        $max = $this->getInt('max', 10000);

        if (isset($this->post['min']) || isset($this->post['max'])) {
            if ($min === null) {
                $errors[] = 'El campo "min" debe ser un entero.';
                $data['min'] = '';
            } else {
                $data['min'] = $min;
            }

            if ($max === null) {
                $errors[] = 'El campo "max" debe ser un entero.';
                $data['max'] = '';
            } else {
                $data['max'] = $max;
            }

            if ($min !== null && $max !== null && $min >= $max) {
                $errors[] = 'El valor de "min" debe ser menor que "max".';
            }
        } else {
            $data['min'] = 1;
            $data['max'] = 10000;
        }

        $this->data = $data;

        return ['errors' => $errors, 'data' => $data];
    }

    public function all(): array
    {
        return $this->data;
    }
}