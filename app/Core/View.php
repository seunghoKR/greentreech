<?php
declare(strict_types=1);

namespace {
    if (!function_exists('e')) {
        function e(mixed $value): string {
            return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
        }
    }
}

namespace App\Core {

use App\Models\Setting;

class View
{
    public static function render(string $template, array $data = [], string $layout = 'layouts/main'): void
    {
        // Global settings available to all views
        $globalSettings = Setting::getAllAsMap();
        $csrfToken = Session::getCsrfToken();
        $flashSuccess = Session::getFlash('success');
        $flashError = Session::getFlash('error');
        $flashInfo = Session::getFlash('info');

        // Extract variables for view
        extract($globalSettings, EXTR_SKIP);
        extract($data);

        // Capture content
        $viewFile = __DIR__ . '/../Views/' . $template . '.php';
        if (!file_exists($viewFile)) {
            echo "View template [{$template}] not found.";
            return;
        }

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        // Render layout if specified
        if ($layout) {
            $layoutFile = __DIR__ . '/../Views/' . $layout . '.php';
            if (file_exists($layoutFile)) {
                require $layoutFile;
                return;
            }
        }

        echo $content;
    }

    public static function escape(mixed $value): string
    {
        return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
    }
}
}
