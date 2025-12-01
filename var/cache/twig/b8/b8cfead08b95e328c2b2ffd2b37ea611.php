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

/* components/navbar.twig */
class __TwigTemplate_573de41efa2ec320cec9f0e2b025f24c extends Template
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
        yield "<div class=\"sidebar\" id=\"sidebar\">
    <button class=\"navbar-toggler\" id=\"navbarToggle\">&#9776;</button>
    <div class=\"sidebar-content\">
        <div class=\"sidebar-top\">
            <a href=\"/\"><i class=\"fas fa-home\"></i> <span class=\"link-text\">Главная</span></a>
            <a href=\"/about\"><i class=\"fas fa-book\"></i> <span class=\"link-text\">Документация</span></a>
        </div>

        <div class=\"sidebar-bottom\">
            ";
        // line 11
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id_user", [], "any", true, true, false, 11)) {
            // line 12
            yield "                <div class=\"user-info\">
                    <i class=\"fas fa-user\"></i> <span class=\"link-text\">";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "username", [], "any", false, false, false, 13));
            yield "</span>
                </div>

                <button type=\"button\" id=\"notificationButton\" class=\"sidebar-btn\">
                    <i class=\"fas fa-bell\"></i> <span class=\"link-text\">Уведомления</span>
                </button>

                ";
            // line 20
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id_user", [], "any", false, false, false, 20) >= 0)) {
                // line 21
                yield "                    <a href=\"/sending\" class=\"sidebar-btn\">
                        <i class=\"fas fa-paper-plane\"></i> <span class=\"link-text\">Подать заявку</span>
                    </a>
                    <a href=\"/requests\" class=\"sidebar-btn\">
                        <i class=\"fas fa-list\"></i> <span class=\"link-text\">Заявки</span>
                    </a>
                ";
            }
            // line 28
            yield "
                ";
            // line 29
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "id_user", [], "any", false, false, false, 29) <= 2)) {
                // line 30
                yield "                    <a href=\"/admin\" class=\"sidebar-btn\">
                        <i class=\"fas fa-tools\"></i> <span class=\"link-text\">Администрирование</span>
                    </a>
                ";
            }
            // line 34
            yield "
                <a href=\"/logout\" class=\"logout-btn\">
                    <i class=\"fas fa-sign-out-alt\"></i> <span class=\"link-text\">Выйти</span>
                </a>
            ";
        } else {
            // line 39
            yield "                <a href=\"#\" id=\"loginButton\" class=\"login-btn\">
                    <i class=\"fas fa-sign-in-alt\"></i> <span class=\"link-text\">Войти</span>
                </a>
            ";
        }
        // line 43
        yield "        </div>
    </div>
</div>

<script>
    document.getElementById('navbarToggle')?.addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        sidebar?.classList.toggle('active');
    });
</script>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/navbar.twig";
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
        return array (  103 => 43,  97 => 39,  90 => 34,  84 => 30,  82 => 29,  79 => 28,  70 => 21,  68 => 20,  58 => 13,  55 => 12,  53 => 11,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/components/navbar.twig #}
<div class=\"sidebar\" id=\"sidebar\">
    <button class=\"navbar-toggler\" id=\"navbarToggle\">&#9776;</button>
    <div class=\"sidebar-content\">
        <div class=\"sidebar-top\">
            <a href=\"/\"><i class=\"fas fa-home\"></i> <span class=\"link-text\">Главная</span></a>
            <a href=\"/about\"><i class=\"fas fa-book\"></i> <span class=\"link-text\">Документация</span></a>
        </div>

        <div class=\"sidebar-bottom\">
            {% if session.id_user is defined %}
                <div class=\"user-info\">
                    <i class=\"fas fa-user\"></i> <span class=\"link-text\">{{ session.username|e }}</span>
                </div>

                <button type=\"button\" id=\"notificationButton\" class=\"sidebar-btn\">
                    <i class=\"fas fa-bell\"></i> <span class=\"link-text\">Уведомления</span>
                </button>

                {% if session.id_user >= 0 %}
                    <a href=\"/sending\" class=\"sidebar-btn\">
                        <i class=\"fas fa-paper-plane\"></i> <span class=\"link-text\">Подать заявку</span>
                    </a>
                    <a href=\"/requests\" class=\"sidebar-btn\">
                        <i class=\"fas fa-list\"></i> <span class=\"link-text\">Заявки</span>
                    </a>
                {% endif %}

                {% if session.id_user <= 2 %}
                    <a href=\"/admin\" class=\"sidebar-btn\">
                        <i class=\"fas fa-tools\"></i> <span class=\"link-text\">Администрирование</span>
                    </a>
                {% endif %}

                <a href=\"/logout\" class=\"logout-btn\">
                    <i class=\"fas fa-sign-out-alt\"></i> <span class=\"link-text\">Выйти</span>
                </a>
            {% else %}
                <a href=\"#\" id=\"loginButton\" class=\"login-btn\">
                    <i class=\"fas fa-sign-in-alt\"></i> <span class=\"link-text\">Войти</span>
                </a>
            {% endif %}
        </div>
    </div>
</div>

<script>
    document.getElementById('navbarToggle')?.addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        sidebar?.classList.toggle('active');
    });
</script>", "components/navbar.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\components\\navbar.twig");
    }
}
