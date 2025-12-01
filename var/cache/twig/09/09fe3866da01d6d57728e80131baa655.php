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

/* admin/setting.twig */
class __TwigTemplate_cf195b1199db9505f7059ca5026fb2c9 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'extra_css' => [$this, 'block_extra_css'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "layouts/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("layouts/base.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Настройки заявок";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_extra_css(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "    <link rel=\"stylesheet\" href=\"/css/admin/setting.css\">
";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "<div class=\"setting-page\">
    <div class=\"content-wrapper\">
        <h1 class=\"page-title\">Настройки заявок</h1>

        ";
        // line 14
        if ((($tmp = ($context["message"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 15
            yield "            <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["message"] ?? null));
            yield "</div>
        ";
        }
        // line 17
        yield "
        <form method=\"post\" class=\"settings-form\">
            <div class=\"form-group\">
                <label for=\"recipient_name\" class=\"form-label\">
                    И.О. Фамилия получателя заявок в Дательном падеже:
                </label>
                <input
                    type=\"text\"
                    name=\"recipient_name\"
                    id=\"recipient_name\"
                    value=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["currentValue"] ?? null));
        yield "\"
                    required
                    class=\"form-input\"
                >
            </div>
            <button type=\"submit\" class=\"form-submit\">Сохранить</button>
        </form>
    </div>
</div>

";
        // line 37
        yield from $this->load("components/notification.twig", 37)->unwrap()->yield($context);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/setting.twig";
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
        return array (  123 => 37,  110 => 27,  98 => 17,  92 => 15,  90 => 14,  84 => 10,  77 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.twig' %}

{% block title %}Настройки заявок{% endblock %}

{% block extra_css %}
    <link rel=\"stylesheet\" href=\"/css/admin/setting.css\">
{% endblock %}

{% block content %}
<div class=\"setting-page\">
    <div class=\"content-wrapper\">
        <h1 class=\"page-title\">Настройки заявок</h1>

        {% if message %}
            <div class=\"alert alert-success\">{{ message|e }}</div>
        {% endif %}

        <form method=\"post\" class=\"settings-form\">
            <div class=\"form-group\">
                <label for=\"recipient_name\" class=\"form-label\">
                    И.О. Фамилия получателя заявок в Дательном падеже:
                </label>
                <input
                    type=\"text\"
                    name=\"recipient_name\"
                    id=\"recipient_name\"
                    value=\"{{ currentValue|e }}\"
                    required
                    class=\"form-input\"
                >
            </div>
            <button type=\"submit\" class=\"form-submit\">Сохранить</button>
        </form>
    </div>
</div>

{% include 'components/notification.twig' %}
{% endblock %}", "admin/setting.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\admin\\setting.twig");
    }
}
