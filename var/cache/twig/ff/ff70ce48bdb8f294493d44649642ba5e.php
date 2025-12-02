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

/* user/requests_user.twig */
class __TwigTemplate_794857275e7096739a01fcf902a3a129 extends Template
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
            'extra_js' => [$this, 'block_extra_js'],
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
        yield "Мои заявки";
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
        yield "    <link rel=\"stylesheet\" href=\"/css/user/requests_user.css\">
";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_extra_js(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js\"></script>
    <script src=\"/js/user/requests_user.js\"></script>
";
        yield from [];
    }

    // line 14
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 15
        yield "<div class=\"requests-user-page\">
    <h1 class=\"h1-requests-user\">Мои заявки</h1>

    <div class=\"request-filter\">
        <label>
            <input type=\"checkbox\" id=\"filter-incomplete\">
            Показать только незавершенные
        </label>
    </div>

    ";
        // line 25
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["requests"] ?? null)) > 0)) {
            // line 26
            yield "        <div class=\"table-wrapper\">
            <table class=\"table-requests-user\">
                <thead>
                    <tr>
                        <th>Тип</th>
                        <th>Отдел</th>
                        <th>Начальник отдела</th>
                        <th>Телефон</th>
                        <th>Инв. номер</th>
                        <th>Устройство</th>
                        <th>Корпус</th>
                        <th>Кабинет</th>
                        <th>Причина</th>
                        <th>Дата</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 45
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["requests"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["req"]) {
                // line 46
                yield "                        <tr data-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "id_request", [], "any", false, false, false, 46), "html", null, true);
                yield "\" data-type=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "request_type", [], "any", false, false, false, 46), "html", null, true);
                yield "\">
                            <td>";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "request_type", [], "any", false, false, false, 47));
                yield "</td>
                            <td>";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "department_name", [], "any", false, false, false, 48));
                yield "</td>
                            <td>";
                // line 49
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "head_full_name", [], "any", false, false, false, 49));
                yield "</td>
                            <td>";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "phone", [], "any", false, false, false, 50));
                yield "</td>
                            <td>";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "inventory_number", [], "any", false, false, false, 51));
                yield "</td>
                            <td>";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "device_name", [], "any", false, false, false, 52));
                yield "</td>
                            <td>";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "building_number", [], "any", false, false, false, 53));
                yield "</td>
                            <td>";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "room_number", [], "any", false, false, false, 54));
                yield "</td>
                            <td>";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "reason", [], "any", false, false, false, 55));
                yield "</td>
                            <td>";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "submission_date", [], "any", false, false, false, 56), "d.m.Y H:i"), "html", null, true);
                yield "</td>
                            <td class=\"status-cell ";
                // line 57
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["req"], "status", [], "any", false, false, false, 57) == "Завершен")) ? ("status-done") : ("status-pending"));
                yield "\">
                                ";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "status", [], "any", false, false, false, 58), "html", null, true);
                yield "
                            </td>
                            <td>
                                <button class=\"btn-print\"
                                    data-department=\"";
                // line 62
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "department_name", [], "any", false, false, false, 62));
                yield "\"
                                    data-chief=\"";
                // line 63
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "head_full_name", [], "any", false, false, false, 63));
                yield "\"
                                    data-phone=\"";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "phone", [], "any", false, false, false, 64));
                yield "\"
                                    data-device=\"";
                // line 65
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "device_name", [], "any", false, false, false, 65));
                yield "\"
                                    data-inventory=\"";
                // line 66
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "inventory_number", [], "any", false, false, false, 66));
                yield "\"
                                    data-building=\"";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "building_number", [], "any", false, false, false, 67));
                yield "\"
                                    data-room=\"";
                // line 68
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "room_number", [], "any", false, false, false, 68));
                yield "\"
                                    data-reason=\"";
                // line 69
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "reason", [], "any", false, false, false, 69));
                yield "\"
                                    data-recipient=\"";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["recipient_name"] ?? null));
                yield "\">
                                    Печать
                                </button>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['req'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            yield "                </tbody>
            </table>
        </div>

        ";
            // line 80
            if ((($context["total_pages"] ?? null) > 1)) {
                // line 81
                yield "            <div class=\"pagination requests-pagination\">
                ";
                // line 82
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["total_pages"] ?? null)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 83
                    yield "                    <a href=\"?page=";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "\" class=\"";
                    yield ((($context["i"] == ($context["current_page"] ?? null))) ? ("active") : (""));
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "</a>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 85
                yield "            </div>
        ";
            }
            // line 87
            yield "
    ";
        } else {
            // line 89
            yield "        <p class=\"p-requests-empty\">У вас пока нет заявок.</p>
    ";
        }
        // line 91
        yield "</div>

<script>
    // === Фильтр заявок ===
    document.getElementById('filter-incomplete').addEventListener('change', function() {
        const showOnlyIncomplete = this.checked;
        document.querySelectorAll('.table-requests-user tbody tr').forEach(row => {
            const statusCell = row.querySelector('.status-cell');
            if (!statusCell) return;

            const status = statusCell.textContent.trim();
            if (showOnlyIncomplete) {
                if (status === \"Завершен\") {
                    row.style.display = \"none\";
                }
            } else {
                row.style.display = \"\";
            }
        });
    });
</script>

";
        // line 113
        yield from $this->load("components/notification.twig", 113)->unwrap()->yield($context);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "user/requests_user.twig";
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
        return array (  304 => 113,  280 => 91,  276 => 89,  272 => 87,  268 => 85,  255 => 83,  251 => 82,  248 => 81,  246 => 80,  240 => 76,  228 => 70,  224 => 69,  220 => 68,  216 => 67,  212 => 66,  208 => 65,  204 => 64,  200 => 63,  196 => 62,  189 => 58,  185 => 57,  181 => 56,  177 => 55,  173 => 54,  169 => 53,  165 => 52,  161 => 51,  157 => 50,  153 => 49,  149 => 48,  145 => 47,  138 => 46,  134 => 45,  113 => 26,  111 => 25,  99 => 15,  92 => 14,  85 => 10,  78 => 9,  72 => 6,  65 => 5,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "user/requests_user.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\user\\requests_user.twig");
    }
}
