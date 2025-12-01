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

/* admin/editusers.twig */
class __TwigTemplate_60029abdb8361fe22ddb24c5ec63cad7 extends Template
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
        yield "Управление учетными записями";
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
        yield "    <link rel=\"stylesheet\" href=\"/css/admin/editusersstyle.css\">
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
        yield "<div class=\"editusers-page\">  <!-- ← Обёртка -->
    <div class=\"content-wrapper\">
        <h1 class=\"page-title\">Управление учетными записями</h1>

        <div class=\"button-wrapper\">
            <button onclick=\"openModal('addModal')\">Добавить пользователя</button>
            <button onclick=\"openModal('exportModal')\">Экспорт</button>
        </div>

        <div class=\"table-wrapper\">
            <table class=\"user-table\">
                <thead>
                    <tr>
                        <th>Логин</th>
                        <th>Пароль</th>
                        <th>Имя пользователя</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 31
            yield "                        <tr>
                            <td>";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "log", [], "any", false, false, false, 32));
            yield "</td>
                            <td>";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "pass", [], "any", false, false, false, 33));
            yield "</td>
                            <td>";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "username", [], "any", false, false, false, 34));
            yield "</td>
                            <td>
                                <button class=\"edit-btn\" onclick=\"openEditModal(";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id_user", [], "any", false, false, false, 36), "html", null, true);
            yield ", '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "log", [], "any", false, false, false, 36));
            yield "', '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "pass", [], "any", false, false, false, 36));
            yield "', '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "username", [], "any", false, false, false, 36));
            yield "')\">Редактировать</button>
                                ";
            // line 37
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id_user", [], "any", false, false, false, 37) > 2)) {
                // line 38
                yield "                                    <button class=\"delete-btn danger\" onclick=\"openDeleteModal(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id_user", [], "any", false, false, false, 38), "html", null, true);
                yield ")\">Удалить</button>
                                ";
            }
            // line 40
            yield "                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        yield "                </tbody>
            </table>
        </div>
    </div>

    <!-- Модальные окна -->
    <div class=\"modal-overlay\" id=\"addModal\">
        <div class=\"modal\">
            <h2>Добавить пользователя</h2>
            ";
        // line 52
        if ((($tmp = ($context["errorAdd"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 53
            yield "                <div class=\"error-message\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["errorAdd"] ?? null), "html", null, true);
            yield "</div>
            ";
        }
        // line 55
        yield "            <form method=\"post\">
                <input type=\"hidden\" name=\"action\" value=\"add\">
                <label>Логин:</label>
                <input type=\"text\" name=\"log\" required>
                <label>Пароль:</label>
                <input type=\"text\" name=\"pass\" required>
                <label>Имя пользователя:</label>
                <input type=\"text\" name=\"username\" required>
                <div class=\"modal-buttons\">
                    <button type=\"submit\" class=\"confirm\">Добавить</button>
                    <button type=\"button\" class=\"cancel\" onclick=\"closeAllModals()\">Отмена</button>
                </div>
            </form>
        </div>
    </div>

    <div class=\"modal-overlay\" id=\"editModal\">
        <div class=\"modal\">
            <h2>Редактировать пользователя</h2>
            ";
        // line 74
        if ((($tmp = ($context["errorEdit"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 75
            yield "                <div class=\"error-message\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["errorEdit"] ?? null), "html", null, true);
            yield "</div>
            ";
        }
        // line 77
        yield "            <form method=\"post\">
                <input type=\"hidden\" name=\"action\" value=\"edit\">
                <input type=\"hidden\" name=\"id_user\" id=\"edit_id_user\">
                <label>Логин:</label>
                <input type=\"text\" name=\"log\" id=\"edit_log\" required>
                <label>Пароль:</label>
                <input type=\"text\" name=\"pass\" id=\"edit_pass\" required>
                <label>Имя пользователя:</label>
                <input type=\"text\" name=\"username\" id=\"edit_username\" required>
                <div class=\"modal-buttons\">
                    <button type=\"submit\" class=\"confirm\">Сохранить</button>
                    <button type=\"button\" class=\"cancel\" onclick=\"closeAllModals()\">Отмена</button>
                </div>
            </form>
        </div>
    </div>

    <div class=\"modal-overlay\" id=\"deleteModal\">
        <div class=\"modal\">
            <h2>Удалить пользователя?</h2>
            <form method=\"post\">
                <input type=\"hidden\" name=\"action\" value=\"delete\">
                <input type=\"hidden\" name=\"id_user\" id=\"delete_id_user\">
                <div class=\"modal-buttons\">
                    <button type=\"submit\" class=\"danger\">Удалить</button>
                    <button type=\"button\" class=\"cancel\" onclick=\"closeAllModals()\">Отмена</button>
                </div>
            </form>
        </div>
    </div>

    <div class=\"modal-overlay\" id=\"exportModal\">
        <div class=\"modal\">
            <h2>Экспортировать данные</h2>
            <form method=\"post\" action=\"/admin/editusers/export\" target=\"_blank\">
                <label for=\"format\">Выберите формат:</label>
                <select name=\"format\" id=\"format\" required>
                    <option value=\"xlsx\">Excel (.xlsx)</option>
                    <option value=\"doc\">Word (.doc)</option>
                </select>
                <div class=\"modal-buttons\">
                    <button type=\"submit\" class=\"confirm\">Экспортировать</button>
                    <button type=\"button\" class=\"cancel\" onclick=\"closeAllModals()\">Отмена</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function openModal(id) {
        closeAllModals();
        const modal = document.getElementById(id);
        if (modal) modal.classList.add('active');
    }

    function closeAllModals() {
        document.querySelectorAll('.modal-overlay').forEach(modal => modal.classList.remove('active'));
    }

    function openEditModal(id, log, pass, username) {
        document.getElementById('edit_id_user').value = id;
        document.getElementById('edit_log').value = log;
        document.getElementById('edit_pass').value = pass;
        document.getElementById('edit_username').value = username;
        openModal('editModal');
    }

    function openDeleteModal(id) {
        document.getElementById('delete_id_user').value = id;
        openModal('deleteModal');
    }
    </script>

    ";
        // line 150
        yield from $this->load("components/notification.twig", 150)->unwrap()->yield($context);
        // line 151
        yield "</div>  <!-- ← Закрывающий div для .editusers-page -->
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/editusers.twig";
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
        return array (  277 => 151,  275 => 150,  200 => 77,  194 => 75,  192 => 74,  171 => 55,  165 => 53,  163 => 52,  152 => 43,  144 => 40,  138 => 38,  136 => 37,  126 => 36,  121 => 34,  117 => 33,  113 => 32,  110 => 31,  106 => 30,  84 => 10,  77 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.twig' %}

{% block title %}Управление учетными записями{% endblock %}

{% block extra_css %}
    <link rel=\"stylesheet\" href=\"/css/admin/editusersstyle.css\">
{% endblock %}

{% block content %}
<div class=\"editusers-page\">  <!-- ← Обёртка -->
    <div class=\"content-wrapper\">
        <h1 class=\"page-title\">Управление учетными записями</h1>

        <div class=\"button-wrapper\">
            <button onclick=\"openModal('addModal')\">Добавить пользователя</button>
            <button onclick=\"openModal('exportModal')\">Экспорт</button>
        </div>

        <div class=\"table-wrapper\">
            <table class=\"user-table\">
                <thead>
                    <tr>
                        <th>Логин</th>
                        <th>Пароль</th>
                        <th>Имя пользователя</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    {% for user in users %}
                        <tr>
                            <td>{{ user.log|e }}</td>
                            <td>{{ user.pass|e }}</td>
                            <td>{{ user.username|e }}</td>
                            <td>
                                <button class=\"edit-btn\" onclick=\"openEditModal({{ user.id_user }}, '{{ user.log|e }}', '{{ user.pass|e }}', '{{ user.username|e }}')\">Редактировать</button>
                                {% if user.id_user > 2 %}
                                    <button class=\"delete-btn danger\" onclick=\"openDeleteModal({{ user.id_user }})\">Удалить</button>
                                {% endif %}
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>

    <!-- Модальные окна -->
    <div class=\"modal-overlay\" id=\"addModal\">
        <div class=\"modal\">
            <h2>Добавить пользователя</h2>
            {% if errorAdd %}
                <div class=\"error-message\">{{ errorAdd }}</div>
            {% endif %}
            <form method=\"post\">
                <input type=\"hidden\" name=\"action\" value=\"add\">
                <label>Логин:</label>
                <input type=\"text\" name=\"log\" required>
                <label>Пароль:</label>
                <input type=\"text\" name=\"pass\" required>
                <label>Имя пользователя:</label>
                <input type=\"text\" name=\"username\" required>
                <div class=\"modal-buttons\">
                    <button type=\"submit\" class=\"confirm\">Добавить</button>
                    <button type=\"button\" class=\"cancel\" onclick=\"closeAllModals()\">Отмена</button>
                </div>
            </form>
        </div>
    </div>

    <div class=\"modal-overlay\" id=\"editModal\">
        <div class=\"modal\">
            <h2>Редактировать пользователя</h2>
            {% if errorEdit %}
                <div class=\"error-message\">{{ errorEdit }}</div>
            {% endif %}
            <form method=\"post\">
                <input type=\"hidden\" name=\"action\" value=\"edit\">
                <input type=\"hidden\" name=\"id_user\" id=\"edit_id_user\">
                <label>Логин:</label>
                <input type=\"text\" name=\"log\" id=\"edit_log\" required>
                <label>Пароль:</label>
                <input type=\"text\" name=\"pass\" id=\"edit_pass\" required>
                <label>Имя пользователя:</label>
                <input type=\"text\" name=\"username\" id=\"edit_username\" required>
                <div class=\"modal-buttons\">
                    <button type=\"submit\" class=\"confirm\">Сохранить</button>
                    <button type=\"button\" class=\"cancel\" onclick=\"closeAllModals()\">Отмена</button>
                </div>
            </form>
        </div>
    </div>

    <div class=\"modal-overlay\" id=\"deleteModal\">
        <div class=\"modal\">
            <h2>Удалить пользователя?</h2>
            <form method=\"post\">
                <input type=\"hidden\" name=\"action\" value=\"delete\">
                <input type=\"hidden\" name=\"id_user\" id=\"delete_id_user\">
                <div class=\"modal-buttons\">
                    <button type=\"submit\" class=\"danger\">Удалить</button>
                    <button type=\"button\" class=\"cancel\" onclick=\"closeAllModals()\">Отмена</button>
                </div>
            </form>
        </div>
    </div>

    <div class=\"modal-overlay\" id=\"exportModal\">
        <div class=\"modal\">
            <h2>Экспортировать данные</h2>
            <form method=\"post\" action=\"/admin/editusers/export\" target=\"_blank\">
                <label for=\"format\">Выберите формат:</label>
                <select name=\"format\" id=\"format\" required>
                    <option value=\"xlsx\">Excel (.xlsx)</option>
                    <option value=\"doc\">Word (.doc)</option>
                </select>
                <div class=\"modal-buttons\">
                    <button type=\"submit\" class=\"confirm\">Экспортировать</button>
                    <button type=\"button\" class=\"cancel\" onclick=\"closeAllModals()\">Отмена</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function openModal(id) {
        closeAllModals();
        const modal = document.getElementById(id);
        if (modal) modal.classList.add('active');
    }

    function closeAllModals() {
        document.querySelectorAll('.modal-overlay').forEach(modal => modal.classList.remove('active'));
    }

    function openEditModal(id, log, pass, username) {
        document.getElementById('edit_id_user').value = id;
        document.getElementById('edit_log').value = log;
        document.getElementById('edit_pass').value = pass;
        document.getElementById('edit_username').value = username;
        openModal('editModal');
    }

    function openDeleteModal(id) {
        document.getElementById('delete_id_user').value = id;
        openModal('deleteModal');
    }
    </script>

    {% include 'components/notification.twig' %}
</div>  <!-- ← Закрывающий div для .editusers-page -->
{% endblock %}", "admin/editusers.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\admin\\editusers.twig");
    }
}
