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

/* admin/writeoff.twig */
class __TwigTemplate_d0cccde5e4abf2bb20c07bea8a65778c extends Template
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
        yield "Списание оборудования и картриджей";
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
        yield "    <link rel=\"stylesheet\" href=\"/css/admin/writeoff.css\">
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
        yield "<div class=\"writeoff-page\">
    <div class=\"content-wrapper\">
        <h1 style=\"text-align:center; margin-top:20px;\">Списание оборудования и картриджей</h1>

        <div class=\"tables-container\">

            <!-- Левая таблица - Склад -->
            <div class=\"table-wrapper\" id=\"stock-wrapper\">
                <h2>Склад</h2>
                <input type=\"text\" class=\"search-input\" id=\"searchStock\" placeholder=\"Поиск по складу...\">

                <table id=\"stockTable\">
                    <thead>
                        <tr>
                            <th>Тип</th>
                            <th>Название</th>
                            <th>Инвентарный номер</th>
                            <th>Количество</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["cartridges_stock"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 32
            yield "                        <tr data-id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 32), "html", null, true);
            yield "\"
                            data-type=\"cartridge\"
                            data-name=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 34));
            yield "\"
                            data-inv=\"";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "inventory_number", [], "any", false, false, false, 35));
            yield "\"
                            data-qty=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 36), "html", null, true);
            yield "\">
                            <td>Картридж</td>
                            <td>";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 38));
            yield "</td>
                            <td>";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "inventory_number", [], "any", false, false, false, 39));
            yield "</td>
                            <td>";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 40), "html", null, true);
            yield "</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        yield "
                    ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tech_stock"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 45
            yield "                        <tr data-id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 45), "html", null, true);
            yield "\"
                            data-type=\"tech\"
                            data-name=\"";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 47));
            yield "\"
                            data-inv=\"";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "inventory_number", [], "any", false, false, false, 48));
            yield "\"
                            data-qty=\"";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 49), "html", null, true);
            yield "\">
                            <td>Техника</td>
                            <td>";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 51));
            yield "</td>
                            <td>";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "inventory_number", [], "any", false, false, false, 52));
            yield "</td>
                            <td>";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 53), "html", null, true);
            yield "</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        yield "                    </tbody>
                </table>
            </div>

            <!-- Кнопки стрелок -->
            <div class=\"buttons-middle\">
                <button id=\"btnToWriteoff\" class=\"btn-arrow\" disabled title=\"Переместить в списание\">&#8594;</button>
                <button id=\"btnToStock\" class=\"btn-arrow\" disabled title=\"Вернуть на склад\">&#8592;</button>
            </div>

            <!-- Правая таблица - Списание -->
            <div class=\"table-wrapper\" id=\"writeoff-wrapper\">
                <div class=\"header-writeoff\" style=\"gap:10px;\">
                    <h2>Списание</h2>
                    <div>
                        <button class=\"btn-export\" onclick=\"openExportModal()\" style=\"margin-right:10px;\">Экспорт</button>
                        <button id=\"btnDeleteAll\" class=\"btn-delete-all\">Списать</button>
                    </div>
                </div>
                <input type=\"text\" class=\"search-input\" id=\"searchWriteoff\" placeholder=\"Поиск по списанию...\">

                <table id=\"writeoffTable\">
                    <thead>
                        <tr>
                            <th>Тип</th>
                            <th>Название</th>
                            <th>Инвентарный номер</th>
                            <th>Количество</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["cartridges_writeoff"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 88
            yield "                        <tr data-id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 88), "html", null, true);
            yield "\"
                            data-type=\"cartridge\"
                            data-name=\"";
            // line 90
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 90));
            yield "\"
                            data-inv=\"";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "inventory_number", [], "any", false, false, false, 91));
            yield "\"
                            data-qty=\"";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 92), "html", null, true);
            yield "\">
                            <td>Картридж</td>
                            <td>";
            // line 94
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 94));
            yield "</td>
                            <td>";
            // line 95
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "inventory_number", [], "any", false, false, false, 95));
            yield "</td>
                            <td>";
            // line 96
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 96), "html", null, true);
            yield "</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        yield "
                    ";
        // line 100
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tech_writeoff"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 101
            yield "                        <tr data-id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 101), "html", null, true);
            yield "\"
                            data-type=\"tech\"
                            data-name=\"";
            // line 103
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 103));
            yield "\"
                            data-inv=\"";
            // line 104
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "inventory_number", [], "any", false, false, false, 104));
            yield "\"
                            data-qty=\"";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 105), "html", null, true);
            yield "\">
                            <td>Техника</td>
                            <td>";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 107));
            yield "</td>
                            <td>";
            // line 108
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "inventory_number", [], "any", false, false, false, 108));
            yield "</td>
                            <td>";
            // line 109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 109), "html", null, true);
            yield "</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 112
        yield "                    </tbody>
                </table>
            </div>
        </div>

        <!-- Модалка подтверждения удаления -->
        <div class=\"modal-overlay\" id=\"modalConfirmDelete\">
            <div class=\"modal-container-writeoff\">
                <p>Вы действительно хотите удалить все элементы списания? При удалении они исчезнут из списания и склада!</p>
                <div class=\"modal-buttons\">
                    <form method=\"POST\" id=\"formDeleteAll\" style=\"display:inline;\">
                        <input type=\"hidden\" name=\"action\" value=\"delete_all\">
                        <button type=\"submit\" class=\"modal-button confirm\">Да</button>
                    </form>
                    <button class=\"modal-button cancel\" onclick=\"closeModalConfirm()\">Нет</button>
                </div>
            </div>
        </div>

        <!-- Модальное окно экспорта -->
        <div class=\"modal-overlay\" id=\"modalExport\">
            <div class=\"modal-container\">
                <h3>Выберите формат экспорта</h3>
                <div class=\"modal-buttons\">
                    <form method=\"POST\" action=\"/admin/writeoff/export\" style=\"display:inline;\">
                        <input type=\"hidden\" name=\"format\" value=\"excel\">
                        <button type=\"submit\" class=\"modal-button confirm\" style=\"background-color: #28a745;\">Excel</button>
                    </form>
                    <form method=\"POST\" action=\"/admin/writeoff/export\" style=\"display:inline;\">
                        <input type=\"hidden\" name=\"format\" value=\"word\">
                        <button type=\"submit\" class=\"modal-button confirm\" style=\"background-color: #007bff;\">Word</button>
                    </form>
                    <button type=\"button\" class=\"modal-button cancel\" onclick=\"closeExportModal()\">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Выбор строки
    function setupRowSelection(tableId, btnId) {
        const table = document.getElementById(tableId);
        const btn = document.getElementById(btnId);
        let selectedRow = null;

        table.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('click', () => {
                if (selectedRow) selectedRow.classList.remove('selected');
                if (selectedRow === row) {
                    // Снять выбор
                    selectedRow = null;
                    btn.disabled = true;
                } else {
                    selectedRow = row;
                    row.classList.add('selected');
                    btn.disabled = false;
                }
            });
        });

        return () => selectedRow;
    }

    // Фильтрация таблиц
    function setupSearch(inputId, tableId) {
        const input = document.getElementById(inputId);
        const table = document.getElementById(tableId);

        input.addEventListener('input', () => {
            const filter = input.value.toLowerCase();
            table.querySelectorAll('tbody tr').forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    }

    const getSelectedStockRow = setupRowSelection('stockTable', 'btnToWriteoff');
    const getSelectedWriteoffRow = setupRowSelection('writeoffTable', 'btnToStock');

    setupSearch('searchStock', 'stockTable');
    setupSearch('searchWriteoff', 'writeoffTable');

    const btnToWriteoff = document.getElementById('btnToWriteoff');
    const btnToStock = document.getElementById('btnToStock');

    btnToWriteoff.addEventListener('click', () => {
        const selected = getSelectedStockRow();
        if (!selected) return;

        const data = {
            action: 'move_to_writeoff',
            type: selected.getAttribute('data-type'),
            id: parseInt(selected.getAttribute('data-id'))
        };

        sendPost(data);
    });

    btnToStock.addEventListener('click', () => {
        const selected = getSelectedWriteoffRow();
        if (!selected) return;

        const data = {
            action: 'move_to_stock',
            type: selected.getAttribute('data-type'),
            id: parseInt(selected.getAttribute('data-id'))
        };

        sendPost(data);
    });

    // Кнопка удалить все - открывает модалку
    document.getElementById('btnDeleteAll').addEventListener('click', () => {
        document.getElementById('modalConfirmDelete').classList.add('active');
    });

    function closeModalConfirm() {
        document.getElementById('modalConfirmDelete').classList.remove('active');
    }

    // Функция отправки POST-запроса с данными формы
    function sendPost(data) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.style.display = 'none';

        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = data[key];
                form.appendChild(input);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }

    function openExportModal() {
        document.getElementById('modalExport').classList.add('active');
    }

    function closeExportModal() {
        document.getElementById('modalExport').classList.remove('active');
    }
</script>

";
        // line 263
        yield from $this->load("components/notification.twig", 263)->unwrap()->yield($context);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/writeoff.twig";
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
        return array (  459 => 263,  306 => 112,  297 => 109,  293 => 108,  289 => 107,  284 => 105,  280 => 104,  276 => 103,  270 => 101,  266 => 100,  263 => 99,  254 => 96,  250 => 95,  246 => 94,  241 => 92,  237 => 91,  233 => 90,  227 => 88,  223 => 87,  190 => 56,  181 => 53,  177 => 52,  173 => 51,  168 => 49,  164 => 48,  160 => 47,  154 => 45,  150 => 44,  147 => 43,  138 => 40,  134 => 39,  130 => 38,  125 => 36,  121 => 35,  117 => 34,  111 => 32,  107 => 31,  84 => 10,  77 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.twig' %}

{% block title %}Списание оборудования и картриджей{% endblock %}

{% block extra_css %}
    <link rel=\"stylesheet\" href=\"/css/admin/writeoff.css\">
{% endblock %}

{% block content %}
<div class=\"writeoff-page\">
    <div class=\"content-wrapper\">
        <h1 style=\"text-align:center; margin-top:20px;\">Списание оборудования и картриджей</h1>

        <div class=\"tables-container\">

            <!-- Левая таблица - Склад -->
            <div class=\"table-wrapper\" id=\"stock-wrapper\">
                <h2>Склад</h2>
                <input type=\"text\" class=\"search-input\" id=\"searchStock\" placeholder=\"Поиск по складу...\">

                <table id=\"stockTable\">
                    <thead>
                        <tr>
                            <th>Тип</th>
                            <th>Название</th>
                            <th>Инвентарный номер</th>
                            <th>Количество</th>
                        </tr>
                    </thead>
                    <tbody>
                    {% for item in cartridges_stock %}
                        <tr data-id=\"{{ item.id }}\"
                            data-type=\"cartridge\"
                            data-name=\"{{ item.name|e }}\"
                            data-inv=\"{{ item.inventory_number|e }}\"
                            data-qty=\"{{ item.quantity }}\">
                            <td>Картридж</td>
                            <td>{{ item.name|e }}</td>
                            <td>{{ item.inventory_number|e }}</td>
                            <td>{{ item.quantity }}</td>
                        </tr>
                    {% endfor %}

                    {% for item in tech_stock %}
                        <tr data-id=\"{{ item.id }}\"
                            data-type=\"tech\"
                            data-name=\"{{ item.name|e }}\"
                            data-inv=\"{{ item.inventory_number|e }}\"
                            data-qty=\"{{ item.quantity }}\">
                            <td>Техника</td>
                            <td>{{ item.name|e }}</td>
                            <td>{{ item.inventory_number|e }}</td>
                            <td>{{ item.quantity }}</td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>

            <!-- Кнопки стрелок -->
            <div class=\"buttons-middle\">
                <button id=\"btnToWriteoff\" class=\"btn-arrow\" disabled title=\"Переместить в списание\">&#8594;</button>
                <button id=\"btnToStock\" class=\"btn-arrow\" disabled title=\"Вернуть на склад\">&#8592;</button>
            </div>

            <!-- Правая таблица - Списание -->
            <div class=\"table-wrapper\" id=\"writeoff-wrapper\">
                <div class=\"header-writeoff\" style=\"gap:10px;\">
                    <h2>Списание</h2>
                    <div>
                        <button class=\"btn-export\" onclick=\"openExportModal()\" style=\"margin-right:10px;\">Экспорт</button>
                        <button id=\"btnDeleteAll\" class=\"btn-delete-all\">Списать</button>
                    </div>
                </div>
                <input type=\"text\" class=\"search-input\" id=\"searchWriteoff\" placeholder=\"Поиск по списанию...\">

                <table id=\"writeoffTable\">
                    <thead>
                        <tr>
                            <th>Тип</th>
                            <th>Название</th>
                            <th>Инвентарный номер</th>
                            <th>Количество</th>
                        </tr>
                    </thead>
                    <tbody>
                    {% for item in cartridges_writeoff %}
                        <tr data-id=\"{{ item.id }}\"
                            data-type=\"cartridge\"
                            data-name=\"{{ item.name|e }}\"
                            data-inv=\"{{ item.inventory_number|e }}\"
                            data-qty=\"{{ item.quantity }}\">
                            <td>Картридж</td>
                            <td>{{ item.name|e }}</td>
                            <td>{{ item.inventory_number|e }}</td>
                            <td>{{ item.quantity }}</td>
                        </tr>
                    {% endfor %}

                    {% for item in tech_writeoff %}
                        <tr data-id=\"{{ item.id }}\"
                            data-type=\"tech\"
                            data-name=\"{{ item.name|e }}\"
                            data-inv=\"{{ item.inventory_number|e }}\"
                            data-qty=\"{{ item.quantity }}\">
                            <td>Техника</td>
                            <td>{{ item.name|e }}</td>
                            <td>{{ item.inventory_number|e }}</td>
                            <td>{{ item.quantity }}</td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Модалка подтверждения удаления -->
        <div class=\"modal-overlay\" id=\"modalConfirmDelete\">
            <div class=\"modal-container-writeoff\">
                <p>Вы действительно хотите удалить все элементы списания? При удалении они исчезнут из списания и склада!</p>
                <div class=\"modal-buttons\">
                    <form method=\"POST\" id=\"formDeleteAll\" style=\"display:inline;\">
                        <input type=\"hidden\" name=\"action\" value=\"delete_all\">
                        <button type=\"submit\" class=\"modal-button confirm\">Да</button>
                    </form>
                    <button class=\"modal-button cancel\" onclick=\"closeModalConfirm()\">Нет</button>
                </div>
            </div>
        </div>

        <!-- Модальное окно экспорта -->
        <div class=\"modal-overlay\" id=\"modalExport\">
            <div class=\"modal-container\">
                <h3>Выберите формат экспорта</h3>
                <div class=\"modal-buttons\">
                    <form method=\"POST\" action=\"/admin/writeoff/export\" style=\"display:inline;\">
                        <input type=\"hidden\" name=\"format\" value=\"excel\">
                        <button type=\"submit\" class=\"modal-button confirm\" style=\"background-color: #28a745;\">Excel</button>
                    </form>
                    <form method=\"POST\" action=\"/admin/writeoff/export\" style=\"display:inline;\">
                        <input type=\"hidden\" name=\"format\" value=\"word\">
                        <button type=\"submit\" class=\"modal-button confirm\" style=\"background-color: #007bff;\">Word</button>
                    </form>
                    <button type=\"button\" class=\"modal-button cancel\" onclick=\"closeExportModal()\">Отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Выбор строки
    function setupRowSelection(tableId, btnId) {
        const table = document.getElementById(tableId);
        const btn = document.getElementById(btnId);
        let selectedRow = null;

        table.querySelectorAll('tbody tr').forEach(row => {
            row.addEventListener('click', () => {
                if (selectedRow) selectedRow.classList.remove('selected');
                if (selectedRow === row) {
                    // Снять выбор
                    selectedRow = null;
                    btn.disabled = true;
                } else {
                    selectedRow = row;
                    row.classList.add('selected');
                    btn.disabled = false;
                }
            });
        });

        return () => selectedRow;
    }

    // Фильтрация таблиц
    function setupSearch(inputId, tableId) {
        const input = document.getElementById(inputId);
        const table = document.getElementById(tableId);

        input.addEventListener('input', () => {
            const filter = input.value.toLowerCase();
            table.querySelectorAll('tbody tr').forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    }

    const getSelectedStockRow = setupRowSelection('stockTable', 'btnToWriteoff');
    const getSelectedWriteoffRow = setupRowSelection('writeoffTable', 'btnToStock');

    setupSearch('searchStock', 'stockTable');
    setupSearch('searchWriteoff', 'writeoffTable');

    const btnToWriteoff = document.getElementById('btnToWriteoff');
    const btnToStock = document.getElementById('btnToStock');

    btnToWriteoff.addEventListener('click', () => {
        const selected = getSelectedStockRow();
        if (!selected) return;

        const data = {
            action: 'move_to_writeoff',
            type: selected.getAttribute('data-type'),
            id: parseInt(selected.getAttribute('data-id'))
        };

        sendPost(data);
    });

    btnToStock.addEventListener('click', () => {
        const selected = getSelectedWriteoffRow();
        if (!selected) return;

        const data = {
            action: 'move_to_stock',
            type: selected.getAttribute('data-type'),
            id: parseInt(selected.getAttribute('data-id'))
        };

        sendPost(data);
    });

    // Кнопка удалить все - открывает модалку
    document.getElementById('btnDeleteAll').addEventListener('click', () => {
        document.getElementById('modalConfirmDelete').classList.add('active');
    });

    function closeModalConfirm() {
        document.getElementById('modalConfirmDelete').classList.remove('active');
    }

    // Функция отправки POST-запроса с данными формы
    function sendPost(data) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.style.display = 'none';

        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = data[key];
                form.appendChild(input);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }

    function openExportModal() {
        document.getElementById('modalExport').classList.add('active');
    }

    function closeExportModal() {
        document.getElementById('modalExport').classList.remove('active');
    }
</script>

{% include 'components/notification.twig' %}
{% endblock %}", "admin/writeoff.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\admin\\writeoff.twig");
    }
}
