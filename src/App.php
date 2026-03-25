<?php
class App
{
    private $request;
    private $renderer;

    public function __construct(Request $request, Renderer $renderer)
    {
        $this->request = $request;
        $this->renderer = $renderer;
    }

    public function run(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handlePost();
        } else {
            $this->handleGet();
        }
    }

    private function handlePost(): void
    {
        $validation = $this->request->validate();

        if (!empty($validation['errors'])) {
            $_SESSION['errors'] = $validation['errors'];
            $_SESSION['previous_input'] = $validation['data'];
            header('Location: ./index.php');
            exit;
        }

        $data = $validation['data'];
        $generator = new RandomGenerator($data['n'], $data['min'], $data['max']);
        $numbers = $generator->generate();

        $_SESSION['results'] = [
            'numbers' => $numbers,
            'stats' => [
                'sum' => $generator->getSum(),
                'average' => $generator->getAverage(),
                'min' => $generator->getMin(),
                'max' => $generator->getMax()
            ],
            'input' => $data
        ];

        header('Location: ./index.php');
        exit;
    }

    private function handleGet(): void
    {
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
        $previousInput = isset($_SESSION['previous_input']) ? $_SESSION['previous_input'] : [];
        $results = isset($_SESSION['results']) ? $_SESSION['results'] : null;

        unset($_SESSION['errors']);
        unset($_SESSION['previous_input']);
        unset($_SESSION['results']);

        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Generador de Números Aleatorios</title>';
        echo '<style>';
        echo '* { box-sizing: border-box; margin: 0; padding: 0; }';
        echo 'body { font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 100vh; padding: 2rem; }';
        echo '.container { max-width: 800px; margin: 0 auto; }';
        echo 'h1 { color: white; text-align: center; font-size: 2.5rem; margin-bottom: 2rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }';
        echo '.errors { background: #ff6b6b; color: white; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; }';
        echo '.errors p { margin: 0.5rem 0; }';
        echo '</style>';
        echo '</head>';
        echo '<body>';
        echo '<div class="container">';
        echo '<h1>Generador de Números Aleatorios</h1>';

        if (!empty($errors)) {
            echo '<div class="errors">';
            foreach ($errors as $error) {
                echo '<p>' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
            }
            echo '</div>';
        }

        echo $this->renderer->renderForm($previousInput);

        if ($results !== null) {
            echo $this->renderer->renderResults(
                $results['numbers'],
                $results['stats'],
                $results['input']
            );
        }

        echo '</body>';
        echo '</html>';
    }
}