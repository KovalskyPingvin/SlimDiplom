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

/* components/footer.twig */
class __TwigTemplate_3670b054c7e9f83e6e6da602803861e4 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 2
        yield "<footer class=\"bg-dark text-white py-4\">
    <div class=\"container text-center\">
        <p>Сайт создан для обслуживания сотрудников Приамурского государственного университета имени Шолом-Алейхема.</p>
    </div>
</footer>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/footer.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/components/footer.twig #}
<footer class=\"bg-dark text-white py-4\">
    <div class=\"container text-center\">
        <p>Сайт создан для обслуживания сотрудников Приамурского государственного университета имени Шолом-Алейхема.</p>
    </div>
</footer>", "components/footer.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\components\\footer.twig");
    }
}
