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

/* admin/storage.twig */
class __TwigTemplate_54e2892e05ffcb352c550f11a500e497 extends Template
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
        yield "Склад техники и картриджей";
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
        yield "    <link rel=\"stylesheet\" href=\"/css/admin/storage.css\">
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
        yield "<div class=\"storage-page\">
    <div class=\"full-header-wrapper\">
        <div class=\"centered-header\">
            <h2>Склад техники и картриджей</h2>
            <div class=\"btn-row\">
                <button class=\"storage-button btn-add\" id=\"btnAdd\">Добавить</button>
                <button class=\"storage-button btn-export\" id=\"btnExport\">Экспорт</button>
            </div>
        </div>
    </div>

    <div class=\"table-block\">
        <table>
            <thead>
                <tr>
                    <th>Тип<br><input type=\"text\" class=\"search-input\" data-column=\"0\" placeholder=\"Поиск...\"></th>
                    <th>Название<br><input type=\"text\" class=\"search-input\" data-column=\"1\" placeholder=\"Поиск...\"></th>
                    <th>Инвентарный номер<br><input type=\"text\" class=\"search-input\" data-column=\"2\" placeholder=\"Поиск...\"></th>
                    <th>Количество<br><input type=\"text\" class=\"search-input\" data-column=\"3\" placeholder=\"Поиск...\"></th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 34
            yield "                    <tr data-id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 34), "html", null, true);
            yield "\" data-type=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 34), "html", null, true);
            yield "\" data-name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 34));
            yield "\" data-inventory=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "inventory_number", [], "any", false, false, false, 34));
            yield "\" data-quantity=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 34), "html", null, true);
            yield "\">
                        <td>";
            // line 35
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 35) == "tech")) ? ("Техника") : ("Картридж"));
            yield "</td>
                        <td>";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 36));
            yield "</td>
                        <td>";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "inventory_number", [], "any", false, false, false, 37));
            yield "</td>
                        <td>";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 38), "html", null, true);
            yield "</td>
                        <td>
                            <button class=\"storage-button btn-edit\">Изменить</button>
                            <button class=\"storage-button btn-delete\">Удалить</button>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        yield "            </tbody>
        </table>
    </div>

    <!-- Модальное окно для добавления/редактирования -->
    <div id=\"modalForm\" class=\"modal\">
        <div class=\"modal-content\">
            <span class=\"close\" id=\"modalClose\">&times;</span>
            <h3 id=\"modalTitle\">Добавить запись</h3>
            <form id=\"formStorage\" method=\"post\" action=\"/admin/storage\">
                <input type=\"hidden\" name=\"action\" id=\"formAction\" value=\"add\">
                <input type=\"hidden\" name=\"id\" id=\"formId\" value=\"\">
                <label>Тип:
                    <select name=\"type\" id=\"formType\" required>
                        <option value=\"\">Выберите тип</option>
                        <option value=\"tech\">Техника</option>
                        <option value=\"cartridge\">Картридж</option>
                    </select>
                </label>
                <br><br>
                <label>Название:<br>
                    <input type=\"text\" name=\"name\" id=\"formName\" required>
                </label>
                <br><br>
                <label>Инвентарный номер:<br>
                    <input type=\"text\" name=\"inventory\" id=\"formInventory\">
                </label>
                <br><br>
                <label>Количество:<br>
                    <input type=\"number\" name=\"quantity\" id=\"formQuantity\" min=\"0\" required>
                </label>
                <br><br>
                <button class=\"storage-button\" type=\"submit\" id=\"formSubmit\">Сохранить</button>
            </form>
        </div>
    </div>

    <!-- Модальное окно экспорта -->
    <div id=\"modalExport\" class=\"modal\">
        <div class=\"modal-content\">
            <span class=\"close\" id=\"exportClose\">&times;</span>
            <h3>Экспорт данных</h3>
            <form id=\"formExport\" method=\"post\" action=\"/admin/storage/export\">
                <label>Выберите тип данных для экспорта:</label>
                <select name=\"export_type\" id=\"exportType\" required>
                    <option value=\"\">-- Выберите --</option>
                    <option value=\"tech\">Техника</option>
                    <option value=\"cartridge\">Картриджи</option>
                    <option value=\"all\">Техника и Картриджи</option>
                </select>
                <label>Выберите формат экспорта:</label>
                <button class=\"storage-button\" type=\"submit\" name=\"format\" value=\"excel\">Excel</button>
                <button class=\"storage-button\" type=\"submit\" name=\"format\" value=\"word\">Word</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Модальное окно добавления/редактирования
    const modal = document.getElementById('modalForm');
    const modalTitle = document.getElementById('modalTitle');
    const btnAdd = document.getElementById('btnAdd');
    const modalClose = document.getElementById('modalClose');
    const formAction = document.getElementById('formAction');
    const formId = document.getElementById('formId');
    const formType = document.getElementById('formType');
    const formName = document.getElementById('formName');
    const formInventory = document.getElementById('formInventory');
    const formQuantity = document.getElementById('formQuantity');

    btnAdd.onclick = () => {
        modalTitle.textContent = 'Добавить запись';
        formAction.value = 'add';
        formId.value = '';
        formType.value = '';
        formName.value = '';
        formInventory.value = '';
        formQuantity.value = '';
        modal.style.display = 'block';
    };

    modalClose.onclick = () => {
        modal.style.display = 'none';
    };

    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.onclick = (e) => {
            const tr = e.target.closest('tr');
            modalTitle.textContent = 'Изменить запись';
            formAction.value = 'edit';
            formId.value = tr.dataset.id;
            formType.value = tr.dataset.type;
            formName.value = tr.dataset.name;
            formInventory.value = tr.dataset.inventory;
            formQuantity.value = tr.dataset.quantity;
            modal.style.display = 'block';
        };
    });

    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.onclick = (e) => {
            if (!confirm('Вы уверены, что хотите удалить эту запись?')) return;
            const tr = e.target.closest('tr');
            const id = tr.dataset.id;
            const type = tr.dataset.type;

            // Создаём и отправляем форму для удаления
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/admin/storage';
            form.innerHTML = `
                <input type=\"hidden\" name=\"action\" value=\"delete\">
                <input type=\"hidden\" name=\"id\" value=\"\${id}\">
                <input type=\"hidden\" name=\"type\" value=\"\${type}\">
            `;
            document.body.appendChild(form);
            form.submit();
        };
    });

    window.onclick = (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
        if (event.target === document.getElementById('modalExport')) {
            document.getElementById('modalExport').style.display = 'none';
        }
    };

    // Поиск в таблице
    const searchInputs = document.querySelectorAll('.search-input');
    searchInputs.forEach(input => {
        input.addEventListener('input', () => {
            const column = input.dataset.column;
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const cell = row.cells[column];
                if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });

    // Модальное окно экспорта
    const modalExport = document.getElementById('modalExport');
    const btnExport = document.getElementById('btnExport');
    const exportClose = document.getElementById('exportClose');

    btnExport.onclick = () => {
        modalExport.style.display = 'block';
    };

    exportClose.onclick = () => {
        modalExport.style.display = 'none';
    };
</script>

";
        // line 208
        yield from $this->load("components/notification.twig", 208)->unwrap()->yield($context);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/storage.twig";
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
        return array (  316 => 208,  151 => 45,  138 => 38,  134 => 37,  130 => 36,  126 => 35,  113 => 34,  109 => 33,  84 => 10,  77 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.twig' %}

{% block title %}Склад техники и картриджей{% endblock %}

{% block extra_css %}
    <link rel=\"stylesheet\" href=\"/css/admin/storage.css\">
{% endblock %}

{% block content %}
<div class=\"storage-page\">
    <div class=\"full-header-wrapper\">
        <div class=\"centered-header\">
            <h2>Склад техники и картриджей</h2>
            <div class=\"btn-row\">
                <button class=\"storage-button btn-add\" id=\"btnAdd\">Добавить</button>
                <button class=\"storage-button btn-export\" id=\"btnExport\">Экспорт</button>
            </div>
        </div>
    </div>

    <div class=\"table-block\">
        <table>
            <thead>
                <tr>
                    <th>Тип<br><input type=\"text\" class=\"search-input\" data-column=\"0\" placeholder=\"Поиск...\"></th>
                    <th>Название<br><input type=\"text\" class=\"search-input\" data-column=\"1\" placeholder=\"Поиск...\"></th>
                    <th>Инвентарный номер<br><input type=\"text\" class=\"search-input\" data-column=\"2\" placeholder=\"Поиск...\"></th>
                    <th>Количество<br><input type=\"text\" class=\"search-input\" data-column=\"3\" placeholder=\"Поиск...\"></th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                {% for item in items %}
                    <tr data-id=\"{{ item.id }}\" data-type=\"{{ item.type }}\" data-name=\"{{ item.name|e }}\" data-inventory=\"{{ item.inventory_number|e }}\" data-quantity=\"{{ item.quantity }}\">
                        <td>{{ item.type == 'tech' ? 'Техника' : 'Картридж' }}</td>
                        <td>{{ item.name|e }}</td>
                        <td>{{ item.inventory_number|e }}</td>
                        <td>{{ item.quantity }}</td>
                        <td>
                            <button class=\"storage-button btn-edit\">Изменить</button>
                            <button class=\"storage-button btn-delete\">Удалить</button>
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>

    <!-- Модальное окно для добавления/редактирования -->
    <div id=\"modalForm\" class=\"modal\">
        <div class=\"modal-content\">
            <span class=\"close\" id=\"modalClose\">&times;</span>
            <h3 id=\"modalTitle\">Добавить запись</h3>
            <form id=\"formStorage\" method=\"post\" action=\"/admin/storage\">
                <input type=\"hidden\" name=\"action\" id=\"formAction\" value=\"add\">
                <input type=\"hidden\" name=\"id\" id=\"formId\" value=\"\">
                <label>Тип:
                    <select name=\"type\" id=\"formType\" required>
                        <option value=\"\">Выберите тип</option>
                        <option value=\"tech\">Техника</option>
                        <option value=\"cartridge\">Картридж</option>
                    </select>
                </label>
                <br><br>
                <label>Название:<br>
                    <input type=\"text\" name=\"name\" id=\"formName\" required>
                </label>
                <br><br>
                <label>Инвентарный номер:<br>
                    <input type=\"text\" name=\"inventory\" id=\"formInventory\">
                </label>
                <br><br>
                <label>Количество:<br>
                    <input type=\"number\" name=\"quantity\" id=\"formQuantity\" min=\"0\" required>
                </label>
                <br><br>
                <button class=\"storage-button\" type=\"submit\" id=\"formSubmit\">Сохранить</button>
            </form>
        </div>
    </div>

    <!-- Модальное окно экспорта -->
    <div id=\"modalExport\" class=\"modal\">
        <div class=\"modal-content\">
            <span class=\"close\" id=\"exportClose\">&times;</span>
            <h3>Экспорт данных</h3>
            <form id=\"formExport\" method=\"post\" action=\"/admin/storage/export\">
                <label>Выберите тип данных для экспорта:</label>
                <select name=\"export_type\" id=\"exportType\" required>
                    <option value=\"\">-- Выберите --</option>
                    <option value=\"tech\">Техника</option>
                    <option value=\"cartridge\">Картриджи</option>
                    <option value=\"all\">Техника и Картриджи</option>
                </select>
                <label>Выберите формат экспорта:</label>
                <button class=\"storage-button\" type=\"submit\" name=\"format\" value=\"excel\">Excel</button>
                <button class=\"storage-button\" type=\"submit\" name=\"format\" value=\"word\">Word</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Модальное окно добавления/редактирования
    const modal = document.getElementById('modalForm');
    const modalTitle = document.getElementById('modalTitle');
    const btnAdd = document.getElementById('btnAdd');
    const modalClose = document.getElementById('modalClose');
    const formAction = document.getElementById('formAction');
    const formId = document.getElementById('formId');
    const formType = document.getElementById('formType');
    const formName = document.getElementById('formName');
    const formInventory = document.getElementById('formInventory');
    const formQuantity = document.getElementById('formQuantity');

    btnAdd.onclick = () => {
        modalTitle.textContent = 'Добавить запись';
        formAction.value = 'add';
        formId.value = '';
        formType.value = '';
        formName.value = '';
        formInventory.value = '';
        formQuantity.value = '';
        modal.style.display = 'block';
    };

    modalClose.onclick = () => {
        modal.style.display = 'none';
    };

    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.onclick = (e) => {
            const tr = e.target.closest('tr');
            modalTitle.textContent = 'Изменить запись';
            formAction.value = 'edit';
            formId.value = tr.dataset.id;
            formType.value = tr.dataset.type;
            formName.value = tr.dataset.name;
            formInventory.value = tr.dataset.inventory;
            formQuantity.value = tr.dataset.quantity;
            modal.style.display = 'block';
        };
    });

    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.onclick = (e) => {
            if (!confirm('Вы уверены, что хотите удалить эту запись?')) return;
            const tr = e.target.closest('tr');
            const id = tr.dataset.id;
            const type = tr.dataset.type;

            // Создаём и отправляем форму для удаления
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/admin/storage';
            form.innerHTML = `
                <input type=\"hidden\" name=\"action\" value=\"delete\">
                <input type=\"hidden\" name=\"id\" value=\"\${id}\">
                <input type=\"hidden\" name=\"type\" value=\"\${type}\">
            `;
            document.body.appendChild(form);
            form.submit();
        };
    });

    window.onclick = (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
        if (event.target === document.getElementById('modalExport')) {
            document.getElementById('modalExport').style.display = 'none';
        }
    };

    // Поиск в таблице
    const searchInputs = document.querySelectorAll('.search-input');
    searchInputs.forEach(input => {
        input.addEventListener('input', () => {
            const column = input.dataset.column;
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const cell = row.cells[column];
                if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });

    // Модальное окно экспорта
    const modalExport = document.getElementById('modalExport');
    const btnExport = document.getElementById('btnExport');
    const exportClose = document.getElementById('exportClose');

    btnExport.onclick = () => {
        modalExport.style.display = 'block';
    };

    exportClose.onclick = () => {
        modalExport.style.display = 'none';
    };
</script>

{% include 'components/notification.twig' %}
{% endblock %}", "admin/storage.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\admin\\storage.twig");
    }
}
