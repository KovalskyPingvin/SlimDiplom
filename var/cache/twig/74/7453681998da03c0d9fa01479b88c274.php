<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* layouts/base.twig */
class __TwigTemplate_66b0480065747179e07d0b906d3de20c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'extra_css' => [$this, 'block_extra_css'],
            'content' => [$this, 'block_content'],
            'extra_js' => [$this, 'block_extra_js'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link rel=\"stylesheet\" href=\"/css/style.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">
    ";
        // line 9
        yield from $this->unwrap()->yieldBlock('extra_css', $context, $blocks);
        // line 10
        yield "</head>
<body>

";
        // line 13
        yield from $this->load("components/navbar.twig", 13)->unwrap()->yield($context);
        // line 14
        yield "
<!-- Flash-уведомления -->
";
        // line 16
        if ((($tmp = ($context["flash"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 17
            yield "    <div class=\"flash-message flash-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["flash"] ?? null), "type", [], "any", false, false, false, 17), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["flash"] ?? null), "message", [], "any", false, false, false, 17));
            yield "</div>
";
        }
        // line 19
        yield "
<main>
    ";
        // line 21
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 22
        yield "</main>

";
        // line 24
        yield from $this->load("components/footer.twig", 24)->unwrap()->yield($context);
        // line 25
        yield "
<!-- Login Modal -->
<div id=\"loginModal\" class=\"modal-overlay\">
    <div class=\"modal-container\">
        <button class=\"modal-close\" id=\"closeModal\">&times;</button>
        <h1 class=\"modal-title\">Вход в систему</h1>
        <form id=\"loginForm\">
            <input type=\"text\" id=\"InputLogin\" class=\"modal-input\" placeholder=\"Логин\" required>
            <input type=\"password\" id=\"InputPassword\" class=\"modal-input\" placeholder=\"Пароль\" required>
            <label class=\"remember-label\">
                <input type=\"checkbox\" id=\"rememberMe\"> Запомнить меня
            </label>
            <div id=\"loginError\" class=\"modal-error\"></div>
            <button type=\"submit\" class=\"modal-submit\">Войти</button>
        </form>
    </div>
</div>

<!-- Модальное окно уведомлений -->
<div id=\"notificationModal\" class=\"modal-overlay\">
    <div class=\"modal-container\">
        <button class=\"modal-close\" id=\"closeNotificationModal\">&times;</button>
        <h1 class=\"modal-title\">Уведомления</h1>
        <div id=\"notificationContent\">
            <p>Пока нет уведомлений.</p>
        </div>
    </div>
</div>

<script src=\"/js/app.js\"></script>
";
        // line 55
        yield from $this->unwrap()->yieldBlock('extra_js', $context, $blocks);
        // line 56
        yield "
<!-- Скрипт для скрытия flash-уведомлений -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const flashMsg = document.querySelector('.flash-message');
    if (flashMsg) {
        setTimeout(() => {
            flashMsg.style.opacity = '0';
            setTimeout(() => flashMsg.remove(), 500);
        }, 3000); // Через 3 секунды исчезает
    }
});
</script>
</body>
</html>";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "ITech";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_extra_css(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 21
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 55
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_extra_js(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layouts/base.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  178 => 55,  168 => 21,  158 => 9,  147 => 6,  128 => 56,  126 => 55,  94 => 25,  92 => 24,  88 => 22,  86 => 21,  82 => 19,  74 => 17,  72 => 16,  68 => 14,  66 => 13,  61 => 10,  59 => 9,  53 => 6,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "layouts/base.twig", "C:\\OSPanel\\domains\\localhost\\templates\\layouts\\base.twig");
    }
}
