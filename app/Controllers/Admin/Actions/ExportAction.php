$app->get('/admin/export', \App\Controllers\Admin\Actions\ExportAction::class)
    ->add(\App\Middleware\AuthMiddleware::class);