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

/* admin/requests.twig */
class __TwigTemplate_443eef1792608dea79dd10c5581799cb extends Template
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
        yield "Заявки пользователей";
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
        yield "    <link rel=\"stylesheet\" href=\"/css/admin/requests.css\">
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
    <script src=\"/js/admin/requests.js\"></script>
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
        yield "<div class=\"requests-admin-page\">
    <h1 class=\"h1-requests-admin\">Заявки пользователей</h1>

    ";
        // line 18
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["requests"] ?? null)) > 0)) {
            // line 19
            yield "        <table class=\"table-requests-admin\">
            <thead>
                <tr class=\"tr-requests-header\">
                    <th>Тип</th>
                    <th>Отдел</th>
                    <th>ФИО начальника</th>
                    <th>Телефон</th>
                    <th>Инвентарный номер</th>
                    <th>Устройство</th>
                    <th>Корпус</th>
                    <th>Кабинет</th>
                    <th>Причина</th>
                    <th>Дата подачи</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["requests"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["req"]) {
                // line 38
                yield "                    <tr>
                        <td>";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "type", [], "any", false, false, false, 39));
                yield "</td>
                        <td>";
                // line 40
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "department_name", [], "any", false, false, false, 40));
                yield "</td>
                        <td>";
                // line 41
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "head_full_name", [], "any", false, false, false, 41));
                yield "</td>
                        <td>";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "phone", [], "any", false, false, false, 42));
                yield "</td>
                        <td>";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "inventory_number", [], "any", false, false, false, 43));
                yield "</td>
                        <td>";
                // line 44
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "device_name", [], "any", false, false, false, 44));
                yield "</td>
                        <td>";
                // line 45
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "building_number", [], "any", false, false, false, 45));
                yield "</td>
                        <td>";
                // line 46
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "room_number", [], "any", false, false, false, 46));
                yield "</td>
                        <td>";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "reason", [], "any", false, false, false, 47));
                yield "</td>
                        <td>";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "submission_date", [], "any", false, false, false, 48), "d.m.Y H:i"), "html", null, true);
                yield "</td>
                        <td class=\"status-cell ";
                // line 49
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["req"], "status", [], "any", false, false, false, 49) == "Завершен")) ? ("status-done") : ("status-pending"));
                yield "\">
                            ";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "status", [], "any", false, false, false, 50), "html", null, true);
                yield "
                        </td>
                        <td>
                            <button class=\"btn-print\"
                                data-department=\"";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "department_name", [], "any", false, false, false, 54));
                yield "\"
                                data-chief=\"";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "head_full_name", [], "any", false, false, false, 55));
                yield "\"
                                data-phone=\"";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "phone", [], "any", false, false, false, 56));
                yield "\"
                                data-device=\"";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "device_name", [], "any", false, false, false, 57));
                yield "\"
                                data-inventory=\"";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "inventory_number", [], "any", false, false, false, 58));
                yield "\"
                                data-building=\"";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "building_number", [], "any", false, false, false, 59));
                yield "\"
                                data-room=\"";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "room_number", [], "any", false, false, false, 60));
                yield "\"
                                data-reason=\"";
                // line 61
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "reason", [], "any", false, false, false, 61));
                yield "\"
                                data-recipient=\"";
                // line 62
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["recipient_name"] ?? null));
                yield "\">  <!-- ← ЗДЕСЬ ИСПРАВЛЕНО -->
                                Печать
                            </button>
                            ";
                // line 65
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["req"], "status", [], "any", false, false, false, 65) != "Завершен")) {
                    // line 66
                    yield "                                <button class=\"btn-complete\" data-id=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "id_request", [], "any", false, false, false, 66), "html", null, true);
                    yield "\" data-type=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "type", [], "any", false, false, false, 66), "html", null, true);
                    yield "\">Завершить</button>
                            ";
                }
                // line 68
                yield "                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['req'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            yield "            </tbody>
        </table>

        ";
            // line 74
            if ((($context["total_pages"] ?? null) > 1)) {
                // line 75
                yield "            <div class=\"pagination requests-pagination\">
                ";
                // line 76
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["total_pages"] ?? null)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 77
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
                // line 79
                yield "            </div>
        ";
            }
            // line 81
            yield "
    ";
        } else {
            // line 83
            yield "        <p class=\"p-requests-empty\">Нет заявок.</p>
    ";
        }
        // line 85
        yield "</div>

