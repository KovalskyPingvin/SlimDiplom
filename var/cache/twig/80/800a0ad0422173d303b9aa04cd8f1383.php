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
class __TwigTemplate_53615c0637e145e299bf9fa4beef3cce extends Template
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
</head>
<body>

";
        // line 12
        yield from $this->load("components/navbar.twig", 12)->unwrap()->yield($context);
        // line 13
        yield "
<main>
    ";
        // line 15
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 16
        yield "</main>

";
        // line 18
        yield from $this->load("components/footer.twig", 18)->unwrap()->yield($context);
        // line 19
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

<script src=\"/js/app.js\"></script>
";
        // line 38
        yield from $this->unwrap()->yieldBlock('extra_js', $context, $blocks);
        // line 39
        yield "</body>
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

    // line 15
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 38
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
        return array (  125 => 38,  115 => 15,  104 => 6,  98 => 39,  96 => 38,  75 => 19,  73 => 18,  69 => 16,  67 => 15,  63 => 13,  61 => 12,  52 => 6,  45 => 1,);
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
</head>
<body>

{% include 'components/navbar.twig' %}

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

<script src=\"/js/app.js\"></script>
{% block extra_js %}{% endblock %}
</body>
</html>", "layouts/base.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\layouts\\base.twig");
    }
}
