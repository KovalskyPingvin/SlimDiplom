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
        // === Удаление ===
        if ($request->getMethod() === 'GET' && $request->getQueryParams()['delete'] ?? null) {
            $printer = $request->getQueryParams()['delete'];
            $this->model->deleteByPrinter($printer);
            return $response->withHeader('Location', '/admin/compatibility')->withStatus(302);
        }

        // === Добавление ===
        if ($request->getMethod() === 'POST' && ($request->getParsedBody()['add_compatibility'] ?? null)) {
            $printer = trim($request->getParsedBody()['printer_name'] ?? '');
            $cartridges = $request->getParsedBody()['cartridge_names'] ?? [];
            if ($printer && $cartridges) {
                $this->model->add($printer, $cartridges);
            }
            return $response->withHeader('Location', '/admin/compatibility')->withStatus(302);
        }

        // === Редактирование ===
        if ($request->getMethod() === 'POST' && ($request->getParsedBody()['edit_compatibility'] ?? null)) {
            $oldPrinter = $request->getParsedBody()['old_printer_name'] ?? '';
            $newPrinter = trim($request->getParsedBody()['new_printer_name'] ?? '');
            $cartridges = $request->getParsedBody()['edit_cartridge_names'] ?? [];
            $this->model->update($oldPrinter, $newPrinter, $cartridges);
            return $response->withHeader('Location', '/admin/compatibility')->withStatus(302);
        }

        // === Отображение страницы ===
        $compatibilities = $this->model->getAll();
        return $this->view->render($response, 'admin/compatibility.twig', [
            'compatibilities' => $compatibilities,
        ]);
    }
}