<script>
    // === Обработчик кнопки \"Печать\" ===
    document.querySelectorAll('.btn-print').forEach(button => {
        button.addEventListener('click', function () {
            const data = {
                department: this.dataset.department,
                chief: this.dataset.chief,
                phone: this.dataset.phone,
                device: this.dataset.device,
                inventory: this.dataset.inventory,
                building: this.dataset.building,
                room: this.dataset.room,
                reason: this.dataset.reason,
                recipient: this.dataset.recipient, // ← используется из data-recipient
            };

            if (typeof generateDoc === 'function') {
                generateDoc(data);
            } else {
                alert('Ошибка: функция generateDoc не найдена. Проверьте подключение JS.');
            }
        });
    });

    // === Обработчик кнопки \"Завершить\" ===
    document.querySelectorAll('.btn-complete').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;
            const type = this.dataset.type;

            if (confirm('Вы действительно хотите завершить заявку?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/requests/complete';
                form.innerHTML = `
                    <input type=\"hidden\" name=\"id\" value=\"\${id}\">
                    <input type=\"hidden\" name=\"type\" value=\"\${type}\">
                    <input type=\"hidden\" name=\"action\" value=\"complete\">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
</script>

";
        // line 133
        yield from $this->load("components/notification.twig", 133)->unwrap()->yield($context);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/requests.twig";
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
        return array (  329 => 133,  279 => 85,  275 => 83,  271 => 81,  267 => 79,  254 => 77,  250 => 76,  247 => 75,  245 => 74,  240 => 71,  232 => 68,  224 => 66,  222 => 65,  216 => 62,  212 => 61,  208 => 60,  204 => 59,  200 => 58,  196 => 57,  192 => 56,  188 => 55,  184 => 54,  177 => 50,  173 => 49,  169 => 48,  165 => 47,  161 => 46,  157 => 45,  153 => 44,  149 => 43,  145 => 42,  141 => 41,  137 => 40,  133 => 39,  130 => 38,  126 => 37,  106 => 19,  104 => 18,  99 => 15,  92 => 14,  85 => 10,  78 => 9,  72 => 6,  65 => 5,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.twig' %}

{% block title %}Заявки пользователей{% endblock %}

{% block extra_css %}
    <link rel=\"stylesheet\" href=\"/css/admin/requests.css\">
{% endblock %}

{% block extra_js %}
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js\"></script>
    <script src=\"/js/admin/requests.js\"></script>
{% endblock %}

{% block content %}
<div class=\"requests-admin-page\">
    <h1 class=\"h1-requests-admin\">Заявки пользователей</h1>

    {% if requests|length > 0 %}
        <table class=\"table-requests-admin\">
            <thead>
                <tr class=\"tr-requests-header\">
                    <th>Тип</th>
                    <th>Отдел</th>
                    <th>ФИО начальника</th>
                    <th>Телефон</th>
                    <th>Инвентарный номер</th>
                    <th>Устройство</th>
                    <th>Корпус</th>
                    <th>Кабинет</th>
                    <th>Причина</th>
                    <th>Дата подачи</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                {% for req in requests %}
                    <tr>
                        <td>{{ req.type|e }}</td>
                        <td>{{ req.department_name|e }}</td>
                        <td>{{ req.head_full_name|e }}</td>
                        <td>{{ req.phone|e }}</td>
                        <td>{{ req.inventory_number|e }}</td>
                        <td>{{ req.device_name|e }}</td>
                        <td>{{ req.building_number|e }}</td>
                        <td>{{ req.room_number|e }}</td>
                        <td>{{ req.reason|e }}</td>
                        <td>{{ req.submission_date|date('d.m.Y H:i') }}</td>
                        <td class=\"status-cell {{ req.status == 'Завершен' ? 'status-done' : 'status-pending' }}\">
                            {{ req.status }}
                        </td>
                        <td>
                            <button class=\"btn-print\"
                                data-department=\"{{ req.department_name|e }}\"
                                data-chief=\"{{ req.head_full_name|e }}\"
                                data-phone=\"{{ req.phone|e }}\"
                                data-device=\"{{ req.device_name|e }}\"
                                data-inventory=\"{{ req.inventory_number|e }}\"
                                data-building=\"{{ req.building_number|e }}\"
                                data-room=\"{{ req.room_number|e }}\"
                                data-reason=\"{{ req.reason|e }}\"
                                data-recipient=\"{{ recipient_name|e }}\">  <!-- ← ЗДЕСЬ ИСПРАВЛЕНО -->
                                Печать
                            </button>
                            {% if req.status != 'Завершен' %}
                                <button class=\"btn-complete\" data-id=\"{{ req.id_request }}\" data-type=\"{{ req.type }}\">Завершить</button>
                            {% endif %}
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>

        {% if total_pages > 1 %}
            <div class=\"pagination requests-pagination\">
                {% for i in 1..total_pages %}
                    <a href=\"?page={{ i }}\" class=\"{{ i == current_page ? 'active' : '' }}\">{{ i }}</a>
                {% endfor %}
            </div>
        {% endif %}

    {% else %}
        <p class=\"p-requests-empty\">Нет заявок.</p>
    {% endif %}
</div>

<script>
    // === Обработчик кнопки \"Печать\" ===
    document.querySelectorAll('.btn-print').forEach(button => {
        button.addEventListener('click', function () {
            const data = {
                department: this.dataset.department,
                chief: this.dataset.chief,
                phone: this.dataset.phone,
                device: this.dataset.device,
                inventory: this.dataset.inventory,
                building: this.dataset.building,
                room: this.dataset.room,
                reason: this.dataset.reason,
                recipient: this.dataset.recipient, // ← используется из data-recipient
            };

            if (typeof generateDoc === 'function') {
                generateDoc(data);
            } else {
                alert('Ошибка: функция generateDoc не найдена. Проверьте подключение JS.');
            }
        });
    });

    // === Обработчик кнопки \"Завершить\" ===
    document.querySelectorAll('.btn-complete').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;
            const type = this.dataset.type;

            if (confirm('Вы действительно хотите завершить заявку?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/requests/complete';
                form.innerHTML = `
                    <input type=\"hidden\" name=\"id\" value=\"\${id}\">
                    <input type=\"hidden\" name=\"type\" value=\"\${type}\">
                    <input type=\"hidden\" name=\"action\" value=\"complete\">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
</script>

{% include 'components/notification.twig' %}
{% endblock %}", "admin/requests.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\admin\\requests.twig");
    }
}
