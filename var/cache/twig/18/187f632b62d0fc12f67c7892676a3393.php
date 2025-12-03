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
class __TwigTemplate_48330b6e4548dad84982892832dc07a1 extends Template
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

    <!-- Фильтр \"Только незавершенные\" -->
    <div class=\"request-filter\">
        <label>
            <input type=\"checkbox\" id=\"filter-incomplete\" ";
        // line 21
        if ((($tmp = ($context["show_only_pending"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "checked";
        }
        yield ">
            Показать только незавершенные
        </label>
    </div>

    ";
        // line 26
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["requests"] ?? null)) > 0)) {
            // line 27
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
            // line 45
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["requests"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["req"]) {
                // line 46
                yield "                    <tr>
                        <td>";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "type", [], "any", false, false, false, 47));
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
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "submission_date", [], "any", false, false, false, 56), "d.m.Y"), "html", null, true);
                yield "</td>  <!-- ← Исправлено -->
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
                            ";
                // line 73
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["req"], "status", [], "any", false, false, false, 73) != "Завершен")) {
                    // line 74
                    yield "                                <button class=\"btn-complete\" data-id=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "id_request", [], "any", false, false, false, 74), "html", null, true);
                    yield "\" data-type=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "type", [], "any", false, false, false, 74), "html", null, true);
                    yield "\">Завершить</button>
                            ";
                }
                // line 76
                yield "                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['req'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            yield "            </tbody>
        </table>

        ";
            // line 82
            if ((($context["total_pages"] ?? null) > 1)) {
                // line 83
                yield "            <div class=\"pagination requests-pagination\">
                ";
                // line 84
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["total_pages"] ?? null)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 85
                    yield "                    <a href=\"?page=";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    if ((($tmp = ($context["show_only_pending"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "&status=pending";
                    }
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
                // line 87
                yield "            </div>
        ";
            }
            // line 89
            yield "
    ";
        } else {
            // line 91
            yield "        <p class=\"p-requests-empty\">Нет заявок.</p>
    ";
        }
        // line 93
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
                recipient: this.dataset.recipient,
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
        button.addEventListener('click', function (e) {
            e.preventDefault();

            if (confirm('Вы действительно хотите завершить заявку?')) {
                const id = this.dataset.id;
                const type = this.dataset.type;

                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/requests/complete';
                form.innerHTML = `
                    <input type=\"hidden\" name=\"id\" value=\"\${id}\">
                    <input type=\"hidden\" name=\"type\" value=\"\${type}\">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    });

    // === Фильтр \"Только незавершенные\" ===
    document.getElementById('filter-incomplete').addEventListener('change', function() {
        const showOnlyPending = this.checked;
        const url = new URL(window.location.href);
        if (showOnlyPending) {
            url.searchParams.set('status', 'pending');
        } else {
            url.searchParams.delete('status');
        }
        window.location.href = url.toString();
    });
</script>

";
        // line 154
        yield from $this->load("components/notification.twig", 154)->unwrap()->yield($context);
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
        return array (  358 => 154,  295 => 93,  291 => 91,  287 => 89,  283 => 87,  267 => 85,  263 => 84,  260 => 83,  258 => 82,  253 => 79,  245 => 76,  237 => 74,  235 => 73,  229 => 70,  225 => 69,  221 => 68,  217 => 67,  213 => 66,  209 => 65,  205 => 64,  201 => 63,  197 => 62,  190 => 58,  186 => 57,  182 => 56,  178 => 55,  174 => 54,  170 => 53,  166 => 52,  162 => 51,  158 => 50,  154 => 49,  150 => 48,  146 => 47,  143 => 46,  139 => 45,  119 => 27,  117 => 26,  107 => 21,  99 => 15,  92 => 14,  85 => 10,  78 => 9,  72 => 6,  65 => 5,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "admin/requests.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\admin\\requests.twig");
    }
}
