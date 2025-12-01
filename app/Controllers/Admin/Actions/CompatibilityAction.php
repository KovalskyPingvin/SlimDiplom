<?php
// app/Controllers/Admin/Actions/CompatibilityAction.php
namespace App\Controllers\Admin\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Controllers\Admin\Models\CompatibilityModel;

class CompatibilityAction
{
    public function __construct(
        private Twig $view,
        private CompatibilityModel $model
    ) {}

    public function __invoke(Request $request, Response $response): Response
    {
        $queryParams = $request->getQueryParams();
        $body = $request->getParsedBody();

        // === Удаление ===
        if ($request->getMethod() === 'GET' && isset($queryParams['delete'])) {
            $printer = (string) $queryParams['delete'];
            if ($printer !== '') {
                $this->model->deleteByPrinter($printer);
            }
            return $response->withHeader('Location', '/admin/compatibility')->withStatus(302);
        }

        // === Добавление ===
        if ($request->getMethod() === 'POST' && isset($body['add_compatibility'])) {
            $printer = trim($body['printer_name'] ?? '');
            $cartridges = $body['cartridge_names'] ?? [];
            if ($printer !== '' && !empty($cartridges)) {
                $this->model->add($printer, $cartridges);
            }
            return $response->withHeader('Location', '/admin/compatibility')->withStatus(302);
        }

        // === Редактирование ===
        if ($request->getMethod() === 'POST' && isset($body['edit_compatibility'])) {
            $oldPrinter = $body['old_printer_name'] ?? '';
            $newPrinter = trim($body['new_printer_name'] ?? '');
            $cartridges = $body['edit_cartridge_names'] ?? [];
            if ($oldPrinter !== '' || $newPrinter !== '') {
                $this->model->update($oldPrinter, $newPrinter, $cartridges);
            }
            return $response->withHeader('Location', '/admin/compatibility')->withStatus(302);
        }

        // === Отображение страницы ===
        $compatibilities = $this->model->getAll();
        return $this->view->render($response, 'admin/compatibility.twig', [
            'compatibilities' => $compatibilities,
        ]);
    }
}