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
class __TwigTemplate_a4ac73a03da5b80a49927259b0e6df72 extends Template
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
            yield "\">
        ";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["flash"] ?? null), "message", [], "any", false, false, false, 18));
            yield "
    </div>
";
        }
        // line 21
        yield "
<main>
    ";
        // line 23
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 24
        yield "</main>

";
        // line 26
        yield from $this->load("components/footer.twig", 26)->unwrap()->yield($context);
        // line 27
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
        // line 57
        yield from $this->unwrap()->yieldBlock('extra_js', $context, $blocks);
        // line 58
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

    // line 23
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 57
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
        return array (  181 => 57,  171 => 23,  161 => 9,  150 => 6,  131 => 58,  129 => 57,  97 => 27,  95 => 26,  91 => 24,  89 => 23,  85 => 21,  79 => 18,  74 => 17,  72 => 16,  68 => 14,  66 => 13,  61 => 10,  59 => 9,  53 => 6,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}ITech{% endblock %}</title>
    <link rel=\"stylesheet\" href=\"/css/style.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css\">
    {% block extra_css %}{% endblock %}
</head>
<body>

{% include 'components/navbar.twig' %}

<!-- Flash-уведомления -->
{% if flash %}
    <div class=\"flash-message flash-{{ flash.type }}\">
        {{ flash.message|e }}
    </div>
{% endif %}

<main>
    {% block content %}{% endblock %}
</main>

{% include 'components/footer.twig' %}

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
{% block extra_js %}{% endblock %}

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
</html>", "layouts/base.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\layouts\\base.twig");
    }
}
